<?php
/**
 * Gifts Controller
 *
 * @package     app.Controller.GiftsController
 * @copyright   Copyright 2012, ActionAid Association India
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class GiftsController extends AppController {
  var $uses = array('Gift','Person', 'Transaction');

  /**
   * Before Filter cake callback
   * @link http://api20.cakephp.org/class/controller#method-ControllerbeforeFilter
   * @access protected
   */
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add','json_validation');
  }

  /**
   * Add a gift
   * Donation Form Processing Functionality
   * @param $appeal string, appeal slug
   * @return void
   * @access public
   */
  public function add($appealSlug=null) {
    // Get the requested appeal based on the slug (or the default one)
    $appeal = $this->Gift->Appeal->getBySlug($appealSlug);
    if($appealSlug == 'emergencies'){
        $this->layout = 'emergencies';
    }
    
    //pr($this->request->data);
    // if some data is submited
    if (!empty($this->request->data)) {
      // do a copy of the user given data 
      // for pre-validation transformation purposes
      $data = $this->request->data;
      // format gift data
      // If gift is other amount, then replace default value by other amount
      if (isset($data['Gift']['other_amount']) &&
          !empty($data['Gift']['other_amount']) && ($data['Gift']['appeal']=='general-donation' || $data['Gift']['appeal']=='emergencies')) {
        $data['Gift']['amount'] = $data['Gift']['other_amount'];
      }
      $data['Gift']['appeal_id'] = $appeal['Appeal']['id'];
      $data['Gift']['status'] = 'pending';
      $this->Gift->Person->set($data);
      $this->Gift->set($data);

      // validate and save
      $success = $this->Gift->Person->validates();
      $success = ($this->Gift->validates() && $success);
      if (!$success) {
          $this->Message->error(__('There are errors in the form. Please correct the errors bellow'));
          //echo "there are errorss";
          $errors = $this->Gift->Person->invalidFields();
          $errors .= $this->Gift->invalidFields();
          //pr($errors);
      } else {
        // if person doesnt already exist save the person in db
        $conditions = Person::getFindConditions('findDuplicates',$data);
        $person = $this->Gift->Person->find('first', array('conditions' => $conditions));
        if (!isset($person) || empty($person)) {
          $person = $this->Gift->Person->save($data);
        }
        if (!isset($person) || empty($person)) {
          $this->Message->error(__('Sorry something went wrong please try again later.'));
        } else {
          $data['Gift']['person_id'] = $person['Person']['id'];
          $gift = $this->Gift->save($data);
          if(isset($gift) && !empty($gift)) {
            //$this->Message->notice(__('Thank you your gift was saved'));
            $this->redirect('/transactions/request/'.$gift['Gift']['id']);
          } else {
            $this->Message->error(__('Sorry something went wrong please try again later.'));
          }
        }
    	}
    }

    // get the list of states & countries for the select lists
    /*$states = $this->Gift->Person->State->getListByCountryCode(
      Configure::read('App.gift.defaultCountry'));*/
    $countries = $this->Gift->Person->Country->getListByCountryCode(
      Configure::read('App.gift.supportedCountries'));

    $this->set(compact('countries',/*'states',*/'appeal'));
    // See /Views/Form/[slug]
    $this->render('../Forms/'.$appeal['Appeal']['slug']);
  }

  /**
   * Provide the validation rules or messages for donation form in json_encode
   */
  function json_validation($type='rules',$models=array('Gift','Person')) {
    parent::json_validation($type,$models);
  }

  public function admin_search(){
    // the page we will redirect to
    $url['action'] = 'admin_index';
    
    // build a URL will all the search elements in it
    // the resulting URL will be 
    // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
    foreach ($this->data as $k=>$v){ 
      foreach ($v as $kk=>$vv){ 
        $url[$k.'.'.$kk]=str_replace('/', '-', $vv); 
      } 
    }

    // redirect the user to the url
    $this->redirect($url, null, true);
  }

  /**
   * Gifts Index (Admin)
   * @return void
   * @access public
   */
  public function admin_index() {
    // BEGIN SEARCH MANAGEMENT //
    // Build the condition if any
    $conditions = array();
    $searchparams = $this->params['named'];
    if(!empty($searchparams['Gift.timeframe'])){
      if($searchparams['Gift.timeframe'] == 'today'){
        $datefrom = strtotime(date('d-m-Y'));
        $dateto = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
      }
      elseif($searchparams['Gift.timeframe'] == '7days'){
        $dateto = strtotime(date('d-m-Y'));
        $datefrom = mktime(0, 0, 0, date("m")  , date("d")-7, date("Y"));
      }
      elseif($searchparams['Gift.timeframe'] == '1month'){
        $dateto = strtotime(date('d-m-Y'));
        $datefrom = mktime(0, 0, 0, date("m")-1  , date("d"), date("Y"));
      }
      elseif($searchparams['Gift.timeframe'] == 'custom'){
        $datefrom = strtotime($searchparams['Gift.datefrom']);
        $dateto = strtotime($searchparams['Gift.dateto']);
      }
      $conditions[]['AND'] = array(
        'Gift.created >=' => date('Y-m-d', $datefrom),
        'Gift.created <=' => date('Y-m-d', $dateto)
        );
    }
    if(!empty($searchparams['Gift.Name'])){
      $conditions[] = array(
        'OR' => array(
          'Person.name LIKE' => "%{$searchparams['Gift.Name']}%",
          'Person.email LIKE' => "%{$searchparams['Gift.Name']}%"
          )
      );
    }
    if(!empty($searchparams['Gift.Status'])){
      $conditions[] = array('Gift.status'=>$searchparams['Gift.Status']);
    }
    if(!empty($searchparams['Gift.Serial'])){
      $conditions[] = array('Gift.serial'=>$searchparams['Gift.Serial']);
    }
    if(!empty($searchparams['Gift.Amount'])){
      $conditions[] = array('Gift.amount'=>$searchparams['Gift.Amount']);
    }
    
    $this->data = array('Gift'=>array('Name'=>'Kevin'));
    // repopulate fields according to the data posted
    $populate = array();
    foreach($searchparams as $key=>$param){
      $k = str_replace('Gift.', '', $key);
      if($k == 'datefrom' || $k == 'dateto'){
        //$param = str_replace('-', '/', $param);
        //$param = date('', strtotime($param));
      }
      $populate[$k]=$param;
    }
    $this->data = array('Gift'=>$populate);
    // END SEARCH MANAGEMENT //
    
    $params = array(
      'fields' => array('id','amount','currency','serial','source', 'emailconfirmation', 'status','modified'),
      'contain' => array(
         'Person' => array('name', 'email', 'address1', 'city', 'pincode', 'agerange', 'phone'),
         'Appeal' => array('title')
      ),
      'order' => array('Gift.modified' => 'desc'),
      'conditions' => $conditions
    );
    $gifts = $this->Gift->find('all', $params);

    $this->paginate = $params;
    
    $statistics = array('success'=>0, 'pending'=>0, 'failed'=>0, 'donations'=>0);
    foreach($gifts as $gift){
      if($gift['Gift']['status'] == 'success'){
        $statistics['success']++;
        $statistics['donations'] += $gift['Gift']['amount'];
      }
      if($gift['Gift']['status'] == 'failure'){
        $statistics['failed']++;
      }
      if($gift['Gift']['status'] == 'pending'){
        $statistics['pending']++;
      }
    }
    
    $this->set('statistics', $statistics);
    $this->set('gifts', $this->paginate('Gift'));
    
    if(!empty($searchparams['format']) && $searchparams['format'] == 'xls'){
      $this->set('gifts', $gifts);
      $this->layout = 'export_xls';
      $this->render('export_xls');
    }
  }

  public function admin_view($id) {
    //TODO id = null
    $param = array(
      'fields' => array('id','amount','currency','serial','status','modified', 'source'),
      'contain' => array(
         'Person' => array('name','address1','address2','city','pincode','state','country','email','phone','pan','dob', 'agerange'),
         'Appeal' => array('title','slug')
      ),
      'conditions' => array('Gift.id' => $id), //array of conditions
    );
    
    $this->paginate = array(
      'fields' => array('status', 'type', 'serial', 'gateway_id', 'status_code', 'created', 'modified', 'ip', 'data'),
      'contain' => array(
         'Gateway' => array('name')
      ),
      'conditions' => array('Transaction.gift_id' => $id), //array of conditions
    );

    $this->set('gift', $this->Gift->find('first',$param));
    $this->set('transactions',$this->paginate('Transaction'));
  }
}

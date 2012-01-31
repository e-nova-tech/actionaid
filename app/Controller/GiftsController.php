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
  var $uses = array('Gift','Person');

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
    
    //pr($this->request->data);
    // if some data is submited
    if (!empty($this->request->data)) {
      // do a copy of the user given data 
      // for pre-validation transformation purposes
      $data = $this->request->data;
      // format gift data
      if (isset($data['Gift']['other_amount']) && isset($data['Gift']['other_amount']) &&
          !empty($data['Gift']['other_amount']) && $data['Gift']['amount']=='other') {
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
          $this->Message->notice(__('Thank you your gift was saved'));
          } else {
            $this->Message->error(__('Sorry something went wrong please try again later.'));
          }
        }
    	}
    }

    // get the list of states & countries for the select lists
    $states = $this->Gift->Person->State->getListByCountryCode(
      Configure::read('App.gift.default_country'));
    $countries = $this->Gift->Person->Country->getListByCountryCode(
      Configure::read('App.gift.supported_countries'));

    $this->set(compact('countries','states','appeal'));
    // See /Views/Form/[slug]
    $this->render('../Forms/'.$appeal['Appeal']['slug']);
  }

  /**
   * Provide the validation rules or messages for donation form in json_encode
   */
  function json_validation($type='rules',$models=array('Gift','Person')) {
    parent::json_validation($type,$models);
  }
  
  /**
   * Gifts Index (Admin)
   * @return void
   * @access public
   */
  public function admin_index() {
    $this->paginate = array(
      'fields' => array('id','amount','currency','serial','status','modified'),
      'contain' => array(
         'Person' => array('title','firstname','lastname'),
         'Appeal' => array('name')
      )
    );
    $this->set('gifts',$this->paginate('Gift'));
  }

  public function admin_view($id) {
    //TODO id = null
    $param = array(
      'fields' => array('id','amount','currency','serial','status','modified'),
      'contain' => array(
         'Person' => array('title','firstname','lastname','address1','address2','city','pincode','state','country','email','phone','pan','dob'),
         'Appeal' => array('name','slug')
      ),
      'conditions' => array('Gift.id' => $id), //array of conditions
    );
    $this->set('gift', $this->Gift->find('first',$param));
  }
}

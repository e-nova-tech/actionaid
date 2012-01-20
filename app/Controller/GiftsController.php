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
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add');
  }

  /**
   * Add a gift
   * Donation Form Processing Functionality
   * @param $appeal string, appeal slug
   * @return void
   * @access public
   */
  public function add($appeal='default') {
    // get the current appeal
    $appeal = $this->Gift->Appeal->find('first', array('conditions' => array('slug' => $appeal)));
    if(empty($appeal)) {
      $appeal = $this->Gift->Appeal->find('first', array('conditions' => array('slug' => 'default')));
    }

    // get the list of states & countries for the select lists
    //$states = $this->Gift->Person->State->find('list', array('fields' => array('code', 'name')));
    $states = array('IN-AP'=>'Andhra Pradesh','IN-AR'=>'Arunachal Pradesh','IN-AS'=>'Assam','IN-BR'=>'Bihar','IN-CT'=>'Chhattisgarh','IN-GA'=>'Goa','IN-GJ'=>'Gujarat','IN-HR'=>'Haryana','IN-HP'=>'Himachal Pradesh','IN-JK'=>'Jammu and Kashmir','IN-JH'=>'Jharkhand','IN-KA'=>'Karnataka','IN-KL'=>'Kerala','IN-MP'=>'Madhya Pradesh','IN-MH'=>'Maharashtra','IN-MN'=>'Manipur','IN-ML'=>'Meghalaya','IN-MZ'=>'Mizoram','IN-NL'=>'Nagaland','IN-OR'=>'Orissa','IN-PB'=>'Punjab','IN-RJ'=>'Rajasthan','IN-SK'=>'Sikkim','IN-TN'=>'Tamil Nadu','IN-TR'=>'Tripura','IN-UT'=>'Uttarakhand','IN-UP'=>'Uttar Pradesh','IN-WB'=>'West Bengal','IN-AN'=>'Andaman and Nicobar Islands','IN-CH'=>'Chandigarh','IN-DN'=>'Dadra and Nagar Haveli','IN-DD'=>'Daman and Diu','IN-DL'=>'Delhi','IN-LD'=>'Lakshadweep','IN-PY'=>'Pondicherry (Puducherry)');
    $this->set('states',$states);
    //$countries = $this->Gift->Person->Country->find('list',array('fields'=>array('code','name')));
    $countries = array('IN' => 'India');
    $this->set('countries', $countries);

    // if no data is submited, render
    if (empty($this->request->data)) {
      return;
    }

    // do a copy of the user given data 
    // for pre-validation transformation purposes
    $data = $this->request->data;
    // format gift data
    if (isset($data['Gift']['other_amount']) && isset($data['Gift']['other_amount']) &&
        !empty($data['Gift']['other_amount']) && $data['Gift']['amount']=='other') {
      $data['Gift']['amount'] = $data['Gift']['other_amount'];
    }
    $this->Gift->Person->set($data);
    $this->Gift->set($data);

    // validate and save
    $success = $this->Gift->Person->validates();
    $success = ($this->Gift->validates() && $success);
    if($success) {
      $person = null;
      $conditions = array("Person.title"=>$data['Person']['title'], "Person.dob"=>$data['Person']['dob']['year'].'-'.$data['Person']['dob']['month'].'-'.$data['Person']['dob']['day'], "Person.firstname"=>$data['Person']['firstname'], "Person.lastname"=>$data['Person']['lastname'], "Person.address1"=>$data['Person']['address1'], "Person.address2"=>$data['Person']['address2'], "Person.city"=>$data['Person']['city'], "Person.pincode"=>$data['Person']['pincode'], "Person.state"=>$data['Person']['state'], "Person.country"=>$data['Person']['country'], "Person.email"=>$data['Person']['email'], "Person.pan"=>$data['Person']['pan']);
      // count the number of people in the db with same info
      $count = $this->Gift->Person->find("count", array("conditions"=>$conditions));
      if($count){ 
        // if person exists get the person id
        $person = $this->Gift->Person->find("first", array("fields"=>array("Person.id"), "conditions"=>$conditions));
      }
      else{ 
        // if person doesnt already exis save the person in db
        $person = $this->Gift->Person->save($data);	
      }
      $data['Gift']['person_id'] = $person['Person']['id'];
      $this->Gift->save($data);
  	}
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
}

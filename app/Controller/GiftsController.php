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

  /**
   * Add a gift
   * Donation Form Processing Functionality
   * @param $appeal string, appeal slug
   * @return void
   * @access public
   */
  public function add($appeal='default') {
    // do a copy of the user given data 
    // for pre-validation transformation purposes
    $data = $this->request->data;

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

    // format gift data
    if (isset($data['Gift']['other_amount']) && isset($data['Gift']['other_amount']) &&
        !empty($data['Gift']['other_amount']) && $data['Gift']['amount']=='other') {
      $data['Gift']['amount'] = $data['Gift']['other_amount'];
    }

    // validate and save
    $this->Gift->Person->set($data);
    $this->Gift->set($data);
    $person = null;
    $success = $this->Gift->Person->validates();
    $success = ($this->Gift->validates() && $success);
    if($success) {
      // TODO : Check if the person already exist in the db ? what criteria to use ? email id
      $person = $this->Gift->Person->save($data);	
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

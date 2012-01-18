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
    $this->Auth->allow('add');
  }

  public function add($appeal=null) {
    //pr($this->request->data);
    $data = $this->request->data;
    
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

    // validate
    $this->Gift->set($data);
    if($this->Gift->validates()) {
      //echo "gift validates<br/>";
    }
    $this->Gift->Person->set($data);
    if($this->Gift->Person->validates()) {
      //echo "person validats<br/>";
    }
  }
}

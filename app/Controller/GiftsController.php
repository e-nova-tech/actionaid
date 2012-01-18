<?php
/**
 * Gifts Controller
 * 
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
 * @package       app.Controller.GiftsController
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class GiftsController extends AppController {

  function beforeFilter() {
    $this->Auth->allow('add');
  }

  public function add($appeal=null) {
    //pr($this->request->data);
    $data = $this->request->data;
    
    // get the list of states for the select list
    $states = $this->Gift->Person->State->find('list', array('fields' => array('code', 'name')));
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

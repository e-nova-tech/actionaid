<?php
/**
 * Cities Controller
 *
 * @package     app.Controller.CitiesController
 * @copyright   Copyright 2012, ActionAid Association India
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class CitiesController extends AppController {
  function beforeFilter() {
    //parent::beforeFilter();
    $this->Auth->allow('json_index');
  }

  function json_index($option=null) {
    $this->autoRender = false; 
    $cities = $this->City->find('all',array(
      'fields'=>array('name','state'),
      'conditions' => array('City.name LIKE' => "$option%"),
      'limit' => 7,
      'order' => array('City.population DESC')
    ));
    $json = array();
    foreach($cities as $city) $json[] = $city['City'];
    echo json_encode($json); //TODO json headers?
  }
}

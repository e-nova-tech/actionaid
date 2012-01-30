<?php
/**
 * State Model
 * 
 * @package     app.Model.City
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class State extends AppModel {
  public $name = 'State';

  /**
   * Get state list by Country code
   * @param char2 country code ISO 3166-1 Alpha 2
   * @return array State.code => State.name  
   */
  function getListByCountryCode($country_code) {
    $result = Cache::read($country_code.'_states', 'long');
    if (!$result) {
      $result = $this->find('list', array(
        'fields' => array('code', 'name'), 
        'order' => 'State.name ASC',
        'conditions' => array('code LIKE' => $country_code.'-%')
      ));
      if (!empty($result)) {
        Cache::write($country_code.'_states', $result, 'long');
      }
    }
    return $result;
  }
}

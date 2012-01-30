<?php
/**
 * Country Model
 * 
 * @package     app.Model.Country
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Country extends AppModel {
  public $name = 'Country';

  /**
   * Get state list of country by country code
   * @param char2 country code ISO 3166-1 Alpha 2
   * @return array Country.code => Country.name 
   */
  public function getListByCountryCode($codes) {
    $hash = md5(serialize($codes));;
    $result = Cache::read('countries_'.$hash, 'long');
    if (!$result) {
      if(is_array($codes) && !empty($codes)) {
        $options['conditions'] = array('code' => $codes);
      }
      $options['fields'] = array('code', 'name');
      $options['order'] = 'Country.name ASC';
      $result = $this->find('list', $options);
      if(!empty($result)) {
        foreach($result as $code => $name) {
          $countries[strtoupper($code)] = ucfirst($name);
        }
        Cache::write('countries'.$hash, $countries, 'long');
      }
    }
    return $countries;
  }

}

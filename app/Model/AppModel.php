<?php
/**
 * Application Model
 * 
 * @package     app.Model.AppModel
 * @copyright   Copyright 2012 ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Model', 'Model');
class AppModel extends Model {
  var $actsAs = array('Containable');

  /**
   * Never fetch any recursive data from associated models
   * Use containable for any assocs
   * @var integer
   */
  public $recursive = -1;
  
  /**
   * Validation Rule, check if the string is a word 
   * It allows one dashe or space in between word section
   * @param $data array is passed using the form field name as the key
   * @return bool
   */
  function alphaplus($check) {
    // have to extract the value to make the function generic
    $value = array_values($check);
    $value = $value[0];
    // @TODO support unicode characters => pb in JS
    return preg_match("/^(([a-zA-Zéèêàüöôø])+(\-|\s|\'){1}){0,}([a-zA-Zéèêàüöôø])+$/", $value);
  }

  /**
   * Check if two field values are equal (as in password confirmation)
   * @param array $field check
   * @param string $field2 as in 'User.password_confirm'
   * return boolean
   */
  function isConfirmed($field, $field2) {
    list($model,$field3) = (preg_split('/\./',$field2));
    return($this->data[$model][$field3] == current($field));
  }
}//_EOF

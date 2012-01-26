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
    return preg_match("/^((\w)+(\-|\s|\'){1})?(\w)+$/", $value);
  }
}//_EOF

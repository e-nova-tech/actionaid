<?php
/**
 * MyForm Helper - Overrides default Form helper
 * 
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
 * @package       app.View.Helper.MyFormHelper
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MyFormHelper extends FormHelper { 
  /**
   * Input redefinition - required class += required span
   * @link http://book.cakephp.org/view/1390/Automagic-Form-Elements
   * @return string input
   * @access public
   */
  function input($fieldName, $options = array()){
    if(isset($options['class']) && !empty($options['class']) && strstr('required',$options['class'])) {
      $options['label'] .= $this->required();
    }
    return parent::input($fieldName, $options)."\n";
  }

  /**
   * Required field special marker
   * @return string
   * @access public
   */
  function required(){
    return ' <span class="required">*</span>';
  }
}


<?php
/**
 * MyForm Helper - Overrides default Form helper
 * 
 * @package       app.View.Helper.MyFormHelper
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
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
    if(isset($options['class']) && !empty($options['class']) && strstr($options['class'],'required')) {
      $options['label'] .= $this->required();
    }
    if(isset($options['hint'])) {
      $options['after'] = $this->hint($options['hint']);
      unset($options['hint']);
    }
    return parent::input($fieldName, $options)."\n";
  }

  function submit($label,$options=array()) {
    return parent::submit($label, $options)."\n";
  }
  function end() {
    return parent::end()."\n";
  }

  /**
   * Required field special marker
   * @return string
   * @access public
   */
  function required(){
    return ' <span class="required">*</span>';
  }

  function hint($message) {
    return "<p class='info'><span>$message</span></p>";
  }
}


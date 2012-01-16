<?php
// app/View/Helper/MyFormHelper.php
class MyFormHelper extends FormHelper { 
  /**
   * Input redefinition - required class += required span
   * @link http://book.cakephp.org/view/1390/Automagic-Form-Elements
   */
  function input($fieldName, $options = array()){
    if(isset($options['class']) && !empty($options['class']) && strstr('required',$options['class'])) {
      $options['label'] .= $this->required();
    }
    return parent::input($fieldName, $options)."\n";
  }

  /**
   * Required field special marker
   */
  function required(){
    return ' <span class="required">*</span>';
  }
}


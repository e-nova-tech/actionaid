<?php
// app/View/Helper/GiftHelper.php
class GiftHelper extends AppHelper {
  var $allowed_amount = array('3000','6000','9000');
  var $allow_other_amount = true;
  var $default_amount = '6000';

  function __construct(View $view, $settings = array()) {
    if (isset($settings['Gift'])) {
      $this->init($settings['Gift']);
    }
    parent::__construct($view, $settings);
  }

  function init($settings) {
    if (isset($settings['allowed_amount']) && is_array($settings['allowed_amount'])) {
      $this->allowed_amount = $settings['allowed_amount'];
    }
    if (isset($settings['allow_other_amount']) && is_bool($settings['allow_other_amount'])) {
      $this->allow_other_amount = $settings['allow_other_amount'];
    }
    if (isset($settings['default_amount'])) {
      $this->default_amount = $settings['default_amount'];
    }
    if (isset($this->request->data['Gift']['other_amount']) &&
         in_array($this->request->data['Gift']['other_amount'],$this->allowed_amount)) {
      $this->request->data['Gift']['amount'] = $this->request->data['Gift']['other_amount'];
      $this->request->data['Gift']['other_amount'] = '';
    }
    if (!isset($this->request->data['Gift']['amount'])) {
      $this->request->data['Gift']['amount'] = $this->default_amount;
    } elseif($this->request->data['Gift']['amount'] != 'other') {
      $this->request->data['Gift']['other_amount'] = '';
    }
  }

  function isAmountSelected($amount) {
    if(isset($this->request->data['Gift']['amount']) && $this->request->data['Gift']['amount']==$amount) {
      echo 'checked="1"';
    }
  }
 
  function getOtherAmount() {
    if (isset($this->request->data['Gift']['other_amount'])) {
      echo $this->request->data['Gift']['other_amount'];
    }
  }
}


<?php
// app/View/Helper/GiftHelper.php
class GiftHelper extends AppHelper {
  var $allowed_amount;
  var $allow_other_amount;
  var $default_amount;

  function __construct(View $view, $settings = array()) {
    $settings = array_merge(Configure::read('App.gift'), $settings);
    $this->init(&$view->request->data, $settings);
    parent::__construct($view, $settings);
  }

  function init(&$data, $settings = null) {
    if (isset($settings['allowed_amount']) && is_array($settings['allowed_amount'])) {
      $this->allowed_amount = $settings['allowed_amount'];
    }
    if (isset($settings['allow_other_amount']) && is_bool($settings['allow_other_amount'])) {
      $this->allow_other_amount = $settings['allow_other_amount'];
    }
    if (isset($settings['default_amount'])) {
      $this->default_amount = $settings['default_amount'];
    }
    if (isset($data['Gift']['other_amount'])) {
      if(isset($data['Gift']['amount']) && $data['Gift']['amount'] != 'other') {
        $data['Gift']['other_amount'] = '';
      }
      elseif(in_array($data['Gift']['other_amount'], $this->allowed_amount)) {
        $data['Gift']['amount'] = $data['Gift']['other_amount'];
        $data['Gift']['other_amount'] = '';
      }
    }
    if (!isset($data['Gift']['amount']) || ($data['Gift']['amount'] == 'other' && empty($data['Gift']['other_amount']))) {
      $data['Gift']['amount'] = $this->default_amount;
      $data['Gift']['other_amount'] = '';
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

  function getMinimum() {
    return $this->allowed_amount[0];
  }
/*
  function getMaximum() {
    return $this->allowed_amount[0];
  }
*/
}


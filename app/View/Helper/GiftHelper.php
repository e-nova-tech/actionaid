<?php
// app/View/Helper/GiftHelper.php
class GiftHelper extends AppHelper {
  var $preselectedAmounts;
  var $allowOtherAmount;
  var $defaultAmount;

  function __construct(View $view, $settings = array()) {
    $settings = array_merge(Configure::read('App.gift'), $settings);
    $this->init(&$view->request->data, $settings);
    parent::__construct($view, $settings);
  }

  function init(&$data, $settings = null) {
    if (isset($settings['preselectedAmounts']) && is_array($settings['preselectedAmounts'])) {
      $this->preselectedAmounts = $settings['preselectedAmounts'];
    }
    if (isset($settings['allowOtherAmount']) && is_bool($settings['allowOtherAmount'])) {
      $this->allowOtherAmount = $settings['allowOtherAmount'];
    }
    if (isset($settings['defaultAmount'])) {
      $this->defaultAmount = $settings['defaultAmount'];
    }
    if (isset($data['Gift']['otherAmount'])) {
      if(isset($data['Gift']['amount']) && $data['Gift']['amount'] != 'other') {
        $data['Gift']['otherAmount'] = '';
      }
      elseif(in_array($data['Gift']['otherAmount'], $this->preselectedAmounts)) {
        $data['Gift']['amount'] = $data['Gift']['otherAmount'];
        $data['Gift']['otherAmount'] = '';
      }
    }
    if (!isset($data['Gift']['amount']) || ($data['Gift']['amount'] == 'other' && empty($data['Gift']['otherAmount']))) {
      $data['Gift']['amount'] = $this->defaultAmount;
      $data['Gift']['otherAmount'] = '';
    }
    
  }

  function isAmountSelected($amount) {
    if(isset($this->request->data['Gift']['amount']) && $this->request->data['Gift']['amount']==$amount) {
      echo 'checked="1"';
    }
  }

  public function getAmounts() {
    return $this->preselectedAmounts;
  }

  public function allowOtherAmount() {
    return $this->allowOtherAmount;
  }

  public function getOtherAmount() {
    if (isset($this->request->data['Gift']['otherAmount'])) {
      echo $this->request->data['Gift']['otherAmount'];
    }
  }

}


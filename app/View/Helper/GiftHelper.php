<?php
// app/View/Helper/GiftHelper.php
class GiftHelper extends AppHelper {
  var $preselected_amounts;
  var $allow_other_amount;
  var $default_amount;

  function __construct(View $view, $settings = array()) {
    $settings = array_merge(Configure::read('App.gift'), $settings);
    $this->init(&$view->request->data, $settings);
    parent::__construct($view, $settings);
  }

  function init(&$data, $settings = null) {
    if (isset($settings['preselected_amounts']) && is_array($settings['preselected_amounts'])) {
      $this->preselected_amounts = $settings['preselected_amounts'];
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
      elseif(in_array($data['Gift']['other_amount'], $this->preselected_amounts)) {
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

  public function getAmounts() {
    return $this->preselected_amounts;
  }

  public function allowOtherAmount() {
    return $this->allow_other_amount;
  }

  public function getOtherAmount() {
    if (isset($this->request->data['Gift']['other_amount'])) {
      echo $this->request->data['Gift']['other_amount'];
    }
  }

}


<?php
/**
 * Transaction Model
 * 
 * @package     app.Model.Transaction
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

 
class Transaction extends AppModel {
  public $name = 'Transaction';
  
  // see _getValidationRules
  var $validate = array();
  
  var $hasOne = array("BilldeskTransactionResponse");
  var $belongsTo = array("Gateway", "Gift");
  
  // Constants
  const SUCCESS = "success";
  const FAILURE = "failure";
  const REQUEST = "request";
  const RESPONSE = "response";
  
  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = Transaction::getValidationRules();
  }

  static function getValidationRules($context=null) {
    return array(
      'type' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a type')
        ),
        'enum' => array(
          'rule' => array('custom', '/^(request|response)$/'),
          'message' => __('type should be either request or response')
        )
      ),
      'status' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a status')
        ),
        'enum' => array(
          'rule' => array('custom', '/^(success|failure)$/'),
          'message' => __('status should be either success or failure')
        )
      ),
      'status_code' => array(
        'pattern' => array( 
          'rule' => array ('custom', '/^[A-Z0-9]{1,4}$/'),
          'message' => __('Please enter a valid status code : only digits are allowed')
        )
      ),
      'ip' => array(
        'pattern' => array( 
          'rule' => array ('custom', '/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/'),
          'message' => __('Please enter a valid ip address')
        )
      ),
      'data' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a status')
        )
      )
    );
  }
}


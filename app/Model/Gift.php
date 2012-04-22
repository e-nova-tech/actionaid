<?php
/**
 * Gift Model
 * 
 * @package     app.Model.Gift
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Gift extends AppModel {
  public $name = 'Gift';

  // relationships
  public $belongsTo = array(
    'Person' => array(
      'className'    => 'Person',
      'dependent'    => false
    ),
    'Appeal' => array(
      'className'    => 'Appeal',
      'dependent'    => false
    )
  );
  
  public $hasMany = array(
    'Transaction' => array(
      'className'    => 'Transaction',
      'dependent'    => false
    )
  );

  // see _getValidationRules
  var $validate = array();

  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = Gift::getValidationRules();
  }

  static function getValidationRules($context=null) {
    return array(
      'amount' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a gift amount')
        ),
        'numeric' => array(
          'rule' => array('numeric'),
          'message' => __('Please select a valid gift amount')
        ),
        'minimum' => array(
          'rule' => array('checkMinimum'),
          'message' => __('Please select a valid gift amount')
        ),
        'maximum' => array(
          'rule' => array('checkMaximum'),
          'message' => __('Please select a valid gift amount')
        )
      ),
      'source' => array(
        'allowedChoice' => array(   
          'required' => false, 
          'allowEmpty' => true,          
          'rule' => array('inList', array('Friends','Search Engine','Newspaper','Website','Promotional Message','ActionAid Employee','I am already a donor','Other')),              
          'message' => __('Enter a value that is in the list')
        )
      )
    );
  }

  function checkMinimum($check) {
     return $check['amount'] >= Configure::read('App.gift.minimumAmount');
  }

  function checkMaximum($check) {
     return $check['amount'] < Configure::read('App.gift.maximumAmount');
  }
}


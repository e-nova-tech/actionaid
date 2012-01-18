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
  public $hasOne = array(
    'Person' => array(
      'className'    => 'Person',
      'dependent'    => false
    ),
    'Appeal' => array(
      'className'    => 'Appeal',
      'dependent'    => false
    )
  );

  // valiation rules
  var $validate = array(
    'amount' => array(
      'empty'   => array('rule' => array('notempty')),
      'numeric' => array('rule' => array('numeric')),
      'minimum' => array('rule' => array('checkMinimum')),
      'maximum' => array('rule' => array('checkMaximum'))
    )
  );
  
  //TODO minimum amount?
  function checkMinimum() {
     return true;
  }

  //TODO maximum amount?
  function checkMaximum() {
     return true;
  }
}


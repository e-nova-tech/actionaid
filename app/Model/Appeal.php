<?php
/**
 * Appeal Model
 * 
 * @package     app.Model.Appeal
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Appeal extends AppModel {
  public $name = 'Appeal';

  // relationships
  public $hasMany = array(
    'Gift' => array(
      'className'    => 'Gift',
      'dependent'    => false
    )
  );

  // validation
  var $validate = array(
    'name' => array(
      'empty'  => array('rule' => array('notempty')),
      'length' => array('rule' => array('maxLength',64)),
    ),
    'slug' => array(
      'empty'  => array('rule' => array('notempty')),
      'lenght' => array('rule' => array('maxLength',64)),
      'format' => array( 'rule' => array ('custom', '/^[a-zA-Z0-9\-]{2,}$/')),
    ),
    'description' => array(
      'empty'  => array('rule' => array('notempty')),
      'length' => array('rule' => array('maxLength',128))
    ),
  );
  
  function checkMinimum() {
     return false;
  }

  function checkMaximum() {
     return false;
  }
}


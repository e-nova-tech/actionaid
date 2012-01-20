<?php
/**
 * Person Model
 *
 * @package     app.Model.Person
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Person extends AppModel {
  public $name = 'Person';

  // relationships  
  var $hasOne = array(
    'State' => array(
      'className'  => 'State',
      'foreignKey' => false,
			'conditions' => 'Person.state = State.code'
    ),
    'Country' => array(
      'className'  => 'Country',
      'foreignKey' => false,
			'conditions' => 'Person.country = Country.code'
    )
  );

  // validation rules
  var $validate = array(
    'title' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'exist' => array('rule' => array('validateTitle'))
    ),
    'firstname' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'alpha'  => array('rule' => array('alphanumeric')),
      'length' => array('rule' => array('maxLength', '64'))
    ),
    'lastname' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'alpha'  => array('rule' => array('alphanumeric')),
      'length' => array('rule' => array('maxLength', '64'))
    ),
    'address1' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'length' => array('rule' => array('maxLength', '128'))
    ),
    'address2' => array(
      'length' => array('rule' => array('maxLength', '128'))
    ),
    'city' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'alpha'  => array('rule' => array('alphanumeric')),
      'length' => array('rule' => array('maxLength', '128'))
    ),    
    'pincode' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'numeric'=> array('rule' => array('numeric')),
      'length' => array('rule' => array('between', '6', '6'))
    ),
    'state' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'length' => array('rule' => array('between', '5', '5')),
      'format' => array( 'rule' => array ('custom', '/^[A-Z]{2}[\-]{1}[A-Z]{2}$/')),
      'exist'  => array('rule' => array('validateState'))
    ),
    'country' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'length' => array('rule' => array('between', '2', '2')),
      'format' => array( 'rule' => array ('custom', '/^[A-Z]{2}$/')),
      'exist'  => array('rule' => array('validateCountry'))
    ),
    'email' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'email'  => array('rule' => array('email'))
    ),
    'phone' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'format' => array( 'rule' => array ('custom', '/^[0-9\-\+]{8,16}$/'))
    ),
    'dob' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'format' => array('rule' => array('date', 'ymd'))
    ),
    'pan' => array(
      'empty'  => array('rule' => array('notEmpty'),'required' => true,'allowEmpty' => false),
      'format' => array('rule' => array('custom', '/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/')),
      'length' => array('rule' => array('between', '10', '10'))
    )
  );
  
  // Custom validation rules
  function validateTitle($check) {
    // allowed titles are defined as enum values, described in the schema
    preg_match_all("/\'([^\']+)\'/", $this->_schema['title']['type'], $strEnum);
    return in_array(ucfirst($check['title']),$strEnum[1]);
  }

  function validateState($check) {    
    $exist = $this->State->find('count', array(
      'conditions' => "State.code = '". $check['state']."'",
      'recursive' => -1
    ));
    return $exist;
  }

  function validateCountry($check) {
    $exist = $this->Country->find('count', array(
      'conditions' => "Country.code = '". $check['country']."'",
      'recursive' => -1
    ));
    return $exist;
  }
}

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
  // see _getValidationRules
  public $validate = array();

  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = Person::getValidationRules();
  }

  static function getValidationRules($context=null) {
     return array(
      'title' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a title')
        ),
        'exist' => array(
          'rule' => array('validateTitle'),
          'message' => __('Please select a valid title')
        )
      ),
      'firstname' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your firstname')
        ),
        'alpha'  => array(
          'rule' => array('alphanumeric'),
          'message' => __('Your name should not contain special characters (ex: ! or ? or #)')
        ),
        'length' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your firstname should not be longer than 64 characters')
        )
      ),
      'lastname' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your lastname')
        ),
        'alpha'  => array(
          'rule' => array('alphanumeric'),
          'message' => __('Your name should not contain special characters (ex: ! or ? or #)')
        ),
        'length' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your lastname should not be longer than 64 characters')
        )
      ),
      'address1' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an address')
        ),
        'length' => array(
          'rule' => array('maxLength', '128'),
          'message' => __('Your address first line should not be longer than 128 characters')
        )
      ),
      'address2' => array(
        'length' => array(
          'rule' => array('maxLength', '128'),
          'message' => __('Your address second line should not be longer than 128 characters')
        )
      ),
      'city' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate a city')
        ),
        'alpha'  => array(
          'rule' => array('alphanumeric'),
          'message' => __('Your city name should not contain special characters (ex: ! or ? or #)')
        ),
        'length' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your city name should not be longer than 64 characters')
        )
      ),    
      'pincode' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your pincode')
        ),
        'format'=> array(
          'rule' => array('custom', '/^[0-9]{6}$/'),
          'message' => __('Your pincode should be composed of 6 digits')
        )
      ),
      'state' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a state')
        ),
        'format' => array( 
          'rule' => array ('custom', '/^[A-Z]{2}[\-]{1}[A-Z]{2}$/'),
          'message' => __('Please select a valid state')
        ),
        'exist'  => array(
          'rule' => array('validateState'),
          'message' => __('Please select a valid state')
        )
      ),
      'country' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a country')
        ),
        'format' => array( 
          'rule' => array ('custom', '/^[A-Z]{2}$/'),
          'message' => __('Please select a valid country')
        ),
        'exist'  => array(
          'rule' => array('validateCountry'),
          'message' => __('Please select a valid country')
        )
      ),
      'email' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an email address')
        ),
        'email'  => array(
          'rule' => array('email'),
          'message' => __('Please provide a valid email address')
        )
      ),
      'phone' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide a phone number')
        ),
        'format' => array( 
          'rule' => array ('custom', '/^[0-9\-\+]{8,16}$/'),
          'message' => __('Please provide a valid phone number')
        )
      ),
      'dob' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your date of birth')
        ),
        'format' => array(
          'rule' => array('date', 'ymd'),
          'message' => __('Please indicate a valid date of birth')
        ),
        'legal' => array(
          'rule' => array('isAnAdult'),
          'message' => __('Sorry but you have to be at least 18 to donate.')
        )
      ),
      'pan' => array(
        'empty'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your PAN number')
        ),
        'format' => array(
          'rule' => array('custom', '/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/'),
          'message' => __('Please indicate a valid PAN number (ex: AAAAA9999A')
        )
      )
    );
  }

  // Custom validation rules
  function validateTitle($check) {
    // allowed titles are defined as enum values, described in the schema
    preg_match_all("/\'([^\']+)\'/", $this->_schema['title']['type'], $strEnum);
    return in_array(ucfirst($check['title']),$strEnum[1]);
  }

  function isAnAdult($check) {
    $currentYear = new DateTime(date('Y-m-d'));
    $birthYear = new DateTime($check['dob']);
    $interval = $currentYear->diff($birthYear);
    return ($interval->y >= Configure::read('App.gift.minimum_age')) ;
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

  static function getFindConditions($context, $data) {
    $conditions = array();
    switch($context) {
      case 'findDuplicates':
        $conditions = array(
          'Person.title' => $data['Person']['title'], 
          'Person.dob'       => $data['Person']['dob']['year'].'-'.$data['Person']['dob']['month'].'-'.$data['Person']['dob']['day'], 
          'Person.firstname' => $data['Person']['firstname'],
          'Person.lastname'  => $data['Person']['lastname'],
          'Person.address1'  => $data['Person']['address1'],
          'Person.address2'  => $data['Person']['address2'],
          'Person.city'      => $data['Person']['city'],
          'Person.pincode'   => $data['Person']['pincode'],
          'Person.state'     => $data['Person']['state'],
          'Person.country'   => $data['Person']['country'],
          'Person.email'     => $data['Person']['email'],
          'Person.pan'       => $data['Person']['pan']
        );
      break;
    }
   return $conditions;
  }
}

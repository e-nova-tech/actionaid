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
    /*'State' => array(
      'className'  => 'State',
      'foreignKey' => false,
			'conditions' => 'Person.state = State.code'
    ),*/
    'Country' => array(
      'className'  => 'Country',
      'foreignKey' => false,
			'conditions' => 'Person.country = Country.code'
    )
  );
  // see getValidationRules
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
      'name' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your name')
        ),
        'alphaplus'  => array(
          'rule' => array('alphaplus'),
          'message' => __('Your name should not contain unecessary punctuation characters')
        ),
        'maxlength' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your name should not be longer than 64 characters')
        )
      ),
      'address1' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an address')
        ),
        'maxlength' => array(
          'rule' => array('maxLength', '128'),
          'message' => __('Your address first line should not be longer than 128 characters')
        )
      ),
      'address2' => array(
        'maxlength' => array(
          'rule' => array('maxLength', '128'),
          'message' => __('Your address second line should not be longer than 128 characters')
        )
      ),
      'city' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate a city')
        ),
        'alphaplus'  => array(
          'rule' => array('alphaplus'),
          'message' => __('Your city name should not contain unecessary punctuation characters')
        ),
        'rangelength' => array(
          'required' => true,
          'allowEmpty' => false,
          'rule' => array('between','2', '64'),
          'message' => __('Your city name should be between 2 and 64 characters long')
        )
      ),
      'pincode' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your pincode')
        ),
        'rangelength'=> array(
          'rule' => array('between', 6, 6),
          'message' => __('A pincode should be composed of 6 digits')
        ),
        'pattern'=> array(
          'rule' => array('custom', '/^[0-9]{6}$/'),
          'message' => __('A pincode should be composed of 6 digits')
        )
      ),
      /*'state' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a state')
        ),
        'pattern' => array( 
          'rule' => array ('custom', '/^[A-Z]{2}[\-]{1}[A-Z]{2}$/'),
          'message' => __('Please select a valid state')
        ),
        'exist'  => array(
          'rule' => array('validateState'),
          'message' => __('Please select a valid state')
        )
      ),*/
      'country' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please select a country')
        ),
        'pattern' => array( 
          'rule' => array ('custom', '/^[A-Z]{2}$/'),
          'message' => __('Please select a valid country')
        ),
        'exist'  => array(
          'rule' => array('validateCountry'),
          'message' => __('Please select a valid country')
        )
      ),
      'email' => array(
        /* uncomment if required
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an email address')
        ),*/
        'email'  => array(
          'required' => false,   // remove if required
          'allowEmpty' => true,  // remove if required 
          'rule' => array('email'),
          'message' => __('Please provide a valid email address')
        )
        // TODO required if creating user account
      ),
      'phone' => array(
        /* uncomment if required
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an email address')
        ),*/
        'pattern' => array(
          'required' => false,   // remove if required
          'allowEmpty' => true,  // remove if required 
          'rule' => array ('custom', '/^(((00){1}|(\+){1})[0-9]{2,3}){0,1}[0-9]{6,11}$/'),
          'message' => __('Please provide a valid phone number')
        )
      ),
      'dob' => array(
        /* uncomment if required
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your date of birth')
        ),*/
        'dateOfBirth' => array(
          'required' => false,   // remove if required
          'allowEmpty' => true,  // remove if required 
          'rule' => array('date', 'ymd'),
          'message' => __('Please indicate a valid date of birth')
        ),
        'legal' => array(
          'rule' => array('isAnAdult'),
          'message' => __('Sorry but you have to be at least 18 to donate.')
        ),
        'tooOld' => array(
          'rule' => array('isNotTooOld'),
          'message' => __('Sorry, but it seems unlikely that your are that old...')
        )
      ),
      'pan' => array(
        /*'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please indicate your PAN number')
        ),*/
        'format' => array(
          'required' => false,   // remove if required
          'allowEmpty' => true,  // remove if required 
          'rule' => array('custom', '/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/'),
          'message' => __('Please indicate a valid PAN number (ex: AAAAA9999A')
        )
      ),
      'agerange' => array(
        'allowedChoice' => array(   
          'required' => false,
          'allowEmpty'=>true,           
          'rule' => array('inList', array('18-24','25-34','35-50','50+')),              
          'message' => __('Enter a value that is in the list')
        )
      )
    );
  }

  /**
   * Before Validate
   * @see http://api20.cakephp.org/class/model#method-ModelbeforeValidate
   */
  function beforeValidate($options) {
    //TODO cleanup phone
    if (isset($this->data['Person']['phone'])) {
      $this->data['Person']['phone'] = str_replace(array('.',' ','-'),'', $this->data['Person']['phone']);
    }
    return true;
  }

  function isAnAdult($check) {
    $currentYear = new DateTime(date('Y-m-d'));
    $birthYear = new DateTime($check['dob']);
    $interval = $currentYear->diff($birthYear);
    return ($interval->y >= Configure::read('App.gift.minimumAge')) ;
  }

  function isNotTooOld($check) {
    $currentYear = new DateTime(date('Y-m-d'));
    $birthYear = new DateTime($check['dob']);
    $interval = $currentYear->diff($birthYear);
    return ($interval->y <= 130);
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
        if(!empty($data['Person']['email'])){
          $conditions = array(
            'Person.email'     => $data['Person']['email']
          );
        }
        else{
          $conditions = array(
            'Person.name'      => $data['Person']['name'],
            'Person.address1'  => $data['Person']['address1'],
            'Person.city'      => $data['Person']['city'],
            'Person.pincode'   => $data['Person']['pincode'],
            'Person.country'   => $data['Person']['country'],
            'Person.phone'     => $data['Person']['phone']
          );
        }
      break;
    }
   return $conditions;
  }
}

<?php
/**
 * Contact Model
 *
 * @package     app.Model.Contact
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Contact extends AppModel {
  var $name = 'Contact';
  var $useTable = false; 
  public $validate = array(); // see getValidationRules

  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = Contact::getValidationRules();
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
        'minlength' => array(
          'rule' => array('minLength', '2'),
          'message' => __('Your name should be longer a bit longer...')
        ),
        'maxlength' => array(
          'rule' => array('maxLength', '64'),
          'message' => __('Your name should not be longer than 64 characters')
        )
      ),
      'subject' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide a subject')
        ),
        'rangelength' => array(
          'rule' => array('between', 2, 64),
          'message' => __('You message subject must be between 2 and 64 characters in length')
        )
      ),
      'email' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide an email address')
        ),
        'email'  => array(
          'rule' => array('email'),
          'message' => __('Please provide a valid email address.')
        )
      ),
      'message' => array(
        'required'  => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please provide a message')
        ),
        'rangelength' => array(
          'rule' => array('between', 2, 1024),
          'message' => __('Please provide a valid message')
        )
      )
    );
  }

  function schema() {
    return array (
      'name' => array('type' => 'string', 'length' => 64),
      'email' => array('type' => 'string', 'length' => 64),
      'message' => array('type' => 'text', 'length' => 1024),
      'subject' => array('type' => 'string', 'length' => 128),
    );
  }
}

<?php
/**
 * User Model
 *
 * @package     app.Model.User
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
  public $name = 'User';

  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = User::getValidationRules();
  }

  static function getValidationRules($context=null) {
    return array(
      'username' => array(
        'required' => array(
          'required' => true,
          'allowEmpty' => false,
          'rule' => array('notEmpty'),
          'message' => __('A username is required')
        ),
        'email' => array(
          'rule' => array('email'),
          'message' => __('The username should be a valid email address')
        )
      ),
      'password' => array(
        'required' => array(
          'required' => true,
          'allowEmpty' => false,
          'rule' => array('notEmpty'),
          'message' => __('A password is required')
        ),
        'minLength' => array(
          'rule' => array('minLength',5),
          'message' => __('Your password should be at least composed of 5 characters')
        )
      ),
      'role' => array(
        'valid' => array(
          'required' => true,
          'allowEmpty' => false,
          'rule' => array('inList', array('admin')),
          'message' => __('Please enter a valid role')
        )
      )
    );
  }

  public function beforeSave() {
    if (isset($this->data[$this->alias]['password'])) {
      $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
  }

  public static function get() {
    return AuthComponent::user();
  }

  public static function isAdmin() {
    $user = User::get();
    if (isset($user)) {
      return $user['role'] == 'admin';
    } 
    return false;
  }
}

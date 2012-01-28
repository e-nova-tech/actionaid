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
  public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A username is required'
      )
    ),
    'password' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A password is required'
      )
    ),
    'role' => array(
      'valid' => array(
        'rule' => array('inList', array('admin', 'author')),
        'message' => 'Please enter a valid role',
          'allowEmpty' => false
      )
    )
  );

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

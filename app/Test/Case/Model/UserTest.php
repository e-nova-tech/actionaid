<?php
/**
 * User Model Test
 *
 * @package     app.Test.Model.User
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('User', 'Model');
class UserTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->User = ClassRegistry::init('User');
  }

  public function testUsernameValidation() {
    $testcases = array(
      '' => false, '?!#' => false, 'test' => false,
      'test@test.com' => true, 'admin' => false
    );
    foreach($testcases as $testcase => $result) {      
      $user = array('User' => array('username' => $testcase));
      $this->User->set($user);
      if($result) $msg = 'validation of the username with '.$testcase.' should validate';
      else $msg = 'validation of the username with '.$testcase.' should not validate';
      $this->assertEqual($this->User->validates(array('fieldList' => array('username'))), $result, $msg);
    }
  }

  public function testPasswordValidation() {
    $testcases = array(
      '' => false, '?!#' => false, 'testss' => true
    );
    foreach($testcases as $testcase => $result) {      
      $user = array('User' => array('password' => $testcase));
      $this->User->set($user);
      if($result) $msg = 'validation of user password with '.$testcase.' should validate';
      else $msg = 'validation of user password with '.$testcase.' should not validate';
      $this->assertEqual($this->User->validates(array('fieldList' => array('password'))), $result, $msg);
    }
  }

}

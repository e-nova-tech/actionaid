<?php
/**
 * Gift Model Test
 *
 * @package     app.Test.Model.Gift
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Gift', 'Model');
class GiftTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->Gift = ClassRegistry::init('Gift');
  }

  public function testMinimumAmountValidation() {
    $testcases = array(
      '-1' => false, '0' => false, '1' => true, '3000' => true
    );
    foreach($testcases as $testcase => $result) {
      if($result) {
        $msg = 'validation of minimum gift amount with '.$testcase.' should validate';
      } else {
        $msg = 'validation of minimum gift amount with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Gift->checkMinimum(array('amount' => $testcase)), $result, $msg
      );
    }
  }

  public function testMaximumAmountValidation() {
    $testcases = array(
      '10000' => true, '100000' => true, '4294967295' => false, '9294967295' => false,
      '9999999999999999999999999999999999999999999999999999' => false
    );
    foreach($testcases as $testcase => $result) {
      if($result) {
        $msg = 'validation of maximum gift amount with '.$testcase.' should validate';
      } else {
        $msg = 'validation of maximum gift amount with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Gift->checkMaximum(array('amount' => $testcase)), $result, $msg
      );
    }
  }
}

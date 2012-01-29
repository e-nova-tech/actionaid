<?php
/**
 * Appeal Model Test
 *
 * @package     app.Test.Model.Appeal
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Appeal', 'Model');
class AppealTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->Appeal = ClassRegistry::init('Appeal');
  }

  public function testTitleValidation() {
    $testcases = array(
      '' => false,       '?!#' => true, 
      'test' => true,    'test (1)' => true,
      'test 1' => true,  'test-test' => true
    );
    foreach($testcases as $testcase => $result) {      
      $appeal = array('Appeal' => array('title' => $testcase));
      $this->Appeal->set($appeal);
      if($result) $msg = 'validation of appeal title with '.$testcase.' should validate';
      else $msg = 'validation of appeal title with '.$testcase.' should not validate';
      $this->assertEqual($this->Appeal->validates(array('fieldList' => array('title'))), $result, $msg);
    }
  }

  public function testSlugValidation() {
    $testcases = array(
      '' => false,       '?!#' => false, 
      'test' => true,    'test (1)' => false,
      'test 1' => false,  'test-test' => true,
      'sponsor-a-child' => true, 't' => true
    );
    foreach($testcases as $testcase => $result) {      
      $appeal = array('Appeal' => array('slug' => $testcase));
      $this->Appeal->set($appeal);
      if($result) $msg = 'validation of appeal slug with '.$testcase.' should validate';
      else $msg = 'validation of appeal slug with '.$testcase.' should not validate';
      $this->assertEqual($this->Appeal->validates(array('fieldList' => array('slug'))), $result, $msg);
    }
  }

}

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
App::uses('User', 'Model');
class AppealTestCase extends CakeTestCase {
 
  public function setup() {
    parent::setUp();
    $this->Appeal = ClassRegistry::init('Appeal');
  }

  public function testGetBySlug() {
    $appeal = $this->Appeal->getBySlug('default');
    $this->assertEqual(count($appeal),1);

    $appeal = $this->Appeal->getBySlug();
    $this->assertEqual($appeal['Appeal']['slug'],'default');

    $appeal = $this->Appeal->getBySlug('DDDdefault'); // wrong appeal = default
    $this->assertEqual($appeal['Appeal']['slug'],'default');

    // TODO test if admin & draft versus user & published
  }

  public function testGetStatusOptions() {
    $options = $this->Appeal->getStatusOptions();
    $this->assertEqual(count($options),3);
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
      'sponsor-a-dhild' => true, 't' => true,
      'default' => false
    );
    foreach($testcases as $testcase => $result) {      
      $appeal = array('Appeal' => array('slug' => $testcase));
      $this->Appeal->set($appeal);
      if($result) $msg = 'validation of appeal slug with '.$testcase.' should validate';
      else $msg = 'validation of appeal slug with '.$testcase.' should not validate';
      $this->assertEqual($this->Appeal->validates(array('fieldList' => array('slug'))), $result, $msg);
    }
  }

  public function testStatusValidation() {
    $testcases = array(
      '' => false, '?!#' => false, 'test' => false,
      'published' => true, 'draft' => true, 'archived' => true
    );
    foreach($testcases as $testcase => $result) {      
      $appeal = array('Appeal' => array('status' => $testcase));
      $this->Appeal->set($appeal);
      if($result) $msg = 'validation of appeal status with '.$testcase.' should validate';
      else $msg = 'validation of appeal status with '.$testcase.' should not validate';
      $this->assertEqual($this->Appeal->validates(array('fieldList' => array('status'))), $result, $msg);
    }
  }
}

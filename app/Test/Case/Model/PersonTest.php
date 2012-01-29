<?php
/**
 * Person Model Test
 *
 * @package     app.Test.Model.Person
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Person', 'Model');
class PersonTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->Person = ClassRegistry::init('Person');
  }

  public function testDobValidation() {    
    $testcases = array(
      '' => false,
      '2000-01-01' => false, '1800-01-01'  => false, // too young or too old
      '1990-01-01' => true,  '1960-01-01'  => true
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'dob' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of person dob with '.$testcase.' should validate';
      } else {
        $msg = 'validation of person dob with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('dob'))), $result, $msg
      );
    }
  }


  public function testStateValidation() {
    $testcases = array(
      'IN-AP' => true, 
      'AP-IN' => false, 
      'XX-IN' => false 
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'state' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of state with '.$testcase.' should validate';
      } else {
        $msg = 'validation of state with '.$testcase.' should not validate';
      }
      $this->assertEqual($this->Person->validates(array('fieldList' => array('state'))), $result, $msg);
      $this->assertEqual($this->Person->validateState(array('state' => $testcase)), $result, $msg);
    }
  }

  public function testCountryValidation() {
    $testcases = array(
      'IN' => true, 
      'XX' => false, 
      'XWX' => false 
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'country' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of country with '.$testcase.' should validate';
      } else {
        $msg = 'validation of country with '.$testcase.' should not validate';
      }
      $this->assertEqual($this->Person->validates(array('fieldList' => array('country'))), $result, $msg);
      $this->assertEqual($this->Person->validateCountry(array('country' => $testcase)), $result, $msg);
    }
  }

  public function testGetFindConditions() {
    $testcase = array( 
      'Person' => array(
        'title'     => 'Mr', 
        'dob'       => array('year'=>'1981','month'=>'01','day'=>'01'),
        'firstname' => 'test',
        'lastname'  => 'test',
        'address1'  => 'test',
        'address2'  => 'test',
        'city'      => 'test',
        'pincode'   => '123456',
        'state'     => 'IN-AP',
        'country'   => 'IN',
        'email'     => 'test@test.com',
        'phone'     => '111111111',
        'pan'       => 'AAAAA9999A'
      )
    );
    $results = $this->Person->getFindConditions('findDuplicates',$testcase);
    $this->assertEqual(sizeof($results),sizeof($testcase['Person']));
  }

  public function testPersonTitleValidation() {
    $testcases = array(
      'Ms'   => true,   'ms'   => false,
      'Mrs'  => true,   'mrs'  => false,
      'Mr'   => true,   'mr'   => false,
      'Dr'   => true,   'dr'   => false,
      'Prof' => true,   'prof' => false,
      '#'    => false,  '1'    => false,
      'biloute' => false
    );
    foreach($testcases as $testcase => $result) {
      $person = array('Person' => array(
        'title' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of person title with '.$testcase.' should validate';
      } else {
        $msg = 'validation of person title with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('title'))), $result, $msg
      );
    }
  }

  public function testPersonCityValidation() {
    $testcases = array(
      '#' => false,
      'd' => false,
      '22' => false,
      'd22' => false,
      'delhi' => true,
      'rémy' => false,
      'delhi-ji' => true,
      "delhi'ji" => true,
      'Dehri-on-Sone' => true,
      "delhi'ji-ji" => true,
      'Dehri-on-Sone-' => false,
      '-Dehri-on-Sone' => false,
      'Dehri-on--Sone' => false
    );
    foreach($testcases as $testcase => $result) {
      $person = array('Person' => array(
        'city' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of city name with '.$testcase.' should validate';
      } else {
        $msg = 'validation of city name with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('city'))), $result, $msg
      );
    }
  }
}

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

  public function testPersonTitleValidation() {
    $testcases = array(
      '' => false,
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

  public function testDobValidation() {    
    $testcases = array(
      '' => true,
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

  public function testFirstnameValidation() {    
    $testcases = array(
      '' => true,
      'rémy' => true, 'kevin'  => true,
      '!rémy' => false, 'kevin-metha'  => true,
      'kev du getho' => true, "kevin d'la haute" => true
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'firstname' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of person firstname with '.$testcase.' should validate';
      } else {
        $msg = 'validation of person firstname with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('firstname'))), $result, $msg
      );
    }
  }

  public function testLastnameValidation() {    
    $testcases = array(
      '' => false,
      'muller' => true, 'müller'  => true,
      'rémy' => true, 'kevin-metha'  => true,
      'kev du getho' => true, "kevin d'la haute" => true
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'lastname' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of person lastname with '.$testcase.' should validate';
      } else {
        $msg = 'validation of person lastname with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('lastname'))), $result, $msg
      );
    }
  }

  public function testCityValidation() {    
    $testcases = array(
      '' => false,               'a' => false,
      '#' => false,              'd2' => false,
      'as' => true,              'delhi' => true,
      'rémy' => true,            'delhi-ji' => true,
      "delhi'ji" => true,        'Dehri-on-Sone' => true,
      "delhi'ji-ji" => true,     'Dehri-on-Sone-' => false,
      '-Dehri-on-Sone' => false, 'Dehri-on--Sone' => false,
      'saint-émilion' => true
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'city' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of city with '.$testcase.' should validate';
      } else {
        $msg = 'validation of city with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('city'))), $result, $msg
      );
    }
  }

  public function testPincodeValidation() {    
    $testcases = array(
      '' => false,
      '1' => false,
      '111 ss' => false,
      'ssssss' => false,
      '123456' => true,
      '123 45' => false,
      '1234567' => false
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'pincode' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of pincode with '.$testcase.' should validate';
      } else {
        $msg = 'validation of pincode with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('pincode'))), $result, $msg
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

  public function testPhoneValidation() {    
    $testcases = array(
      '' => true,
      'dddddddddd' => false,
      '+91' => false,
      '1' => false,
      '12345' => false,
      '1234567890' => true,
      '00911234567890' => true,
      '+911234567890' => true,
      '12-34567890' => true, // trimed in beforeValidate
      '123-4567890' => true,
      '1234-567890' => true,
      '12.35.56.68.90' => true,
      '12 35 56 68 90' => true,
      '12345678' => true,  // without area code is also ok
      '1234567' => true,
      '123456' => true
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'phone' => $testcase
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of person phone with '.$testcase.' should validate';
      } else {
        $msg = 'validation of person phone with '.$testcase.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('phone'))), $result, $msg
      );
    }
  }

  public function testBeforeValidate() {
    $testcases = array(
      '12-34567890' => false,
      '12-34-56-78-90' => false, 
      '12.35.56.68.90' => false,
      '12 35 56 68 90' => false
    );
    foreach($testcases as $testcase => $result) {      
      $person = array('Person' => array(
        'phone' => $testcase
      ));
      $this->Person->set($person);
      $this->Person->beforeValidate(array());
      $trims = array('-',' ','.');
      foreach($trims as $trim) {
        $msg = $trim.' in phone '.$testcase.' should be removed';
        $this->assertEqual(
          strpos($this->Person->data['Person']['phone'],$trim), $result, $msg
        );    
      }
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

}

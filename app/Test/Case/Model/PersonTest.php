<?php
App::uses('Person', 'Model');

class GiftTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->Person = ClassRegistry::init('Person');
  }

  public function testPersonAgeValidation() {    
    $fixtures = array(
      'Ms' => true,   'ms' => false,
      'Mrs' => true,  'mrs' => false,
      'Mr' => true,   'mr' => false,
      'Dr' => true,   'dr' => false,
      'Prof' => true, 'prof' => true,
      '#' => false,   '1' => false,
      'biloute' => false
    );
    foreach($fixtures as $fixture => $result) {
      if($result) {
        $msg = 'validation of person title with '.$fixture.' should validate';
      } else {
        $msg = 'validation of person title with '.$fixture.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('city'))), $result, $msg
      );
    }
  }

  public function testPersonTitleValidation() {
    $fixtures = array(
      'Ms' => true,   'ms' => false,
      'Mrs' => true,  'mrs' => false,
      'Mr' => true,   'mr' => false,
      'Dr' => true,   'dr' => false,
      'Prof' => true, 'prof' => true,
      '#' => false,   '1' => false,
      'biloute' => false
    );
    foreach($fixtures as $fixture => $result) {
      if($result) {
        $msg = 'validation of person title with '.$fixture.' should validate';
      } else {
        $msg = 'validation of person title with '.$fixture.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('title'))), $result, $msg
      );
    }
  }

  public function testPersonCityValidation() {
    $fixtures = array(
      '#' => false,
      'd' => true,
      'delhi' => true,
      'delhi-ji' => true,
      'Dehri-on-Sone' => true,
      "delhi'ji-ji" => true
    );
    foreach($fixtures as $fixture => $result) {
      $person = array('Person' => array(
        'city' => $fixture
      ));
      $this->Person->set($person);
      if($result) {
        $msg = 'validation of city name with '.$fixture.' should validate';
      } else {
        $msg = 'validation of city name with '.$fixture.' should not validate';
      }
      $this->assertEqual(
        $this->Person->validates(array('fieldList' => array('city'))), $result, $msg
      );
    }
  }
}

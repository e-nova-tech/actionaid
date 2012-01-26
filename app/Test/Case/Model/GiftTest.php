<?php
App::uses('Gift', 'Model');

class GiftTestCase extends CakeTestCase {

  public function setup() {
    parent::setUp();
    $this->Gift = ClassRegistry::init('Gift');
  }

  public function testValidation() {

  }
}

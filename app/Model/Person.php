<?php
// app/Model/Person.php
class Person extends AppModel {
  public $name = 'Person';

  var $validate = array(
    'firstname' => array(
      'notempty' => array(
        'rule' => array('notempty')
      )
    ),
    'lastname' => array(
      'notempty' => array(
        'rule' => array('notempty')
      )
    ),
    'email' => array(
      'notempty' => array(
        'rule' => array('notempty')
      ),
      'email' => array(
        'rule' => array('email')
      )
    )
  );

}


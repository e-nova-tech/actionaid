<?php
// app/Model/Gift.php
class Gift extends AppModel {
  public $name = 'Gift';
  public $hasOne = array(
    'Person' => array(
      'className'    => 'Person',
      'dependent'    => false
    ),
    'Appeal' => array(
      'className'    => 'Appeal',
      'dependent'    => false
    )
  );
}


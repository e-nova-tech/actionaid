<?php
/**
 * Appeals Controller
 *
 * @package     app.Controller.AppealsController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppealsController extends AppController {
  public $name = 'Appeals';

  public function admin_index() {
    public $paginate = array(
      'fields' => array('Appeal.name', 'Appeal.description','Appeal.modified'),
      'limit' => 25,
      'order' => array(
        'Appeal.name' => 'asc'
      )
    );
  }

}
<?php
/**
 * Application Controller
 * 
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
 * @package       app.Controller.AppController
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppController extends Controller {
  var $helpers = array(
    'Html','Form','Paginator','Session',
    'MyForm','MyPaginator',/*'Tidy',*/'Gift'
  );

  public $components = array(
    'Session', 'Paginator',
    'Auth' => array(
      'loginRedirect' => array('controller' => 'posts', 'action' => 'admin_index'),
      'logoutRedirect' => '/gifts/add',
    )
  );

  function beforeRender() {
    if(isset($this->request->params['admin'])) {
      $this->layout = "admin";
    }
  }

  function isAuthorized($user) {
    if (isset($this->request->params['admin'])) {
      return (bool)($user['role'] == 'admin');
    }
    return true;
  }
}

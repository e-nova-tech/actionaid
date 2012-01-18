<?php
/**
 * Application Controller
 * 
 * @package     app.Controller.AppController
 * @copyright   Copyright 2012, ActionAid India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppController extends Controller {
  var $helpers = array(
    'Html','Form','Paginator','Session',
    'MyForm','MyPaginator',/*'Tidy',*/'Gift'
  );

  public $components = array(
    'Session', 'Paginator', 'Auth', 'Cookie'
  );

  public function beforeFilter() {
    // components initilization
    $this->Auth->loginRedirect = Configure::read('App.auth.loginRedirect');
    $this->Auth->logoutRedirect = Configure::read('App.auth.logoutRedirect');
    $this->Cookie->name = Configure::read('App.cookie.name');
  }

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

<?php
/**
 * Application Controller
 * 
 * @package     app.Controller.AppController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppController extends Controller {
  var $helpers = array(
    'Html','Form','Paginator','Session',
    'MyForm','MyPaginator','Gift','Menu'
    /*,'Tidy' // buggy with script! */
  );

  public $components = array(
    'Session', 'Paginator', 'Auth', 'Cookie'
  );

  public function beforeFilter() {
    // components initilization
    $this->Auth->loginRedirect = Configure::read('App.auth.loginRedirect');
    $this->Auth->logoutRedirect = Configure::read('App.auth.logoutRedirect');
    $this->Cookie->name = Configure::read('App.cookie.name');
    
    // autoset layout if prefix in url
    if(isset($this->request->params['admin'])  && $this->request->action != 'admin_login') {
      $this->layout = 'admin';
    }
  }

  function isAuthorized($user) {
    if (isset($this->request->params['admin'])) {
      return (bool)($user['role'] == 'admin');
    }
    return true;
  }
}

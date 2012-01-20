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
    'MyHtml','MyForm','MyPaginator','Gift','Menu'
    /*,'Tidy' // buggy with script! */
  );

  public $components = array(
    'Session', 'Paginator', 'Auth', 'Cookie'
  );

  /**
   * Before Filter Cake Hook
   * @link http://api20.cakephp.org/class/controller#method-ControllerbeforeFilter
   * @access protected
   */
  public function beforeFilter() {
    // components initilization
    $this->Auth->loginAction = Configure::read('App.auth.loginAction');
    $this->Auth->loginRedirect = Configure::read('App.auth.loginRedirect');
    $this->Auth->logoutRedirect = Configure::read('App.auth.logoutRedirect');
    $this->Cookie->name = Configure::read('App.cookie.name');
    
    // autoset layout if prefix in url
    if(isset($this->request->params['admin'])  && $this->request->action != 'admin_login') {
      $this->layout = 'admin';
    }
  }

  /**
   * Authorization check callback
   * @link http://api20.cakephp.org/class/auth-component#method-AuthComponentisAuthorized
   * @param mixed $user The user to check the authorization of. If empty the user in the session will be used.
   * @return boolean True if $user is authorized, otherwise false
   * @access protected
   */
  function isAuthorized($user) {
    if (isset($this->request->params['admin'])) {
      return (bool)($user['role'] == 'admin');
    }
    return true;
  }
}

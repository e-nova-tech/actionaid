<?php
// app/Controller/AppController.php
//App::import('Model', array('User'));
class AppController extends Controller {
  var $helpers = array('Html','Form','MyForm','Session','Tidy','Gift');
 
  public $components = array(
    'Session',
    'Auth' => array(
      'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
      'logoutRedirect' => array('controller' => 'gifts', 'action' => 'add')
    )
  );

  function isAuthorized($user) {
    if (isset($this->request->params['admin'])) {
      return (bool)($user['role'] == 'admin');
    }
    return true;
  }
}

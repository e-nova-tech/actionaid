<?php
/**
 * Users Controller
 * 
 * @package     app.Controller.UsersController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class UsersController extends AppController {
  public $name = 'Users';

  /**
   * Before Filter Cake Hook
   * @link http://api20.cakephp.org/class/controller#method-ControllerbeforeFilter
   * @access protected
   */
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('logout', 'login');
    //$this->Auth->allow('admin_add');
  }

  public function admin_index() {
    $this->set('users', $this->paginate());
  }

  public function admin_view($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $this->User->read(null, $id));
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    }
  }

  public function admin_edit($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->User->read(null, $id);
      unset($this->request->data['User']['password']);
    }
  }

  public function admin_delete($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->User->delete()) {
      $this->Session->setFlash(__('User deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('User was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

  // All about authentication
  public function admin_login() {
    if ($this->Auth->login()) {
       $this->redirect($this->Auth->redirect());
    } else {
      $this->Session->setFlash(__('Invalid username or password, try again'));
    }
  }

  public function admin_logout() {
    $this->redirect($this->Auth->logout());
  }
}

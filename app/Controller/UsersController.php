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
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {
  public $name = 'Users';

  /**
   * Before Filter Cake Hook
   * @link http://api20.cakephp.org/class/controller#method-ControllerbeforeFilter
   * @access protected
   */
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('admin_forgot_password','admin_reset_password');
  }

  /**
   * Admin Index
   * @access public
   */
  public function admin_index() {
    $this->set('users', $this->paginate());
  }

  /**
   * Admin View
   * @access public
   */
  public function admin_view($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $this->User->read(null, $id));
  }

  /**
   * Admin Add
   * @access public
   */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Message->success(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Message->error(__('The user could not be saved. Please, try again.'));
      }
    }
  }

  /**
   * Admin Edid
   * @access public
   */
  public function admin_edit($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->User->save($this->request->data)) {
        $this->Message->succes(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Message->error(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->User->read(null, $id);
      unset($this->request->data['User']['password']);
    }
  }

  /**
   * Admin Delete
   * @access public
   */
  public function admin_delete($id = null) {
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->User->delete()) {
      $this->Message->success(__('User deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Message->error(__('User was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

  /**
   * Admin Login
   * @access public
   */
  public function admin_login() {
    $this->layout = 'default';
    if ($this->Auth->login() && User::isAdmin()) {
       $this->redirect($this->Auth->redirect());
    } else {
      if ($this->request->is('post')) {
        $this->Message->error(__('Invalid username or password, try again'));
      }
    }
  }

  /**
   * Admin Logout
   * @access public
   */
  public function admin_logout() {
    $this->redirect($this->Auth->logout());
  }

  /**
   * Forgotten password procedure
   * Uses the one time authentication key mechanism sent by email
   * @return void
   * @access public
   */
  public function admin_forgot_password() {
    $this->layout = 'default';
    // only apply when the user is not already logged in
    if (User::isAdmin()) {
      $this->redirect('/admin/home');
      exit;
    }
    // if some data is submited
    if ($this->request->is('post') && !empty($this->request->data)) {
      // Validate input and get the user if any
      $this->User->setValidationRules('forgot_password');
      $this->User->set($this->request->data);
      // must be a valid username 
      if (!$this->User->validates()) {
        $this->User->validationErrors = null;
        $this->Message->error(__('This is not a valid username'));
        return;
      }
      // user must exist
      $user = $this->User->findByUsername($this->request->data['User']['username']);
      if (empty($user)) {
        $this->Message->error(__('This is not a valid username'));
        return;
      }
      // user must be active
      if (!$user['User']['active']) {
        // notify the user if account is disabled
        $this->Message->error(__('Your account have been disabled. Please contact our support.'));
        return;
      }
      
      // generate a recovery token from the auth key & userid      
      if (!isset($this->AuthKey) || empty($this->AuthKey)) {
        $this->AuthKey = Common::getModel('AuthKey');
      }
      $user['User']['token'] = $this->AuthKey->generateToken($user['User']['id']);
      // sent recovery token by email and notify the user
      if ($this->__sendResetPasswordEmail($user)) {
      $this->Message->success(
        __('An email was sent with the instructions to reset your password!'));
      } else {
        $this->Message->error(
        __('Oops, we are having some technical difficulties. Your message was not sent. 
             Please try again later.'));
      }
    }
  }

  /**
   * Forgotten password procedure
   * Uses the one time authentication key mechanism
   * @return true if email was sent
   * @access private
   */
  function __sendResetPasswordEmail($user) {
    $this->Mailer->email = new CakeEmail(Configure::read('App.emails.delivery'));
    $this->Mailer->email->from(Configure::read('App.emails.general.email'));
    $this->Mailer->email->to($user['User']['username']);
    $this->Mailer->email->subject(__('ActionAid - How to reset your password'));
    $this->Mailer->email->template('reset_password');
    $this->Mailer->email->emailFormat('text'); // todo based on pref
    $this->Mailer->email->viewVars(array('user' => $user));
    return ($this->Mailer->send());
  }

  /**
   * Password reset step
   * @param string(64) token provided by email (see. forgot_password)
   * @return void
   * @access public
   */
  public function admin_reset_password($token=null) {
    // reset password not available for logged in users
    if (User::isAdmin()) {
      $this->redirect('/admin/home');
      exit;
    }
    $redirect = Router::url('/admin/password/forgot',true);
    // check if the auth key is valid
    if (!isset($this->AuthKey) || empty($this->AuthKey)) {
      $this->AuthKey = Common::getModel('AuthKey');
    }
    $authKey = $this->AuthKey->validateToken($token);
    if(!$authKey) {
      $this->Message->error(
        $this->AuthKey->validationErrors, 
        array('redirect' => $redirect)
      );
    }
    
    $this->layout = 'default';
    $this->set('token',$token);

    // if new password is submited validate and save
    if($this->request->is('post')) {
      $this->User->set($this->request->data);
      $this->User->setValidationRules('resetPassword');
      if (!$this->User->validates()) {
        $this->Message->error(
          __('The password provided is invalid, please correct the errors bellow.')
        );
        return;
      }
      // return to hashes
      $authKey['User']['password'] = $this->request->data['User']['password'];
      $this->request->data['User'] = null;
      $saved = $this->User->save($authKey['User'], array(
        'validate' => false,
        'fieldList' => array('password')
      ));
      if (!$saved) {
        $this->Message->error(
          __('Oops, we are having technical difficulties and your new password could not be saved. 
              Please try again later.')
        );
        return;
      }

      // password was updated delete the authKey
      $saved = $this->AuthKey->delete($authKey['AuthKey']['id']);
      if($saved && Configure::read('debug')) {
        /*$this->Message->success(
          __('The authentication token have been deleted.')
        );*/
      } elseif(Configure::read('debug')) {
        $this->Message->error(
          __('Oops, an internal error occured and the authentication token could not be deleted.')
        );
      }
      // redirect user to login
      $this->Message->success(
        __('The password was sucessfully saved'),
        array('redirect' => '/admin/login')
      );
    }
  }
}

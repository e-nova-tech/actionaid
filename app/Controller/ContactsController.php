<?php
/**
 * Contract Controller
 * Some people want to get in touch with us?
 *
 * @package     app.Controller.ContactController
 * @copyright   Copyright 2012, ActionAid Association India
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class ContactsController extends AppController {
  var $name = 'Contacts';

  /**
   * Before Filter Cake callback
   * @link http://api20.cakephp.org/class/controller#method-ControllerbeforeFilter
   * @access protected
   */
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index');
  }

  /**
   * Main Contact Form 
   */
  function index() {
    if (!empty($this->request->data)) {
      $this->Contact->set($this->request->data);
      if ($this->Contact->validates()) {
        $this->Email->to = Configure::read('App.emails.general.email');
        $this->Email->replyTo = $this->data['Contact']['email'];
        $this->Email->from = $this->data['Contact']['name'].' <'.$this->data['Contact']['email'].'>';
        $this->Email->subject = '[ActionAidIndia] '.$this->data['Contact']['subject'];
        if (Configure::read('Debug') > 1) {
          $this->Email->delivery = 'debug';
        }
        if ($this->Email->send($this->data['Contact']['message'])) {
          $this->Message->success(
            __('Thank you for contacting us. We will get in touch with you shortly.'));
        } else {
          $this->Message->error(
            __('Oops, we are having some technical difficulties. Your message was not sent. 
                  Please try again later.'));
        }
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Message->error(
            __('Oops, there seem to be some issues with the form. 
                  Please correct the errors bellow.'));
      }
    }
  }
}

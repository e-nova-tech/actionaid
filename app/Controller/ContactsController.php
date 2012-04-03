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
App::uses('CakeEmail', 'Network/Email');
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
        $this->Mailer->email = new CakeEmail(Configure::read('App.emails.delivery'));
        $this->Mailer->email->from(array($this->data['Contact']['email'] => $this->data['Contact']['name']));
        switch ($this->data['Contact']['subject']) {
          case "child sponsorship":
          case "about my donation": 
            $this->Mailer->email->to(Configure::read('App.emails.fundraising.email'));
          break;
          case "general inquiry":
          case "technical issue":
          case "others":
            $this->Mailer->email->to(Configure::read('App.emails.general.email'));
          break;
        }
        $this->Mailer->email->subject('[ActionAidIndia] '.$this->data['Contact']['subject']);
        $this->Mailer->email->template('enquiry');
        $this->Mailer->email->emailFormat('text');
        $this->Mailer->email->viewVars(array('contact' => $this->data));
        //pr($this->Mailer->send()); //die;
        if ($this->Mailer->send()) {
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

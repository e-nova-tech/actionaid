<?php
/**
 *
 * Class used for debuging email...
 *
 * @package     app.Controller.Component.MailerComponent
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MailerComponent extends Component {
  var $email;
  var $Controller;  // controller shortcut

 /**
  * Initialize
  * @param object $controller Controller using this component
  * @return boolean Proceed with component usage (true), or fail (false)
  */
  function initialize(&$controller, $settings=array()) {
    $this->Controller = &$controller;
    return true;
  }

  /**
   * Send an email or help debug
   * @return bool true if successfull
   */
  function send() {
    if (isset($this->email)) {
      if (Configure::read('App.emails.delivery') == 'debug') {
        $msg = $this->email->send();
        $debug = '<strong>Headers</strong><br/>';
        $debug.= $msg['headers'];
        $debug.= '<br/><br/><strong>Message</strong><br/>';
        $debug.= $msg['message'];
        $this->Controller->Message->debug($debug);
        return true;
      } else {
        return $this->email->send();
      }
    }
  }
}

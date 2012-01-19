<?php
/**
 * Main application configuration file
 *
 * @package     app.Config.app
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (!defined('FULL_BASE_URL')) {
  define('FULL_BASE_URL', '');
}
$config = array(
  // General App Details
  'App.name' => 'ActionAid International ',
  'App.copyright' => '2012 &copy; ActionAid Association',
  'App.browserTitle' => '%s | ActionAid India', // %s = context
  'App.version' => array(
    'number' => '0.1',
    'name' => 'Chennai'
   ),
  'App.url' => array(
    'dev'  => 'http://localhost/donate/',
    'prod' => 'https://actionaidindia.org/donate/'
  ),

  // Cookie's settings
  'App.cookie' => array(
    'life' => '+1 month',
    'name' => 'ACTIONAIDINDIA_DONATE'
  ),

  // Mailer settings
  'App.mailer' => array(
    'delivery' => 'debug', // mail, smtp or debug
    'smtpOptions' => array(
      'port' => '25',
      'timeout' => '30',
      'host' => 'smtp.actionaidindia.org',
      'username' => 'noreply@actionaidindia.org',
      'password' => ''
    ),
    'default' => array(
      'from' => 'ActionAid India <noreply@actionaidindia.org>',
      'replyTo' => 'Greenpeace <noreply@actionaidindia.org>',
      'format' => 'both', // html or text or both
      'subjectPrefix' => '[ActionAid] '
    )
  ),
  'App.emails' => array(
    'general' => array(
      'name'  => 'General support enquiries',
      'email' => 'Indiasite@actionaid.org'
    ),
    'fundraising' => array(
      'name'  => 'Fundraising enquiries',
      'email' => 'fundindia@actionaid.org'
    )
  ),

  // Secure Socket Layer
  /*
  'App.ssl' => array(
    'enabled' => false,
    'actions' => array(
      '/'
    )
  ),*/
  // AUTHENTICATION
  'App.auth' => array(
    'loginRedirect' => array('controller' => 'posts', 'action' => 'admin_index'),
    'logoutRedirect' => '/gifts/add'
  ),
  'App.gift' => array(
  )
  /*
  // 3rd Party - Recapcha
  'App.recaptcha' => array(
    'enabled'  => false,
    'conditions' => 'users:login'
    'publicKey' => '6LfXQgYAAAAAAHH3k76pZcBsbmsI6uustwK4lBF2',
    'privateKey' => '6LfXQgYAAAAAANChwyDVWumArldovDFn1O8G1TpW',
    'apiServer' => 'http://api.recaptcha.net',
    'apiSecureServer' => 'https://api-secure.recaptcha.net',
    'verifyServer' => 'api-verify.recaptcha.net'
  ),
  // Avatar
  'App.avatar' => array(
    'size' => '52',
    'default' => '/img/layout/defaultAvatar.png',
  ),
  */
  // SOME GENERIC WIDGETS
  // breadcrumb
  /*'App.breadcrumb' => array(
    'enabled' => false,
    'conditions' => '*:*',
    'separator ' => '>'
  ),*/
  // some system shorcut
  /*'App.shortcuts' => array(
    'enabled' => true,
    'items' => array('print','bookmark','resize')
  ),*/

  // MODELS BEHAVIOR
  // Models for which favorites (starring) is enabled
  /* 
  'App.favorites' => array(
    'enabled' => true,
    'models' => array(
      'Project' => true,
      'User' => true
    )
  ),*/
  /*
  // Archive / Softdelete config
  'App.softdelete' => array(
    //'enabled' => true,
    'fields' => array(
      'archive_field' => 'archived',
      'delete_field' => 'deleted'
    ),
  )*/
);
//_EOF

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
$config = array(
  // General App Details
  'App.name' => 'Danish Pastry',
  'App.version' => '0.1',
  'App.description' => 'The simple donation form management system',
  'App.copyright' => '2012 &copy; ActionAid Association',

  'App.browserTitle' => '%s | ActionAid India', // %s = title_for_layout

  'App.url' => array(
    'dev'  => 'http://actionaid/',
    'prod' => 'https://actionaidindia.org/donate/'
  ),

  // Cookie's settings
  'App.cookie' => array(
    'life' => '+1 month',
    'name' => 'ACTIONAIDINDIA_DONATE'
  ),

  // Email settings
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
      'replyTo' => 'ActionAid India <noreply@actionaidindia.org>',
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
    'loginAction' => array('controller' => 'users', 'action' => 'admin_login', 'admin' => true, 'prefix' => 'admin'),
    'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
    'logoutRedirect' => '/gifts/add',
  ),
  // default gift configuration
  'App.gift' => array(
    'preselected_amounts' => array(3000,6000,12000),
    'allow_other_amount' => true,
    'default_amount' => 6000,
    'minimum_amount' => 1,
    'maximum_amount' => 4294967295,
    'minimum_age' => 18,
    'maximum_age' => 115,
    'default_country' => 'IN',             // country ISO 3166-1 Alpha 2 code
    'supported_countries' => array('IN')  // array of codes or *
  ),
  // payment gateway configuration
  'App.payment_gateway' => array(
    'default' => 'debug',
    'billdesk' => array(
      'merchant_id' => 'ACTIONAID',
      'checksum_key' => '',
      'payment_url' => 'https://www.billdesk.com/pgidsk/pgmerc/ACTIONAIDPaymentoption.jsp'
    ),
    'debug'=> array(
      'merchant_id' => 'merchantIdDebug',
      'checksum_key' => 'TESTCHECKSUM',
      'payment_url' => 'billDeskTest/simulatePayment'
    )
  ),
  // google analytics
  'App.google_analytics' => array(
     'UA' => 'UA-XXXXX-X',  //  UA-20940239-1 ?
     'validation_token' => '',
     'validate' => false 
  ),
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

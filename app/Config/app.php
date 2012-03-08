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
  'App.emails' => array(
    'delivery' => 'debug', // mail, smtp or debug, see config/email
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
    'loginRedirect' => '/admin/home',
    'logoutRedirect' => '/',
    'whitelist' => 'users:admin_login,users:admin_forgot_password,users:admin_reset_password',
    'keys' => array(
      'cookie' => array('expire' => '+1 month'),
      'reset' => array('expire' => '+3 day')
    )
  ),
  // default gift configuration
  'App.gift' => array(
    'preselectedAmounts' => array(3000,6000,12000),
    'allowOtherAmount' => true,
    'defaultAmount' => 6000,
    'minimumAmount' => 1,
    'maximumAmount' => 4294967295,
    'minimumAge' => 18,
    'maximumAge' => 115,
    'defaultCountry' => 'IN',             // country ISO 3166-1 Alpha 2 code
    'supportedCountries' => array('IN')  // array of codes or *
  ),
  // payment gateway configuration
  'App.payment_gateway' => array(
    'default' => 'billdesk_debug',
    'billdesk' => array (
      'merchantId' => 'ACTIONAID',
      'checksumKey' => 'xiwLsj9pytFv',
      'paymentUrl' => 'https://www.billdesk.com/pgidsk/pgmerc/ACTIONAIDPaymentoption.jsp',
      'returnUrl' => '/transactions/response'
    ),
    'billdesk_debug' => array (
      'merchantId' => 'ACTIONAID',
      'checksumKey' => 'xiwLsj9pytFv',
      'paymentUrl' => '/billdesktest/simulatePayment',
      'returnUrl' => '/transactions/response'
    )
  ),
  // google analytics
  'App.analytics' => array(
     'enable' => true,
     'default' => 'google',
     'google' => array(
       'UA' => 'UA-20940239-1',
       'validationToken' => '',
       'validate' => false 
     )
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

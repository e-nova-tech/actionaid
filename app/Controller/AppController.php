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
App::import('Model','User');
class AppController extends Controller {
  var $helpers = array(
    'Html','Form','Paginator','Session',  // default
    'Cache', 
    'MyHtml','MyForm','MyPaginator',      // redefinitions
    'Gift','Menu','Js','BillDesk'         // custom
    /*,'Tidy' // buggy with script! */
  );

  public $components = array(
    'Session', 'Paginator', 'Auth',  // default
    'Cookie', 'Email',
    'Message'                        // custom
  );

  /**
   * Before Filter Cake Callback
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
    } else {
      $this->Auth->allow($this->action);
    }
    // Hidding PHP version number
    $this->response->header('X-Powered-By', 'PHP'); 
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

  /**
   * Render Validation Rules or messages in Json for js validation purposes
   * @param array model names (must be accessible from current controller)
   * @param string type, rules or messages
   * @access protected
   */
  function json_validation($type='rules',$models=array()) {
    $this->autoRender = false;
    
    // nothing to render
    if (empty($models)) return; 

    if ($type=='rules' || $type=='messages' ) {
      $this->set('type',$type);
      foreach ($models as $modelName) {
        $validate[$modelName]= $this->{$modelName}->validate;
      }

      // All the validation rules are not supported in Javascript
      // such as the one checking for referential integrity
      // we use this table to filter out such rules
      $supportedJsRules = array(
        'required'     => true, 'numeric'     => true,
        'alphaplus'    => true, 'rangelength' => true,
        'maxlength'    => true, 'dateOfBirth' => true,
        'giftamount'   => true, 'pattern'     => true,
        'alphanumeric' => true, 'email'       => true
      );

      foreach ($validate as $modelName => $model) {
        foreach ($model as $fieldName => $rules) {
          foreach ($rules as $ruleName => $rule) {
            if (!isset($supportedJsRules[$ruleName]) || !$supportedJsRules[$ruleName]) {
              unset($validate[$modelName][$fieldName][$ruleName]);
            } else {
              // Some rules needs to be serialized in a special format
              // in order to be use in javascript
              $js_rule = array();
              switch ($ruleName) {
                case 'pattern':
                  $js_rule[$ruleName] = '"'.str_replace('\\','\\\\',$validate[$modelName][$fieldName][$ruleName]['rule'][1]).'"';
                break;
                case 'maxlength':
                  $js_rule[$ruleName] = $validate[$modelName][$fieldName][$ruleName]['rule'][1];
                  break;
                case 'rangelength':
                  $js_rule[$ruleName] = '['.
                     $validate[$modelName][$fieldName][$ruleName]['rule'][1].','.
                     $validate[$modelName][$fieldName][$ruleName]['rule'][2].']';
                  break;
                case 'numeric':
                  $ruleName = 'number';
                  $js_rule[$ruleName] = true;
                  $validate[$modelName][$fieldName][$ruleName] = true;
                  break;
                case 'dateOfBirth':
                    $js_rule['message'] = $validate[$modelName][$fieldName][$ruleName]['message'];
                    $js_rule[$ruleName] = true;
                    $results["data[$modelName][$fieldName][day]"][$ruleName] = $js_rule;
                    $results["data[$modelName][$fieldName][month]"][$ruleName] = $js_rule;
                    $results["data[$modelName][$fieldName][year]"][$ruleName] = $js_rule;
                  break 2;
                default:
                   $js_rule[$ruleName] = true;
                break;
              }
              $js_rule['message'] = $validate[$modelName][$fieldName][$ruleName]['message'];
              $results["data[$modelName][$fieldName]"][$ruleName] = $js_rule;
            }
          }
        }
      }
      // render
      $this->set('validates',$results);
      $this->layout = 'json';
      $this->response->header('Content-Type', 'application/json'); 
      $this->render('/Validates/json_'.$type);
    }
  }

}

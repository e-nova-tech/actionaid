<?php
/**
 * Common Component
 * This class serves as a space for functions (mostly static) 
 * that need to be globally available within this application.
 *
 * @package     app.Controller.Component.Common
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Common extends Object {

  static function baseUrl() {
    if(Configure::read('debug') < 1) {
      return Configure::read('App.url.prod');
    } else {
      return Configure::read('App.url.dev');
    }
  }

  /**
   * Instanciate and return the reference to a model object
   * @param string name $model
   * @return model $ModelObj
   */
  static function &getModel($model,$create=false) {
    if (ClassRegistry::isKeySet($model) && !$create) {
      $ModelObj =& ClassRegistry::getObject($model);
    } else {
      $ModelObj =& ClassRegistry::init($model);
    }
    return $ModelObj;
  }

  /**
   * Check if application cookie is set
   * @param boolean $warn display warning message
   * @return void
   * @access public
   */
  function isCookieSet($warn=true) {
    if (!isset($_COOKIE[Configure::read('Session.cookie')])) {
      if($warn) {
        //TODO add javascript / css trick
        $this->Controller->Message->warning(
          __('Cookies must be enabled past this point.')
        );
      }
      return false;
    }
    return true;
  }

  /**
   * Is the request allowed function
   *
   * @param array $object
   * @param array $property
   * @param string $rules
   * @param unknown $default
   * @return void
   * @access public
   */
  function requestAllowed($object, $property, $rules, $default = false) {
    $allowed = $default;

    preg_match_all(
      '/\s?([^:,]+):([^,:]+)/is',$rules, $matches, PREG_SET_ORDER
    );

    foreach ($matches as $match) {
      list($rawMatch, $allowedObject, $allowedProperty) = $match;
      $rawMatch = trim($rawMatch);
      $allowedObject = trim($allowedObject);
      $allowedProperty = trim($allowedProperty);
      $allowedObject = str_replace('*', '.*', $allowedObject);
      $allowedProperty = str_replace('*', '.*', $allowedProperty);

      $negativeCondition = false;
      if (substr($allowedObject, 0, 1) == '!') {
        $allowedObject = substr($allowedObject, 1);
        $negativeCondition = true;
      }

      if (preg_match('/^'.$allowedObject.'$/i', $object) && preg_match('/^'.$allowedProperty.'$/i', $property)) {
        $allowed = !$negativeCondition;
      }
    }
    return $allowed;
  }

  /**
   * Indicates if a given string is a UUID
   * @param string $str
   * @return boolean
   */
  static function isUuid($str) {
    return is_string($str) && preg_match('/^[A-Fa-f0-9]{8}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{12}$/', $str);
  }

  /**
   * Return a UUID - ref. String::uuid();
   * @param string seed, used to create deterministic UUID
   * @return uuid
   */
  static function uuid($seed=null){
    if (isset($seed)) {
      $pattern = '/^(.{8})(.{4})(.{4})(.{4})(.{12})$/';
      $replacement = '${1}-${2}-${3}-${4}-${5}';
      $string = md5($seed);
      return preg_replace($pattern,$replacement,$string);
    }
    return String::uuid();
  }

}

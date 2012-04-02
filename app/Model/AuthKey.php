<?php
/**
 * Authentication Key Model
 * 
 * @package     app.Model.AuthKey
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AuthKey extends AppModel {
  public $name = 'AuthKey';

  /**
   * Associations
   */
  var $belongsTo = array(
    'User'
  );

  /**
   * Generate Auth Token
   * @param uuid $userid
   * @param enum(forgot_password,cookie) AuthKey type
   * @access private
   */
  function generateToken($userid,$type='reset') {
    $key = $this->__generateAuthKey($userid, $type);
    $token = str_replace('-','',
      $key['AuthKey']['user_id'].$key['AuthKey']['id']
    );
    return $token;
  }

  /**
   * Generate an authentication key
   * @param uuid userid
   * @param string type of key {reset,cookie,etc.}
   * @return array $AuthKey or null if it didn't work out
   * @access private
   */
  function __generateAuthKey($userid, $type='reset') {
    if(array_key_exists($type,Configure::read('App.auth.keys'))) {
      // delete other authentication keys
      $this->deleteAll(
        array('user_id' => $userid), false
      );
      // calculate expiry date for the key
      // ex. of config: '+3 days'
      $expire = date(
        'Y-m-d H:i:s',
        strtotime(Configure::read('App.auth.keys.'.$type.'.expire'))
      );
      // insert the new key in the DB
      $this->data = $data = array(
        'AuthKey' => array(
          'id' => String::uuid(),
          'user_id' => $userid,
          'type' => $type,
          'expire' => $expire
        )
      );
      if ($this->save()) {
        return $data;
      } else {
        //TODO raise exception couldn't save
        //echo 'could not save'; die;
      }
    } else {
      //TODO raise exception bad auth key type
      //echo 'bad auth key type';die;
    }
    return null;
  }

  /**
   * Validate Authentication Token
   * @param char64 authentication key id + user id
   * @return mixed complete authKey & User record or false if invalid token
   */
  function validateToken($token=null) {
    // check if format is right
    if (empty($token) || !preg_match('/^([A-Fa-f0-9]{64})$/',$token)) {
      $this->validationErrors =
        __('Sorry, the password reset token you provided is invalid.');
      return;
    }

    // check if key exist in DB
    $key = $this->__extractFromToken($token);
    $key = $this->find('first', array(
      'contain' => array('User.id', 'User.username', 'User.active'),
      'fields' => array('AuthKey.id', 'AuthKey.user_id', 'AuthKey.expire'),
      'conditions' => array(
        'AuthKey.user_id' => $key['AuthKey']['user_id'],
        'AuthKey.id' => $key['AuthKey']['id']
      )
    ));
    if(empty($key)) {
      $this->validationErrors =
        __('Sorry, the password reset token you provided is invalid.');
      return;
    }
    
    // check if it didn't expired
    if (strtotime($key['AuthKey']['expire']) < strtotime('now')) {
      $this->validationErrors = 
        __('Sorry, the password reset token you provided have expired.');
      return false;
    }
    
    // check if user exist and is active
    if(!isset($key['User']['active']) || !$key['User']['active']) {
      $this->validationErrors = 
        __('Your account have been deleted or disabled. Please contact our support.');
      return false;
    }
    return $key;
  }

  /**
   * Return a authentication key object from a token
   * @param string64 token
   * @return array AuthKey
   */
  function __extractFromToken($token) {
    $regex = '/^([A-Fa-f0-9]{8})([A-Fa-f0-9]{4})([A-Fa-f0-9]{4})([A-Fa-f0-9]{4})([A-Fa-f0-9]{12})$/';
    $repex = '$1-$2-$3-$4-$5';
    $data['AuthKey']['user_id'] = preg_replace($regex,$repex,substr($token,0,32));
    $data['AuthKey']['id'] = preg_replace($regex,$repex,substr($token,32,32));
    return $data;
  }

}

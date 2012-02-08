<?php
/**
 * Transactions Controller
 *
 * @package     app.Controller.TransactionsController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
class TransactionsController extends AppController {
  public $name = 'Transactions';
  var $uses = array('Transaction', 'BillDeskTransactionResponse');

  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('response', 'request');
  }
  
  /**
   * Generate a request form which will autosubmit to the payment gateway
   * @param POST['orderId'] = order id : must be unique
   * @param POST['amount'] = amount in rupees
   */
  public function request($giftId=null){
    // check if the gift is valid
    $error = false;
    if (Common::isUuid($giftId)) {
      $this->Gift = Common::getModel('Gift');
      $gift = $this->Gift->find('first', array(
        'contain' => array(
          'Person' => array('id','firstname','lastname','city','pincode')
        ),  
        'conditions' => array(
          'Gift.id' => $giftId
          // todo check status
        )
      ));
      $error = (!isset($gift) || empty($gift));
    }
    if ($error) { 
      $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'INVALID_GIFT',
        //'redirect' => '/'
      ));
    }

    // get payment gateway config
    $pg = &Configure::read('App.payment_gateway.default');
    $pg = &Configure::read('App.payment_gateway.'.$pg);
    if (!empty($pg)) {
      $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'MISSING_PAYMENT_GATEWAY',
        //'redirect' => '/'
      ));
    }

    // define the transaction
    $t['Transaction'] = array(
      'orderId'    => $gift['Gift']['serial'],
      'amount'     => $gift['Gift']['amount'],
      'currency'   => $gift['Gift']['currency'],
      'paymentUrl' => $pg['paymentUrl'],
      'returnUrl'  => $pg['returnUrl'],
      'extraInfo'  => array(
        'name' => $gift['Person']['firstname'].' '.$gift['Person']['lastname'],
        'city' => $gift['Person']['city'],
        'pincode' => $gift['Person']['pincode']
      )
    );
    $this->layout = 'redirect';
    $this->set('transaction', $t);
  }

  /**
   * Gets the response from the payment gateway, analyzes and update db tables accordingly
   */
  public function response(){
    $rspMsgTxt = $this->request->query['msg'];
    
    // The line below is used for debugging
    $rspMsgTxt = "ACTIONAID|123|MSBI0412001668|NA|00002400|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-2004 16:08:56|0300|NA|DA01017224|AXPIY|NA|NA|NA|NA|NA|NA|NA|xiwLsj9pytFv";
    
    // AAAAAAAAAAACCCCHHHHHHHHTTTTUUUUUUUUUUNNNNNGGGGGG !!!!!!!!!!!!!
    // REMY, JE SUIS LOIN D'AVOIR FINI, alors ne vas meme pas plus loin. Tu regarderas plus tard !!!!
    // Allez, maintenant, travaille sur la fonction d'oubli du password.
    
    Controller::loadModel('BilldeskTransactionResponse');
    $rsp = new BilldeskTransactionResponse();
    $deserialized = $rsp->deserialize($rspMsgTxt);
    pr($deserialized);
    if(!$deserialized){
       echo "does not deserialize";
    }
    $rsp->set($deserialized);
    if(!$rsp->validates()){
      $errors = $rsp->invalidFields();
      pr($errors);
      echo "doesnt validate";
    }
    else{
      echo "validates";
      // Get the corresponding transaction request
      $requestM = $this->Transaction->findBySerial($deserialized['CustomerID']);
      $response = array(
        "parent_id" => $requestM['Transaction']['id'],
        "gift_id" => $requestM['Gift']['id'],
        "gateway_id" => 1, // TODO : enter the proper gateway id
        "batch_id" => null, // TODO : enter the proper batch id
        "type" => "response", // TODO : call constant
        "status" => BilldeskTransactionResponse::getTransactionStatus($serialized['AuthStatus']), // TODO : call constant + map with transaction result
        "status_code" => $serialized['AuthStatus'], // TODO : enter status code
        "ip" => "127.0.0.1", // TODO : enter proper ip (and detection script)
        "data" => $rspMsgTxt 
      );
      $this->Transaction->create();
      $this->Transaction->set($response);
      if(!$this->Transaction->save()){
        echo "cannot save Transaction";
      }
      pr($requestM);
    }
    exit(0);
    
    //$rspMsgTxt = "MERCHANTID|1073234|MSBI0412001668|NA|00002400|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-2004 16:08:56";
    //$rspMsg = $this->Transaction->formatResponseString($rspMsgTxt);
    //pr($rspMsg);

    // TODO : Check if the Gift id is valid
    $this->Transaction->Gift->findAll();
      
    $authStatus = $this->Transaction->getAuthStatusDescription($rspMsg['AuthStatus']);
    pr($authStatus);
    
    // TODO : Update transaction in DB

    return array(
      "amount"=>$msg_array[4],
      "pcode"=>$msg_array[16],
      "payment_id"=>$msg_array[1]
    );
  }
}

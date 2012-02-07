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
      $gift = $this->Gift->find('first', array('conditions' => array(
        'id' => $giftId
        // todo check status
      )));
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
      'extraInfo'  => array()
    );
    $this->layout = false;
    $this->set('transaction', $t);
  }

  /**
   * Gets the response from the payment gateway, analyzes and update db tables accordingly
   */
  public function response(){
    $rspMsgTxt = $this->request->query['msg'];
    
    // The line below is used for debugging
    //$rspMsgTxt = "MERCHANTID|1073234|MSBI0412001668|NA|00002400|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-2004 16:08:56|0300|NA|DA01017224|AXPIY|NA|NA|NA|NA|NA|NA|NA|3734835005";
    //$rspMsgTxt = "MERCHANTID|1073234|MSBI0412001668|NA|00002400|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-2004 16:08:56";
    $rspMsg = $this->Transaction->formatResponseString($rspMsgTxt);
    pr($rspMsg);

    
    // TODO : validate data format
    $regexp = "/^[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[0-9]{3,8}\|[A-Z]{3}\|[A-Z0-9]+\|[a-zA-Z0-9]+\|[A-Z]{3}\|.+\|.+\|.+\|.+\|[0-9]{1,2}[-][0-9]{1,2}[-][0-9]{4} [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}\|[0-9A-Z]{2,4}\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+$/";
    //$regexp = "/^[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[a-zA-Z0-9]+\|[0-9]{3,8}\|[A-Z]{3}\|[A-Z0-9]+\|[a-zA-Z0-9]+\|[A-Z]{3}\|.+\|.+\|.+\|.+\|[0-9]{1,2}[-][0-9]{1,2}[-][0-9]{4} [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}$/";
    if(preg_match($regexp, $rspMsgTxt)){
      echo "validate";
      // TODO : Check if the Gift id is valid
      $this->Transaction->Gift->findAll();
      
    }
    else{
      echo "doesnt validate";
    }

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

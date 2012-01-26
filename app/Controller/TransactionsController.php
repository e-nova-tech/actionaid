<?php
/**
 * PaymentGatewayTest Controller
 *
 * @package     app.Controller.PaymentGatewayTestController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class TransactionsController extends AppController {
  public $name = 'Transactions';
  
  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow('response', 'request');
  }
  
  /**
   * Generate a request form which will autosubmit to the payment gateway
   * @param POST['orderId'] = order id : must be unique
   * @param POST['amount'] = amount in rupees
   */
  public function request(){
    $confPg = Configure::read('App.payment_gateway');
    
    $this->layout = false;
    $this->set("pg_params", array(
      'targetUrl' => $confPg['billdesk']['target_url'],
      'orderId'   => '123',
      'amount'    => '5000',
      'returnUrl' => 'transactions/response',
      'extraInfo' => array()
    ));
  }
  
  /**
   * Gets the response from the payment gateway, analyzes and update db tables accordingly
   */
  public function response(){
    $rspMsg = null; // TODO : get the string from the response (post or get, we dont know yet)
    
    // Test
    $rspMsg = "MERCHANTID|1073234|MSBI0412001668|NA|00002400.30|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-200416:08:56|0300|NA|DA01017224|AXPIY|NA|NA|NA|NA|NA|NA|NA|3734835005";
    $rspMsg = $this->Transaction->formatResponseString($rspMsg);
    
    // TODO : validate data
       
    $authStatus = $this->Transaction->getAuthStatusDescription($rspMsg['AuthStatus']);
    
    // TODO : Update transaction in DB
   
    return array(
      "amount"=>$msg_array[4],
      "pcode"=>$msg_array[16],
      "payment_id"=>$msg_array[1]
    );
  }
}
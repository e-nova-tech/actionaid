<?php
/**
 * Payment Gateway Test Controller
 * This is supposed to simulate a BillDesk Buggy payment gateway (as it probably is) for testing purpose
 * 
 * @package     app.Controller.BillDeskTestController
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class BillDeskTestController extends AppController {
  public $name = 'BillDeskTest';
  
  function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('simulatePayment');
  }
  
  
  /**
   * Simulate a payment on the payment gateway system
   * return a form with buttons to simluate the different scenarios
   * The different scenarios are :
   *   1 => transaction succesful, normal result
   *   2 => transaction failure, payment rejected by the bank
   *   3 => transaction failure, random result (exclude payment rejected by the bank)
   *   4 => no response. the payment is received but nothing is returned
   *   5 => random response : mamamia... kepaso ?
   */
  public function simulatePayment() {
    $post = $this->request->data;
    $post['txtCustomerId'] = 'test';
    $post['txtTxnAmount'] = '3000';
    $post['RU'] = 'transactions/response';
    
    // build the help
    $help = array();
    $help[1] = "transaction succesful, normal result";
    $help[2] = "transaction failure, payment rejected by the bank";
    $help[3] = "transaction failure, random result (exclude payment rejected by the bank)";
    $help[4] = "no response. the payment is received but nothing is returned";
    $help[5] = "random response : mamamia... kepaso";

    // the array below contains values that would be returned ideally in case of success
    $response = array(
      "MerchantID" => Configure::read('App.payment_gateway.billdesk.merchant_id'),
      "CustomerID" => "{$post['txtCustomerId']}",
      "TxnReferenceNo" => "MSBI0412001668",
      "BankReferenceNo" => "NA",
      "TxnAmount" => "{$post['txtTxnAmount']}",
      "BankID" => "SBI",
      "BankMerchantID" => "22270726",
      "TxnType" => "NA",
      "CurrencyName" => "INR",
      "ItemCode" => "NA",
      "SecurityType" => "NA",
      "SecurityID" => "NA",
      "SecurityPassword" => "NA",
      "TxnDate" => "12-12-2004 16:08:56",
      "AuthStatus" => "0300",
      "SettlementType" => "NA",
      "AdditionalInfo1" => (isset($post['txtAdditionalInfo1']) ? $post['txtAdditionalInfo1'] : 'NA'),
      "AdditionalInfo2" => (isset($post['txtAdditionalInfo2']) ? $post['txtAdditionalInfo2'] : 'NA'),
      "AdditionalInfo3" => (isset($post['txtAdditionalInfo3']) ? $post['txtAdditionalInfo3'] : 'NA'),
      "AdditionalInfo4" => (isset($post['txtAdditionalInfo4']) ? $post['txtAdditionalInfo4'] : 'NA'),
      "AdditionalInfo5" => (isset($post['txtAdditionalInfo5']) ? $post['txtAdditionalInfo5'] : 'NA'),
      "AdditionalInfo6" => (isset($post['txtAdditionalInfo6']) ? $post['txtAdditionalInfo6'] : 'NA'),
      "AdditionalInfo7" => (isset($post['txtAdditionalInfo7']) ? $post['txtAdditionalInfo7'] : 'NA'),
      "ErrorStatus" => "NA",
      "ErrorDescription" => "NA",
      "CheckSum" => "3734835005"
    );

    $responses = array();
    // Scenario 1
    $responses[1]['rsp'] = $response;
    $responses[1]['ru'] = $post['RU'];
    
    // Scenario 2
    $responses[2]['rsp'] = $response;
    $responses[2]['rsp']['AuthStatus'] = "0399";
    $responses[2]['ru'] = $post['RU'];
    
    // Scenario 3
    $responses[3]['rsp'] = $response;
    $possible_auth_status = array("NA", "002", "001");
    $responses[3]['rsp']['AuthStatus'] = $possible_auth_status[rand(0,2)];
    $responses[3]['ru'] = $post['RU'];
    
    // Scenario 4
    $responses[4]['rsp'] = array(); // no response
    $responses[4]['ru'] = "/"; // we redirect to home page coz there shouldn't be any response sent to the response page
    
    // Scenario 5
    $responses[5]['rsp'] = $response;
    $responses[5]['ru'] = $post['RU'];
    
    $rand = rand(0, 5);
    // 0 : shuffle the result array
    // 1 : return an unknown code
    // 2 : forget the merchant id and the customer id
    // default : doesnt return any result
    switch($rand){
      case 0:
        shuffle($responses[5]['rsp']);
        break;
      case 1:
        $responses[5]['rsp']['AuthStatus'] = "AWormInTheSteack";
        break;
      case 2:
        $responses[5]['rsp']['MerchantID'] = "";
        $responses[5]['rsp']['CustomerID'] = "";
        break;
      default:
        $responses[5]['rsp'] = array(); // empty array
        break;
    }
    
    $this->set("responses", $responses);
    $this->set("help", $help);
    
  }
}

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
  
  function beforeFilter(){
    parent::beforeFilter();
    $this->Auth->allow('simulatePayment');
  }
  
  /**
   * Simulate a payment on the payment gateway system
   * @param $mode : customize the result
   *   1 => transaction succesful, normal result
   *   2 => transaction failure, payment rejected by the bank
   *   3 => transaction failure, random result (exclude payment rejected by the bank)
   *   4 => no response. the payment is received but nothing is returned
   *   5 => random response : mamamia... kepaso ?
   */
  public function simulatePayment($mode = 1){
    $post = $this->request->data;

    // the array below contains values that would be returned ideally in case of success
    $resultTable = array(
      "MerchantID" => "54321",
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
      "AdditionalInfo1" => "DA01017224",
      "AdditionalInfo2" => "AXPIY",
      "AdditionalInfo3" => "NA",
      "AdditionalInfo4" => "NA",
      "AdditionalInfo5" => "NA",
      "AdditionalInfo6" => "NA",
      "AdditionalInfo7" => "NA",
      "ErrorStatus" => "NA",
      "ErrorDescription" => "NA",
      "CheckSum" => "3734835005"
    );

    if($mode == 1){
       
    }
  }
}
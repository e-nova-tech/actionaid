<?php
/**
 * Transaction Model
 * 
 * @package     app.Model.Transaction
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Transaction extends AppModel {
  public $name = 'Transaction';
  var $useTable = false;
  
  public function formatResponseString($string){
    $rsp=explode("|", trim($string));
    $mappingTable = array(
      "MerchantID",
      "CustomerID",
      "TxnReferenceNo",
      "BankReferenceNo",
      "TxnAmount",
      "BankID",
      "BankMerchantID",
      "TxnType",
      "CurrencyName",
      "ItemCode",
      "SecurityType",
      "SecurityID",
      "SecurityPassword",
      "TxnDate",
      "AuthStatus",
      "SettlementType",
      "AdditionalInfo1",
      "AdditionalInfo2",
      "AdditionalInfo3",
      "AdditionalInfo4",
      "AdditionalInfo5",
      "AdditionalInfo6",
      "AdditionalInfo7",
      "ErrorStatus",
      "ErrorDescription",
      "CheckSum"
    );
    
    // Replace the numeric keys with associative keys
    foreach($rsp as $key=>$value){
      $newKey = $mappingTable[$key];
      unset($rsp[$key]);
      $rsp[$newKey] = $value;
    }
    
    return $rsp;
  }
  
  public function getAuthStatusDescription($status){
    $authStatuses = array(
      "0300" => array(
          "status" => "success",
          "description" => "Success"
          ),
      "0399" => array(
          "status" => "rejected",
          "description" => "Invalid Authentication at Bank"
          ),
      "NA" => array(
          "status" => "rejected",
          "description" => "Invalid Input in the Request Message"
          ),
      "0002" => array(
          "status" => "pending",
          "description" => "BillDesk is waiting for Response from Bank"
          ),
      "0001" => array(
          "status" => "rejected",
          "description" => "Error at BillDesk"
          )
       );
     
     if(key_exists($status, $authStatuses))
        return $authStatuses[$status];
     
     return null;
  }
  
}


<?php
/**
 * BilldeskTransactionResponse Model
 * 
 * @package     app.Model.BilldeskTransactionResponse
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class BilldeskTransactionResponse extends AppModel {
  public $name = 'BilldeskTransactionResponse';
  var $useTable = false;
  
  // see _getValidationRules
  var $validate = array();
  
  var $belongsTo = "Transaction";
  
  var $responseKeys = array(
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
  
  var $authStatuses = array(
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
  
  /**
   * Constructor
   * @link http://api20.cakephp.org/class/app-model#method-AppModel__construct
   */
  public function __construct($id = false, $table = null, $ds = null) {
    parent::__construct($id, $table, $ds);
    $this->validate = BilldeskTransactionResponse::getValidationRules();
  }
  

  static function getValidationRules($context=null) {
    return array(
      'MerchantID' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Please enter a merchant id')
        ),
        'match' => array(
          'rule' => array('custom', '/^('. Configure::read('App.payment_gateway.billdesk.merchantId') .')$/'),
          'message' => __('Merchant Id doesnt match with the one registered')
        )
      ),
      'CustomerID' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Customer ID has to be provided')
        ),
        'match' => array(
          'rule' => array('transactionExists'),
          'message' => __('The transaction id doesnt exist')
        )
      ),
      'TxnReferenceNo' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('TxnReferenceNo has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('TxnReferenceNo wrong format')
        )
      ),
      'BankReferenceNo' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('BankReferenceNo has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9\-]+$/'),
          'message' => __('BankReferenceNo wrong format')
        )
      ),
      'TxnAmount' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('TxnAmount has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[0-9]{8}\.[0-9]{2}$/'),
          'message' => __('TxnAmount wrong format. Must be a number')
        )
      ),
      'BankID' => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('BankID has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[A-Z]{3}$/'),
          'message' => __('BankID wrong format.')
        )
      ),
      "BankMerchantID" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('BankMerchantID has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('BankMerchantID wrong format.')
        )
      ),
      "TxnType" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('TxnType has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('TxnType wrong format.')
        )
      ),
      "CurrencyName" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Currency Name has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[A-Z]{3}$/'),
          'message' => __('Currency Name wrong format')
        )
      ),
      "ItemCode" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('Item Code has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^.+$/'),
          'message' => __('Item Code wrong format.')
        )
      ),
      "SecurityType" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('SecurityType has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^.+$/'),
          'message' => __('SecurityType wrong format.')
        )
      ),
      "SecurityID" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('SecurityID has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^.+$/'),
          'message' => __('SecurityID wrong format.')
        )
      ),
      "SecurityPassword" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('SecurityPassword has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^.+$/'),
          'message' => __('SecurityPassword wrong format.')
        )
      ),
      "TxnDate" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('TxnDate has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[0-9]{1,2}[-][0-9]{1,2}[-][0-9]{4} [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}$/'),
          'message' => __('TxnDate wrong format.')
        )
      ),
      "AuthStatus" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AuthStatus has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[0-9A-Z]{2,4}$/'),
          'message' => __('AuthStatus wrong format.')
        )
      ),
      "SettlementType" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('SettlementType has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('SettlementType wrong format.')
        )
      ),
      "AdditionalInfo1" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo1 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9 ]+$/'), // TODO : this validation rule will not work in case of special characters (if an address or whatever)
          'message' => __('AdditionalInfo1 wrong format.')
        )
      ),
      "AdditionalInfo2" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo2 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo2 wrong format.')
        )
      ),
      "AdditionalInfo3" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo3 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo3 wrong format.')
        )
      ),
      "AdditionalInfo4" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo4 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo4 wrong format.')
        )
      ),
      "AdditionalInfo5" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo5 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo5 wrong format.')
        )
      ),
      "AdditionalInfo6" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo6 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo6 wrong format.')
        )
      ),
      "AdditionalInfo7" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('AdditionalInfo7 has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('AdditionalInfo7 wrong format.')
        )
      ),
      "ErrorStatus" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('ErrorStatus has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9]+$/'),
          'message' => __('ErrorStatus wrong format.')
        )
      ),
      "ErrorDescription" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('ErrorDescription has to be provided')
        ),
        'pattern' => array(
          'rule' => array('custom', '/^[a-zA-Z0-9 ]+$/'),
          'message' => __('ErrorDescription wrong format.')
        )
      ),
      "CheckSum" => array(
        'required'   => array(
          'rule' => array('notEmpty'),
          'required' => true,
          'allowEmpty' => false,
          'message' => __('CheckSum has to be provided')
        ),
        /*'pattern' => array(
          'rule' => array('custom', '/^('. Configure::read('App.payment_gateway.billdesk.checksumKey') .')$/'),
          'message' => __('wrong checksum.')
        ),*/
        'valid' => array(
          'rule'=> array('validateChecksum'),
          'message' => __('wrong checksum')
        )
      )
    );
  }
  
  function validateChecksum($check){
    $response = $this->data['BilldeskTransactionResponse'];
    $receivedChecksum = $response['CheckSum'];
    $response['CheckSum'] = Configure::read('App.payment_gateway.billdesk.checksumKey');
    $calculatedChecksum = crc32($this->serialize($response));
    //echo "<br/>received = $receivedChecksum | calculated= $calculatedChecksum";
      
    if($calculatedChecksum == $receivedChecksum){
      return true;
    }
    return false; 
  }
  
  /**
   * deserialize the response into an associative array
   * @param $string : the string to deserialize
   * @return : null if deserialization cannot happen, or if the deserialized array contains an insufficient number of elements
   * return the deserialized array otherwise
   */
  public function deserialize($string){
    $rsp=explode("|", trim($string));
    
    if(count($rsp) != count($this->responseKeys)){
      return null;
    }
    
    // Replace the numeric keys with associative keys
    foreach($rsp as $key=>$value){
      $newKey = $this->responseKeys[$key];
      unset($rsp[$key]);
      $rsp[$newKey] = $value;
    }
    return $rsp;
  }
  
  /**
   * Serialize a response array into a response string
   * @param $response_array, the response array
   * @return the serialized string
   */
  public function serialize($response_array){
    return implode("|", $response_array);
  }
  
  /**
   * Get the description related to the Auth Status
   * @param $authStatus : the status
   * @return the description if any, otherwise null
   */
  public static function getTransactionStatusDescription($authStatus){
     $me  = new BilldeskTransactionResponse();
     if(key_exists($authStatus, $me->authStatuses))
        return $me->authStatuses[$authStatus];
     else{
       return array("status"=>"unknown", "description"=>"unknown"); // if status doesn't exist, return unknown status
     }
  }
  
  public static function getTransactionStatus($authStatus){
    if($authStatus == "0300")
      return Transaction::SUCCESS; 
    return Transaction::FAILURE;
  }
  
  function transactionExists($serialId){
    $serialId['CustomerID'] = str_replace('IPG', '', $serialId['CustomerID']); // Remove the prefix IPG from the string (was added to be compliant with BillDesk format)
    return $this->Transaction->findBySerial($serialId['CustomerID']);
  }
}
?>
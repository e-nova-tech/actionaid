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
 
App::uses('CakeEmail', 'Network/Email');

class TransactionsController extends AppController {
  public $name = 'Transactions';
  var $uses = array('Transaction', 'BillDeskTransactionResponse', 'Person');

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
          'Person' => array('id','name','city','pincode')
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
    if (empty($pg)) {
      $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'MISSING_PAYMENT_GATEWAY',
        //'redirect' => '/'
      ));
    }
    
    // get the payment gateway id
    $gateway = $this->Transaction->Gateway->find('first', array(
      'fields' => array(
        'Gateway.id'
      ),
      'conditions' => array(
        'Gateway.name' => /*$pg['dbName']*/ 'Billdesk (Debug)' // TODO : get the real name
      )
    ));
    $error = (!isset($gateway) || empty($gateway));
    if($error){
      $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'INVALID_GATEWAY'
      ));
    }


    // save the transaction
    $request = array(
      "parent_id" => null,
      "gift_id" => $gift['Gift']['id'],
      "gateway_id" => $gateway['Gateway']['id'], 
      "batch_id" => null, 
      "type" => Transaction::REQUEST, 
      "status" => Transaction::SUCCESS, 
      "status_code" => 1,  // TODO : shall we keep 1 or put null instead
      "ip" => $this->RequestHandler->getClientIp(),
      "data" => "tmp" 
    );
    if(!$this->Transaction->save($request)){
       $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'TRANSACTION_NOT_SAVED'
      ));
    }
    // get the serial for the corresponding transaction
    $request  = $this->Transaction->read();
    
    // define the transaction for the view
    $t['Transaction'] = array(
      'orderId'    => 'IPG'.$request['Transaction']['serial'], // orderId is the transaction serial
      'amount'     => $gift['Gift']['amount'],
      'currency'   => $gift['Gift']['currency'],
      'paymentUrl' => $pg['paymentUrl'],
      'returnUrl'  => $pg['returnUrl'],
      'extraInfo'  => array(
        'name' => $gift['Person']['name'],
        'city' => $gift['Person']['city'],
        'pincode' => $gift['Person']['pincode']
      )
    );
    
    $request['Transaction']['data'] = json_encode($t); // add request transaction data
    $this->Transaction->save($request, array('fields'=>array('Transaction.data'))); // update transaction in db
    
    
    //$this->layout = 'redirect';
    $this->set('transaction', $t);
  }

  /**
   * Gets the response from the payment gateway, analyzes and update db tables accordingly
   */
  public function response(){
    $rspMsgTxt = $this->request->data['msg'];
    // The line below is used for debugging
    //$rspMsgTxt = "ACTIONAID|123|MSBI0412001668|NA|00002400|SBI|22270726|NA|INR|NA|NA|NA|NA|12-12-2004 16:08:56|0300|NA|DA01017224|AXPIY|NA|NA|NA|NA|NA|NA|NA|xiwLsj9pytFv";
    
    Controller::loadModel('BilldeskTransactionResponse');
    $rsp = new BilldeskTransactionResponse();
    $deserialized = $rsp->deserialize($rspMsgTxt);
    if(!$deserialized){
       $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'WRONG_RESPONSE'
      ));
    }
    $rsp->set($deserialized);
    if(!$rsp->validates()){
      /*$errors = $rsp->invalidFields();
      pr($errors);
      exit(0); // Debug */
      $this->Message->error(__('Sorry something went wrong, please try again later'), array(
        'code' => 'WRONG_RESPONSE'
      ));
    }
    else{
      // Get the corresponding transaction request
      $requestM = $this->Transaction->find('first', array(
        'contain' => array(
          'Gift' => array('id'),
          'Gateway' => array('id')
        ),  
        'conditions' => array(
          'Transaction.serial' => str_replace('IPG', '', $deserialized['CustomerID']) // Remove prefix IPG from order Id
        )
      ));
      
      $status = BilldeskTransactionResponse::getTransactionStatus($deserialized['AuthStatus']); // Status of the transaction
      $response = array(
        "parent_id" => $requestM['Transaction']['id'],
        "gift_id" => $requestM['Gift']['id'],
        "gateway_id" => $requestM['Gateway']['id'],
        "batch_id" => null, // TODO : enter the proper batch id
        "type" => Transaction::RESPONSE, 
        "status" => $status, 
        "status_code" => $deserialized['AuthStatus'], 
        "ip" => $this->RequestHandler->getClientIp(),
        "data" => $rspMsgTxt 
      );
      $this->Transaction->create();
      $this->Transaction->set($response);
      if(!$this->Transaction->save()){
        //$errors = $rsp->invalidFields();
        //pr($errors);
        $this->Message->error(__('Sorry something went wrong, please try again later'), array(
          'code' => 'CANNOT_SAVE_TRANSACTION'
        ));
      }
      
      // Update Gift status with transaction status
      $gift = $this->Transaction->Gift->findById($requestM['Gift']['id']);
      $gift['Gift']['status'] = $status;
      if(!$this->Transaction->Gift->save($gift['Gift'], array('fieldList'=>array('status')))){
        $this->Message->error(__('Sorry something went wrong, please try again later'), array(
          'code' => 'CANNOT_UPDATE_GIFT'
        ));
        //$errors = $this->Transaction->Gift->invalidFields();
        //pr($errors);  // Debug
      }
      
      if($status == Transaction::SUCCESS){
        if($requestM['Gift']['emailconfirmation']){
          Controller::loadModel('Person');
          $personM = new Person();
          $person = $personM->findById($gift['Gift']['person_id']);
          $this->Mailer->email = new CakeEmail(Configure::read('App.emails.delivery'));
          $this->Mailer->email->from(Configure::read('App.emails.general.email'));
          $this->Mailer->email->to($person['Person']['email']);
          $this->Mailer->email->subject(__('ActionAid - Confirmation of your transaction'));
          $this->Mailer->email->template('transaction_confirmation');
          $this->Mailer->email->emailFormat('text'); // todo based on pref
          $this->Mailer->email->viewVars(array('person' => $person, 'gift' => $requestM['Gift'], 'contact_email' => Configure::read('App.emails.general.email')));
          $this->Mailer->send();
        }
        // Redirect to thank you page
        $this->redirect(array('controller' => 'pages', 'action' => 'thank-you'));
      }
      else{
        // Redirect to error page
        $this->redirect(array('controller' => 'pages', 'action' => 'failure')); // TODO : error page ?
      }
    }

    // The line below will happen only if the response doesn't validate
    // TODO : log it somewhere in a file
    $this->redirect(array('controller' => 'pages', 'action' => 'failure')); // TODO : error page ?
  }
}

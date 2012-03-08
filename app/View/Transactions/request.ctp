<?php
/**
 * Transaction Request View 
 * This is a hidden autosubmit form that heps perform redirection to billdesk
 *
 * @package     app.View.Transactions.request
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Please wait'));
  $t = &$transaction["Transaction"];
?>
  <div class="spinner-wrapper">
    <div class="spinner">
      <?php echo __('Please wait, your are being redirected to the secure payment gateway'); ?>.
      <form name="billDeskTransactionForm" id="billDeskTransactionForm" method="POST" action="<?php echo $t['paymentUrl']; ?>">
        <input type="hidden" name="txtCustomerID" value="<?php echo $t['orderId']; ?>">
        <input type="hidden" name="txtTxnAmount" value="<?php echo $t['amount']; ?>">
        <input type="hidden" name="RU" value="<?php echo Router::url($t['returnUrl'],true); ?>">
<?php
    if (!empty($t['extraInfo'])) :
      $i = 1;
      foreach ($t['extraInfo'] as $key => $info) :
        $info = str_replace('"', '\"', $info);
?>
        <input type="hidden" name="txtAdditionalInfo<?php echo $i++; ?>" value="<?php echo $info ?>">
<?php
      endforeach;
    endif;
?>
        <input type="submit" value="<?php echo __('Click here if nothing hapens'); ?>">
      </form>
    </div>
  </div>

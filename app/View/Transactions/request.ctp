<?php
/**
 * Appeals Index View (Admin)
 *
 * @package     app.View.Appeals.admin_index
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Appeal index'));
  $this->set('menu_for_layout', 'appeals:admin_index');
  $t = &$transaction["Transaction"];
?>
  <div class="form spinner">
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
      <input type="submit" value="proceed">
    </form>
    <script language="javascript">
      //$(function(){
      //document.billDeskTransactionForm.submit();
      //});
    </script>
  </div>


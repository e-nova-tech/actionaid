<?php
  $t = &$transaction["Transaction"];
//print $this->BillDesk->transactionForm($pg_params["targetUrl"], $pg_params["orderId"], $pg_params["amount"], $pg_params["returnUrl"], $pg_params["extraInfo"]);
?>
<form name="billDeskTransactionForm" id="billDeskTransactionForm" method="POST" action="<?php echo $t['paymentUrl']; ?>">
  <input type="hidden" name="txtCustomerID" value="<?php echo $t['orderId']; ?>">
  <input type="hidden" name="txtTxnAmount" value="<?php echo $t['amount']; ?>">
  <input type="hidden" name="RU" value="">";
<?php
  if (!empty($txtAdditionalInfo)) :
    $i = 0;
    foreach ($txtAdditionalInfo as $info) :
      $info = str_replace(""", "\"", $info);
?>
  <input type="hidden" name="txtAdditionalInfo<?php echo $i; ?>" value="<?php echo $info ?>">
<?php
    endforeach;
  endif;
?>
</form>
<script language="javascript">
  //$(function(){
  document.billDeskTransactionForm.submit();
  //});"."\n"
</script>


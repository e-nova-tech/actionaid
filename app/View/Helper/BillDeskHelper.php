<?php
// app/View/Helper/BillDeskHelper.php
class BillDeskHelper extends AppHelper { 

  /**
   * Generate an autosubmitted form with the info given as params
   * 
   */
  function transactionForm($action, $txtCustomerID, $txtTxnAmount, $RU, $txtAdditionalInfo = array()) {
    $form = "<form name='billDeskTransactionForm' id='billDeskTransactionForm' method='POST' action='". Common::baseUrl() ."$action'>
    <input type='hidden' name='txtCustomerID' value='$txtCustomerID'>
    <input type='hidden' name='txtTxnAmount' value='$txtTxnAmount'>
    <input type='hidden' name='RU' value='". Common::baseUrl() ."$RU'>";
    if (!empty($txtAdditionalInfo)) {
      $i = 0;
      foreach ($txtAdditionalInfo as $info) {
        $info = str_replace("'", "\'", $info);
        $form .= "<input type='hidden' name='txtAdditionalInfo$i' value='$info'>";
      }
    }
    $form .= "</form>\n\n";
/*    $form .= "<script language=\"javascript\">\n"
             .'//$(function(){'."\n"
                .'document.billDeskTransactionForm.submit();'."\n"
             .'//});'."\n"
             .'</script>';
*/             
    return $form;
  }
}
?>

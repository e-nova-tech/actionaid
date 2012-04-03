<?php
/**
 * Payment Gateway simulation
 * 
 * @package     app.BillDeskTest.simulatePayment
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('js_for_layout','bill-desk-test');
  $this->set('css_for_layout','bill-desk-test');
?>

<h1>BillDesk Test Payment Gateway</h1>
<p>Choose the scenario you want to simulate</p>
  <?php foreach($responses as $n=>$response): ?>
    <table cellspacing="0" cellpadding="0" border="1">
      <tr>
         <td width="10%"><span class="scenario-number"><?php echo $n ?></span></td>
         <td width="20%">
          <form method="post" action="<?php echo $response['ru'] ?>">
            <input type="hidden" name="msg" value="<?php echo implode("|", $response['rsp']); ?>" />
            <input type="submit" value="scenario <?php echo $n ?>">
          </form>
         </td>
         <td>
           <?php echo $help[$n] ?><br/>
           <a class="see-response" href="#">See the response</a>
           <div class="response" style="display:none;">
             <table>
              <thead><tr><td>key</td><td>value</td></tr></thead>
              <tbody>
              <?php 
                $i = 1;
                foreach($response['rsp'] as $key=>$value): 
              ?>
                <tr<?php echo ($i%2 == 0 ? ' class="odd"' : ''); ?>>
                  <td class="alignRight"><?php echo $key; ?></td>
                  <td class="alignLeft"><?php echo $value; ?></td>
                </tr>
              <?php 
                $i++;
                endforeach; 
              ?>
              </tbody>
             </table>
           </div>
         </td>
      </tr>
    </table>
  <?php endforeach; ?>

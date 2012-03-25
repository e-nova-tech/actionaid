<?php
/**
 * Default Gift Selection Element
 *
 * @package     app.Gift.View.Elements.Forms.GiftSelect
 * @copyright   Copyright 2012, ActionAid Association India
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
    <div class="radiolist">
      <div class="input radiolist-item">
        <input type="radio" name="data[Gift][appeal]" value="child-sponsorship" id="child-sponsorship" class=" gift radio" checked="checked" />
        <label for="child-sponsorship" class="right"><strong>Yes! I will sponsor</strong></label>
        <select name="data[Children][number]" class="small" id="NumberOfChildren">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="5">5</option>
          <option value="10">10</option>
        </select>
        <strong class="inflect">child!</strong>
        <p style="margin-left:20px;">My sponsorship amount is: <span class="inr"><span>INR</span><span class="amount">6000</span></span>.</p>
        <div class="input text hidden">
          <input type="hidden" name="data[Gift][amount]" value="6000" id="giftamount"  />
        </div>
      </div>
      <div class="input radiolist-item">
        <input type="radio" name="data[Gift][appeal]" value="general-donation" id="general-donation" class="other gift radio" />
        <label for="general-donation" class="right">I prefer to make a general donation of</label>
        <div style="width:230px;clear:both;float:left;margin:5px 0 0 20px;">
          <span class="inr"><span>INR</span></span>
          <input type="text" name="data[Gift][other_amount]" id="general-donation-amount" style="width:80px" class="other gift text"/>
          <select name="data[Gift][frequency]" class="small" id="GiftFrequency">
            <option value="monthly">Monthly</option>
            <option value="annually">Annually</option>
            <option value="oneoff">One time only</option>
          </select>
          <p class='info' style="position:absolute"><span>No automatic recurring payment will be made, you will only receive a reminder by email.</span></p>
        </div>
      </div>
      <div style="display:none;">
         <input type="text" name="data[Gift][currency]" value="INR" type="hidden"/>
      </div>
      <?php echo $this->Form->error('Gift.amount')."\n"; ?>
    </div>

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
        <label for="child-sponsorship" class="right"><strong>Yes I want to enrich their lives!</strong></label><br/>
        I will sponsor <select name="data[Children][number]" class="small" id="NumberOfChildren" style="margin-left:20px">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        <label for="NumberOfChildren" class="right child"><strong>child for</strong></label>
        <select name="data[Gift][frequency]" class="small" id="GiftFrequency">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <label for="GiftFrequency" class="right year"><strong>year</strong></label>      
        <p style="">
          My sponsorship amount is: 
          <span class="inr"><span>INR</span><span class="amount">6000</span></span>
        </p>
        <div class="input text hidden">
          <input type="hidden" name="data[Gift][amount]" value="6000" id="giftamount"  />
        </div>
      </div>
      <div class="input radiolist-item">
        <input type="radio" name="data[Gift][appeal]" value="general-donation" id="general-donation" class="other gift radio" />
        <label for="general-donation" class="right">Let me start with</label>
        <span class="inr"><span>INR</span></span>
        <input type="text" name="data[Gift][other_amount]" id="general-donation-amount" style="width:80px" class="other gift text"/>
      </div>
      <div style="display:none;">
         <input type="text" name="data[Gift][currency]" value="INR" type="hidden"/>
      </div>
      <?php echo $this->Form->error('Gift.amount')."\n"; ?>
    </div>

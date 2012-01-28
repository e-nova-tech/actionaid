    <div class="radiolist">
<?php foreach ($this->Gift->getAmounts() as $key => $amount) : ?>
      <div class="input radio">
        <input type="radio" name="data[Gift][amount]" value="<?php echo $amount; ?>" id="giftamount<?php echo $key ?>" <?php $this->Gift->isAmountSelected($amount); ?> />
        <label for="giftamount<?php echo $key ?>" class="inr"><span class="inr">INR</span><?php echo $amount ?></label>
      </div>
<?php endforeach; ?>
<?php if ($this->Gift->allowOtherAmount()) : ?>
      <div class="input radiotext">
        <input type="radio" name="data[Gift][amount]" value="other" id="giftamount<?php echo ++$key; ?>" class="other gift radio" <?php $this->Gift->isAmountSelected('other'); ?>/>
        <label for="giftamount<?php echo $key; ?>" class="inr right">Other</label>
        <span class="inr">INR</span>
        <input type="text" name="data[Gift][other_amount]" id="giftamount<?php echo ++$key; ?>" value="<?php $this->Gift->getOtherAmount(); ?>" class="other gift text"/>
      </div>
      <div style="display:none;">
         <input type="text" name="data[Gift][currency]" value="INR" type="hidden"/>
      </div>
<?php endif; ?>
      <?php echo $this->Form->error('Gift.amount')."\n"; ?>
    </div>

<?php
/**
 * Default Donation Page
 * 
 * @package     app.Gift.View.add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout','Sponsor a child');
  $this->set('css_for_layout','sponsor-a-child');
  $this->set('js_for_layout','sponsor-a-child');
?>
<div class="gift form grid_5 push_7">
  <h1 class="clearfix"><?php echo __('Sponsor a child today!'); ?></h1>
  <?php echo $this->element('messages'); ?>
  <?php echo $this->MyForm->create('Gift')."\n"; ?>
  <fieldset class="gift">
    <strong>Yes! I would like to sponsor</strong>
    <select name="data[Person][title]" class="small" id="GiftFactor"> 
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="5">5</option>
      <option value="10">10</option>
    </select>
    <strong>child!</strong><br/> (Sponsorship amount: <span class="inr"><span>INR</span>6000</span>)
    <div class="input text hidden">
      <input type="hidden" name="data[Gift][amount]" value="6000" id="giftamount"  /> 
    </div>
  </fieldset>
  <fieldset class="contact">
    <legend><?php echo __('Enter your contact details'); ?></legend>
<?php echo $this->element('Forms/ContactDetails'); ?>
  </fieldset>
<?php echo $this->element('Forms/SecuritySeal'); ?>
  <?php echo $this->MyForm->submit(__('Donate Now!'),array('class'=>'donate submit')); ?>
<?php echo $this->MyForm->end(); ?>
</div>


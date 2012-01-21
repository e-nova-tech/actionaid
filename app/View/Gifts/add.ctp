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
  $this->set('title_for_layout','Make a gift!');
?>
<div class="gift form grid_8 alpha">
  <?php echo $this->MyForm->create('Gift')."\n"; ?>
  <fieldset>
    <legend><?php echo __('Select a gift amount'); ?></legend>
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
  </fieldset>
  <fieldset>
    <legend><?php echo __('Enter your contact details'); ?></legend>
    <?php echo $this->MyForm->input('Person.title', array(
      'type'=>'select','label'=>__('Title'), 'class'=>'required',
      'options' => array('ms'=>'Ms','mrs'=>'Mrs','mr'=>'Mr','dr'=>'Dr.','prof'=>'Prof.')
    )); ?>
    <?php echo $this->MyForm->input('Person.firstname', array(
      'label'=>__('Firstname'),'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.lastname', array(
      'label'=>__('Lastname'),'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.address1', array(
      'label'=>__('Address'),'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.address2', array(
      'label'=>__('Address (cont.)'),'class'=>''
    )); ?>
    <?php echo $this->MyForm->input('Person.city', array(
      'label'=>__('City'), 'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.pincode', array(
      'label'=>__('Pincode'), 'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.state', array(
      'label'=>__('State'), 'class'=>'required',
      'options'=> $states
    )); ?>
    <div class="input select">
    <?php echo $this->MyForm->input('Person.country', array(
      'type'=>'select', 'div'=>false, 'label'=>__('Country'),
      'options'=> $countries, 'class'=>'required'
    )); ?>
    <p class='info'><?php echo sprintf(__('If you are not residing in India please donate to %s'),'<a href="#" target="_blank">ActionAid International</a>'); ?>.</p>
    </div>
    <?php echo $this->MyForm->input('Person.email', array(
      'label'=>__('Email'), 'class'=>'required'
    )); ?>    
    <?php echo $this->MyForm->input('Person.phone', array(
      'label'=>__('Phone No.'), 'class'=>'required'
    )); ?>
    <p class='info'>
       <?php echo __('We need this information in case we need to get touch with you concerning your donation.'); ?>
    </p>
    <?php echo $this->MyForm->input('Person.dob', array(
      'label'=>__('Date of birth'), 'class'=>'required', 'type'=>'date','separator'=>' / ',
      'dateFormat' => 'DMY','monthNames'=>false, 'minYear' => date('Y')-112, 'maxYear' => date('Y') - Configure::read('App.gift.minimum_age')
    )); ?>
    <div class="input text">
    <?php echo $this->MyForm->input('Person.pan', array(
      'label'=>__('Pan No.'), 'class'=>'required', 'div'=>false
    )); ?>
    <p class='info'><?php echo __('The PAN number is mandatory for Indian Nationals for donation amounts of INR 5,000 & above.'); ?></p>
    </div>
  </fieldset>
  <div class="verisign verify">
    <a href="#"><img src="img/verisign.png" alt="verify"></a>
  </div>
  <?php echo $this->MyForm->submit(__('Donate Now!'),array('class'=>'donate submit')); ?>
<?php echo $this->MyForm->end(); ?>
</div>
<div class="sidebar grid_4 omega">
   <img src="img/73407crop_c.jpg" width="300px"/>
   <img src="img/73407crop_c.jpg" width="300px"/>
   <blockquote>
      "This isn’t a selfless act, it’s rewarding. You could call me a donor, 
      but I know that I’m the real beneficiary" ~ <span class="author">an ActionAid donor</span>
   </blockquote>
</div>

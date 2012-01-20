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
<?php foreach ($this->Gift->allowed_amount as $key => $amount) : ?>
      <div class="input radio">
        <input type="radio" name="data[Gift][amount]" value="<?php echo $amount; ?>" id="giftamount<?php echo $key ?>" <?php $this->Gift->isAmountSelected($amount); ?> />
        <label for="giftamount<?php echo $key ?>" class="inr"><span class="inr">INR</span><?php echo $amount ?></label>
      </div>
<?php endforeach; ?>
<?php if ($this->Gift->allow_other_amount) : ?>
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
      <?php echo $this->Form->error('Gift.amount', array(
        'numeric'=> __('Please provide a valid amount'),
        'maximum' =>  __('Please provide a valid amount'),
        'minimum' =>  sprintf(__('Sorry, the minimum gift amount is %s INR.'), 6000)
      ))."\n"; ?>
    </div>
  </fieldset>
  <fieldset>
    <legend><?php echo __('Enter your contact details'); ?></legend>
    <?php echo $this->MyForm->input('Person.title', array(
      'type'=>'select','label'=>__('Title'), 'class'=>'required',
      'options' => array('ms'=>'Ms','mrs'=>'Mrs','mr'=>'Mr','dr'=>'Dr.','prof'=>'Prof.'),
      'error' => array(
        'empty' => __('Please select a title'),
        'exist' => __('Please select a title from the list'),
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.firstname', array(
      'label'=>__('Firstname'),'class'=>'required',
      'error' => array(
        'empty' => __('Please indicate your firstname'),
        'alpha' => __('Your name should not contain special characters (ex: ! or ? or #)'),
        'length' => __('Your firstname should not be longer than 64 characters')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.lastname', array(
      'label'=>__('Lastname'),'class'=>'required',
      'error' => array(
        'empty' => __('Please indicate your lastname'),
        'alpha' => __('Your name should not contain special characters'),
        'length' => __('Your lastname should not be longer than 64 characters')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.address1', array(
      'label'=>__('Address'),'class'=>'required',
      'error' => array(
        'empty' => __('Please provide an adress'),
        'length' => __('Your address first line should not be longer than 128 characters')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.address2', array(
      'label'=>__('Address (cont.)'),'class'=>'',
      'error' => array(
        'length' => __('Your address second line should not be longer than 128 characters')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.city', array(
      'label'=>__('City'), 'class'=>'required',
      'error' => array(
        'empty' => __('Please provide a city'),
        'alpha' => __('Your city name should not contain special characters (ex: ! or ? or #)'),
        'length' => __('Your city name should not be longer than 64 characters')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.pincode', array(
      'label'=>__('Pincode'), 'class'=>'required',
      'error' => array(
        'empty' => __('Please indicate your pincode'),
        'numeric' => __('Your pincode should be composed of 6 digits'),
        'length' => __('Your pincode should be composed of 6 digits')
      )
    )); ?>
    <?php echo $this->MyForm->input('Person.state', array(
      'label'=>__('State'), 'class'=>'required' ,
      'options'=> $states,
      'error' => array(
        'empty' => __('Please select a state'),
        'length' => __('Please select a valid state'),
        'format' => __('Please select a valid state'),
        'exist' => __('Please select a valid state'),
      )
    )); ?>
    <div class="input select">
    <?php echo $this->MyForm->input('Person.country', array(
      'type'=>'select', 'div'=>false, 'label'=>__('Country'),
      'options'=> $countries, 'class'=>'required',
      'error' => array(
        'empty' => __('Please select a country'),
        'length' => __('Please select a valid country'),
        'format' => __('Please select a valid country'),
        'exist' => __('Please select a valid country')
      )
    )); ?>
    <p class='info'><?php echo sprintf(__('If you are not residing in India please donate to %s'),'<a href="#" target="_blank">ActionAid International</a>'); ?>.</p>
    </div>
    <?php echo $this->MyForm->input('Person.email', array(
      'label'=>__('Email'), 'class'=>'required',
      'error' => array(
        'empty' => __('Please provide your email address'),
        'email' => __('Please provide a valid email address, ex: support@actionaid.org')
      )
    )); ?>    
    <?php echo $this->MyForm->input('Person.phone', array(
      'label'=>__('Phone No.'), 'class'=>'required',
      'error' => array(
        'empty' => __('Please indicate your phone number'),
        'format' => __('Please provide a valid phone number'),
      )
    )); ?>
    <p class='info'>
       <?php echo __('We need this information in case we need to get touch with you concerning your donation.'); ?>
    </p>
    <?php echo $this->MyForm->input('Person.dob', array(
      'label'=>__('Date of birth'), 'class'=>'required', 'type'=>'date','separator'=>' / ',
      'dateFormat' => 'DMY','monthNames'=>false, 'minYear' => date('Y')-112, 'maxYear' => date('Y')-18,
      'error' => array(
        'empty' => __('Please provide your birthdate'),
        'format' => __('Please provide a valid birthdate')
      )
    )); ?>
    <div class="input text">
    <?php echo $this->MyForm->input('Person.pan', array(
      'label'=>__('Pan No.'), 'class'=>'required', 'div'=>false,
      'error' => array(
        'empty' => __('Please provide your PAN number'),
        'format' => __('Please provide a valid PAN number')
      )
    )); ?>
    <p class='info'><?php echo __('PAN N° is mandatory for Indian Nationals for donation amounts of INR 5,000 & above.'); ?></p>
    </div>
  </fieldset>
  <div class="verisign verify">
    <a href="#"><img src="img/verisign.png" alt="verify"></a>
  </div>
  <?php echo $this->MyForm->submit(__('Donate Now!  »'),array('class'=>'donate submit')); ?>
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

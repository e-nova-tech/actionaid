<?php
 $this->set('title_for_layout','ActionAid India - Make a gift!');
 $states = array('IN-AP'=>'Andhra Pradesh','IN-AR'=>'Arunachal Pradesh','IN-AS'=>'Assam','IN-BR'=>'Bihar','IN-CT'=>'Chhattisgarh','IN-GA'=>'Goa','IN-GJ'=>'Gujarat','IN-HR'=>'Haryana','IN-HP'=>'Himachal Pradesh','IN-JK'=>'Jammu and Kashmir','IN-JH'=>'Jharkhand','IN-KA'=>'Karnataka','IN-KL'=>'Kerala','IN-MP'=>'Madhya Pradesh','IN-MH'=>'Maharashtra','IN-MN'=>'Manipur','IN-ML'=>'Meghalaya','IN-MZ'=>'Mizoram','IN-NL'=>'Nagaland','IN-OR'=>'Orissa','IN-PB'=>'Punjab','IN-RJ'=>'Rajasthan','IN-SK'=>'Sikkim','IN-TN'=>'Tamil Nadu','IN-TR'=>'Tripura','IN-UT'=>'Uttarakhand','IN-UP'=>'Uttar Pradesh','IN-WB'=>'West Bengal','IN-AN'=>'Andaman and Nicobar Islands','IN-CH'=>'Chandigarh','IN-DN'=>'Dadra and Nagar Haveli','IN-DD'=>'Daman and Diu','IN-DL'=>'Delhi','IN-LD'=>'Lakshadweep','IN-PY'=>'Pondicherry (Puducherry)');
 /* 
  // Optional Gift config
  $this->Gift->init(array(
   'allowed_amount' => array('3000','4000','9000'),
   'default_amount' => '4000',
   'allow_other_amount' => true
 ));
 */
?>
<div class="gift form grid_8 alpha">
<?php echo $this->MyForm->create('Gift'); ?>
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
       <label for="giftamount<?php echo $key; ?>" class="inr right">Other<label>
       <span class="inr">INR</span> 
	     <input type="text" name="data[Gift][other_amount]" id="giftamount<?php echo ++$key; ?>" value="<?php $this->Gift->getOtherAmount(); ?>" class="other gift text"/>
    </div>
<?php endif; ?>
  </fieldset>
  <fieldset>
    <legend><?php echo __('Enter your contact details'); ?></legend>
    <?php echo $this->MyForm->input('Person.title', array(
      'type'=>'select','label'=>__('Title'), 'class'=>'required',
      'options' => array('Ms','Mrs','Mr','Dr','Prof'),
      'error' => array(
        'notempty' => __('Please select a title')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.firstname', array(
      'label'=>__('Firstname'),'class'=>'required',
      'error' => array(
        'notempty' => __('Please indicate your firstname')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.lastname', array(
      'label'=>__('Lastname'),'class'=>'required',
      'error' => array(
        'notempty' => __('Please indicate your lastname')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.address1', array(
      'label'=>__('Address'),'class'=>'required',
      'error' => array(
        'notempty' => __('Please provide an adress')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.address2', array(
      'label'=>__('Address (cont.)'),'class'=>''
    )); ?>
    <?php echo $this->MyForm->input('Person.city', array(
      'label'=>__('City'), 'class'=>'required',
      'error' => array(
        'notempty' => __('Please provide a city')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.pincode', array(
      'label'=>__('Pincode'), 'class'=>'required',
      'error' => array(
        'notempty' => __('Please indicate your pincode')
       )
    )); ?>
    <?php echo $this->MyForm->input('Person.state', array(
      'label'=>__('State'), 'class'=>'required' ,
      'options'=> $states,
      'error' => array(
        'notempty' => __('Please select a state')
       )
    )); ?>
    <div class="input select">
    <?php echo $this->MyForm->input('Person.country', array(
      'type'=>'select', 'div'=>false, 'label'=>__('Country'),
      'options'=>array('India'), 'disabled'=>true, 'class'=>'required',
      'error' => array(
        'notempty' => __('Please select a country')
       )
    )); ?>
    <p class='info'><?php echo sprintf(__('If you are not residing in India please donate to %s'),'<a href="#" target="_blank">ActionAid International</a>'); ?>.</p>
    </div>
    <?php echo $this->MyForm->input('Person.email', array(
      'label'=>__('Email'), 'class'=>'required',
      'error' => array(
        'notempty' => __('Please provide your email address')
       )
    )); ?>    
    <?php echo $this->MyForm->input('Person.phone', array(
      'label'=>__('Phone No.'), 'class'=>'required',
      'error' => array(
        'notempty' => __('Please indicate your phone number')
       )
    )); ?>
    <p class='info'>
       <?php echo __('We need these information in case to get touch with you concerning your donation.'); ?>
    </p>
    <?php echo $this->MyForm->input('Person.dob', array(
        'label'=>__('Date of birth'), 'class'=>'required', 'type'=>'date','separator'=>' / ',
        'dateFormat' => 'DMY','monthNames'=>false, 'minYear' => date('Y')-112, 'maxYear' => date('Y')-18,
        'error' => array(
          'notempty' => __('Please provide your birthdate')
         )
    )); ?>
    <div class="input text">
    <?php echo $this->MyForm->input('Person.pan', array(
      'label'=>__('Pan No.'), 'class'=>'required', 'div'=>false,
      'error' => array(
        'notempty' => __('Please provide your PAN number')
       )
    )); ?>
    <p class='info'>PAN N° is mandatory for Indian Nationals for donation amounts of INR 5,000 & above.</p>
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
   <blockquote>
      "This isn’t a selfless act, it’s rewarding. You could call me a donor, 
      but I know that I’m the real beneficiary" ~ <span class="author">an ActionAid donor</span>
   </blockquote>
</div>

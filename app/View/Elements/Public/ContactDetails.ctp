    <?php echo $this->MyForm->input('Person.title', array(
      'type'=>'select','label'=>__('Title'), 'class'=>'required',
      'options' => array('Ms'=>'Ms','Mrs'=>'Mrs','Mr'=>'Mr','Dr'=>'Dr.','Prof'=>'Prof.')
    )); ?>
    <?php /*echo $this->MyForm->input('Person.firstname', array(
      'label'=>__('Firstname'),'class'=>''
    )); ?>
    <?php */ echo $this->MyForm->input('Person.lastname', array(
      'label'=>__('Name'),'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.address1', array(
      'label'=>__('Address'),'class'=>'required'
    )); /*?>
    <?php echo $this->MyForm->input('Person.address2', array(
      'label'=>__('Address (cont.)'),'class'=>''
    ));*/ ?>
    <?php echo $this->MyForm->input('Person.city', array(
      'label'=>__('City'), 'class'=>'required city autocomplete'
    )); ?>
    <?php echo $this->MyForm->input('Person.pincode', array(
      'label'=>__('Pincode'), 'class'=>'required'
    )); ?>
    <?php echo $this->MyForm->input('Person.state', array(
      'label'=>__('State'), 'class'=>'required',
      'options'=> $states
    )); ?>
    <?php echo $this->MyForm->input('Person.country', array(
      'type'=>'select', 'label'=>__('Country'),
      'options'=> $countries, 'class'=>'required',
      'hint' => 'Sorry we do not support international online donations yet. If you are not residing in India please use our <a href="#">offline donation form</a> or donate <a href="http://www.actionaid.org/donate" target="_blank">ActionAid International</a>'
    )); ?>
    <?php echo $this->MyForm->input('Person.email', array(
      'label'=>__('Email'), 'class'=> 'required'
    )); ?>
    <?php /*echo $this->MyForm->input('Person.phone', array(
      'type'=>'select', 'label'=> 'Phone','div' => array('class'=>'hidden-label') ,
      'options'=> array('Mobile','Home','Work')
     )); ?>
    <?php*/ echo $this->MyForm->input('Person.phone', array(
      'label'=> __('Phone'), 'class'=>'',
      'hint' => __('We need this information in case we need to get touch with you concerning your donation.')
    )); ?>
    <?php /*echo $this->MyForm->input('Gift.source', array(
      'type'=>'select', 'label'=> 'Source', 'div' => array('class' => 'hidden-label'),
      'options'=> array('Where did you hear from us?','Friends','Search Engine','Newspaper','Website','Promotional Message','ActionAid Employee','I am already a donor','Other'),
    )); ?>
    <?php */echo $this->MyForm->input('Person.contact allowed', array(
      'type'=>'checkbox', 'label'=> 'Yes, you can use my contact details to get in touch with me.',
      //'hint'=> __('An account will allow you to see your past transactions and download your tax receipts. We will send you instructions by email on how to activate your account. <a href="faq">Learn more</a>'),
    )); ?>
    <?php /* echo $this->MyForm->input('Person.dob', array(
      'label'=>__('Date of birth'), 'class'=>'', 'type'=>'date','separator'=>' / ',
      'dateFormat' => 'DMY','monthNames'=>false, 'minYear' => date('Y')-112, 'maxYear' => date('Y') - Configure::read('App.gift.minimumAge')
    )); ?>
    <?php echo $this->MyForm->input('Person.pan', array(
      'label'=>__('Pan No.'), 'class'=>'required',
      'hint'=> __('The PAN number is mandatory for for donations above <span class="inr">INR</span> 5,000.')
    ));*/ ?>

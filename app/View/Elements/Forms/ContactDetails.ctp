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
      'hint' => __('If you are not residing in India please donate to %s','<a href="#" target="_blank">ActionAid International</a>')
    )); ?>
    <?php echo $this->MyForm->input('Person.email', array(
      'label'=>__('Email'), 'class'=>'required'
    )); ?>    
    <?php echo $this->MyForm->input('Person.phone', array(
      'label'=> __('Phone No.'), 'class'=>'required',
      'hint' => __('We need this information in case we need to get touch with you concerning your donation.')
    )); ?>
    <?php echo $this->MyForm->input('Person.dob', array(
      'label'=>__('Date of birth'), 'class'=>'required', 'type'=>'date','separator'=>' / ',
      'dateFormat' => 'DMY','monthNames'=>false, 'minYear' => date('Y')-112, 'maxYear' => date('Y') - Configure::read('App.gift.minimum_age')
    )); ?>
    <?php echo $this->MyForm->input('Person.pan', array(
      'label'=>__('Pan No.'), 'class'=>'required',
      'hint'=> __('The PAN number is mandatory for for donations above <span class="inr">INR</span> 5,000.')
    )); ?>

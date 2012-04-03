<?php
/**
 * Contact Form
 * 
 * @package     app.View.Contacts.index
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout',__('Let\'s get in touch!'));
  $this->set('css_for_layout', 'contact');
?>
  <div class="contact form grid_5 alpha">
    <h2><?php echo __('Please use the contact form bellow...'); ?></h2>
    <?php echo $this->MyForm->create(null, array('action' => 'index')); ?>
    <fieldset>
      <legend><?php echo __('With the following details'); ?></legend>
      <?php echo $this->MyForm->input('Contact.name', array('label' => __('Name'), 'class'=>'required')); ?>
      <?php echo $this->MyForm->input('Contact.email', array('label' => __('Email'), 'class'=>'required')); ?>
      <?php echo $this->MyForm->input('Contact.phone', array('label' => __('Phone').'&nbsp;&nbsp;')); ?>
      <?php echo $this->MyForm->input('Contact.subject', array(
          'label'   => __('Subject'), 'class'=>'required',
          'type'    => 'select',
          'options' => array(
            'general inquiry'   => __('General inquiry'),
            'child sponsorship' => __('About child sponsorship'), 
            'about my donation' => __('About my donation'),
            'technical issue'   => __('Technical issue'), 
            'others'            => __('Others')
        )));?>
      <?php echo $this->MyForm->input('Contact.message', array('label' => __('Message'), 'class'=>'required',)); ?>
      <?php echo $this->MyForm->input('Contact.check', array('type'=>'hidden', 'label' => __('Email'))); ?>
    </fieldset>
    <?php echo $this->MyForm->submit(__('Send!')); ?>
    <?php echo $this->MyForm->end(); ?>
  </div>
  <div class="grid_3">
    <h2><?php echo __('Or you can also...'); ?></h2>
<?php echo $this->element('Public/ActionAidContactInfo'); ?>
  </div>
  <div class="grid_4 omega">
<?php echo $this->element('Public/OfficesMap'); ?>
  </div>

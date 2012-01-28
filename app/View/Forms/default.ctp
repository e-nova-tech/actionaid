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
  <?php echo $this->element('messages'); ?>
  <?php echo $this->MyForm->create('Gift')."\n"; ?>
  <fieldset class="gift">
    <legend><?php echo __('Select a gift amount'); ?></legend>
<?php echo $this->element('Forms/SelectGiftRadio'); ?>
  </fieldset>
  <fieldset class="contact">
    <legend><?php echo __('Enter your contact details'); ?></legend>
<?php echo $this->element('Forms/ContactDetails'); ?>
  </fieldset>
<?php echo $this->element('Forms/SecuritySeal'); ?>
  <?php echo $this->MyForm->submit(__('Donate Now!'),array('class'=>'donate submit')); ?>
<?php echo $this->MyForm->end(); ?>
</div>
<div class="sidebar grid_4 omega">
<img src="img/appeals/88507scr.jpg" width="300"/>
<?php echo $this->element('Forms/BudgetBreakdown'); ?>
<?php echo $this->element('Forms/SocialMedia'); ?>
</div>

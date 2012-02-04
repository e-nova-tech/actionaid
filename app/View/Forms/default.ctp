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
  $this->set('css_for_layout','default');
?>
<div class="gift form grid_8 alpha">
  <?php echo $this->element('messages'); ?>
  <?php echo $this->MyForm->create('Gift')."\n"; ?>
  <fieldset class="gift">
    <legend><?php echo __('Select a gift amount'); ?></legend>
    <p class="info" style="margin-top:0px">
      <?php echo __('Contributions to ActionAid Association are exempted from Tax under section 80G of Income TaxAct 1961.'); ?>
    </p>
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
<img src="img/appeals/88082scr.jpg" width="300"/>
<?php echo $this->element('Forms/BudgetBreakdown'); ?>
<h3><?php echo __('Tell your friends!'); ?></h3>
<?php echo $this->element('Forms/SocialMedia'); ?>
</div>

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
  $this->set('title_for_layout','Sponsor a child today!');
  $this->set('css_for_layout','child-sponsorship');
?>
<div class="gift form grid_5 push_7">
  <?php echo $this->MyForm->create('Gift')."\n"; ?>
  <fieldset class="gift">
    <legend><?php echo __('Your gift details'); ?></legend>
<?php echo $this->element('Public/GiftSelect'); ?>
  </fieldset>
  <fieldset class="contact">
    <legend><?php echo __('Your contact details'); ?></legend>
<?php echo $this->element('Public/ContactDetails'); ?>
  </fieldset>
<p class="tax note"><?php echo __('Contributions to ActionAid Association are exempted from Tax under section 80G of Income TaxAct 1961.'); ?></p>
<?php echo $this->element('Public/SecuritySeal'); ?>    
  <?php echo $this->MyForm->submit(__('Donate Now!'),array('class'=>'donate submit')); ?>
<?php echo $this->MyForm->end(); ?>
</div>


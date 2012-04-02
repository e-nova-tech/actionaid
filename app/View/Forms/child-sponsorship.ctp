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
  $this->set('css_for_layout','sponsor-a-child');
  $this->set('js_for_layout','sponsor-a-child');
  $this->set('no_container_for_layout', true);
?>
<div class="container texture dark header_push">
<div id="slideshow_container" class="slideshow_container container">
<div id="slideshow" role="main" class="container slideshow clearfix">
  <div class="container_12">
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
  </div>
</div>
</div>
</div>
<div class="container texture">
<div class="container_12 container fold clearfix">
  <?php $options = array('cache'=> array('config' => Configure::Read('App.cache.elements'))); ?>
  <div class="grid_12 impact">
  <?php echo $this->element('Public/ImpactWide', array(), $options); ?>
  </div>
  <div class="grid_7 content">
  <?php echo $this->element('Public/Testimonials', array(), $options); ?>
  <?php echo $this->element('Public/Faq', array(), $options); ?>
  </div>
  <div class="grid_5 sidebar">
  <?php echo $this->element('Public/BudgetBreakdown', array(), $options); ?>
  <?php echo $this->element('Public/OfflineForm', array(), $options); ?>
  <?php echo $this->element('Public/SocialMedia'); // don't cache it use php setters ?>
  </div>
</div>
</div>

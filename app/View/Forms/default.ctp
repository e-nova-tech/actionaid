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
<div id="slideshow_container" class="slideshow_container">
<div id="slideshow" role="main" class="container slideshow clearfix">
  <div class="container_12">
    <div class="ctrl">
      <div class="arrow left"><a href="#" id="js_ctrl-prev"><span>Previous</span></a></div>
      <div class="arrow right"><a href="#" id="js_ctrl-next"><span>Next</span></a></div>
    </div>
    <!--content -->
    <div class="grid_5 push_7">
      <div class="slide caption">
        <blockquote>
          <span class="quote">“I like to help people and that makes me happy.”</span>
          <span class="author">Eshwaramma</span>
        </blockquote><br/><br/>
        <span class="context">
          Eshwaramma is a campaigner for children with 
          disabilities, winner of the International Diana Award.
          This 18 year old quadriplegic was also a sponsored child when she was younger.
          She is a perfect example of the difference you can make with a child sponsorship.     
        </span>
      </div>
      <h2><a href="child-sponsorship" class="button donate dark-shadow"><?php echo __('Sponsor a child today!'); ?> ›</a></h2>
      <h3 class="tax note">Contributions to ActionAid are exempted from Tax under Sec 80 G of Income Tax Act 1961</h3>
    </div>
  </div>
</div>
</div>
</div>
<div class="container texture clearfix">
<div class="container_12 container fold clearfix">
<?php $options = array('cache'=> array('config' => Configure::Read('App.cache.elements'))); ?>
  <div class="grid_12 impact">
<?php echo $this->element('Public/ImpactWide', array(), $options); ?>
  </div>
  <div class="grid_7 content">
<?php echo $this->element('Public/Testimonials', array(), $options); ?>
<?php echo $this->element('Public/Faq'); ?>
  </div>
  <div class="grid_5 sidebar">
<?php echo $this->element('Public/BudgetBreakdown', array(), $options); ?>
<?php echo $this->element('Public/OfflineForm', array(), $options); ?>
<?php echo $this->element('Public/SocialMedia'); // don't cache it use php setters ?>
  </div>
</div>
</div>

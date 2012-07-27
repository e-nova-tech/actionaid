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
        <span class="context">
          ActionAid’s work with community partners in her village has enabled Shanno and her friends from Dabokpura village in Dhaulpur to attend school regularly. One of the ActionAid supported children in her community, Shanno is an example of how your donations can make a difference.  
        </span>
        <br/><br/>
        <blockquote>
          <span class="quote">You could keep that smile alive.</span>
          <!-- <span class="author">Shanno</span> -->
        </blockquote>
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
<?php echo $this->element('Public/OfflineFormBullet', array(), $options); ?>
<?php echo $this->element('Public/SocialMedia'); // don't cache it use php setters ?>
  </div>
</div>
</div>

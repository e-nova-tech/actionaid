<?php
/**
 * Sponsor A Child Thank You Page
 * 
 * @package     app.Gift.View.Pages.thank-you
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout','Thank you for your donation!');
  $this->set('css_for_layout','sponsor-a-child');
  $this->set('js_for_layout','sponsor-a-child');
  $this->set('no_container_for_layout', true);
?>
<div class="container texture dark header_push thank-you">
<div id="slideshow_container" class="slideshow_container container">
<div id="slideshow" role="main" class="container slideshow clearfix">
  <div class="container_12">
    <div class="banner grid_5 push_7">
    <?php echo $this->element('Public/Failure'); ?>
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
  
</div>
</div>

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
  $this->set('title_for_layout','Thank You!');
  $this->set('css_for_layout','thank-you');
?>
<div class="thank-you grid_5 push_7">
  <h2><?php echo __('Thank you!'); ?></h2>
  <p>
    <strong><?php echo __('Thank you for supporting ActionAid and helping us make a difference!'); ?></strong><br/>
    <?php echo __('You will receive a confirmation by email concerning your gift shortly.'); ?>
    <?php echo __('If you have any questions do not hesitate to get in touch with us.')."\n"; ?><br/>
    <a href="http://actionaid.org/india/" style="padding:10px 0; display:block;">Go back to ActionAid India home page &#0155;</a>
  </p>
  <div class="clearfix"></div>
  <h2><?php echo __('Tell your friend!'); ?></h2>
<?php echo $this->element('Forms/SocialMedia', array('url' => '/')); ?>
</div>


<?php
/**
 * Sponsor A Child Thank You Page
 * 
 * @package     app.Gift.View.add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout','Sponsor a child today!');
  $this->set('css_for_layout','sponsor-a-child');
?>
<div class="gift form grid_5 push_7">
  <h2><?php echo __('Thank you!'); ?></h2>
  <p class="thank-you">
    <strong><?php echo __('Thank you for supporting ActionAid and helping us make a difference!'); ?></strong><br/>
    <?php echo __('You will receive a confirmation by email concerning your gift shortly.'); ?>
    <?php echo __('If you have any questions do not hesitate to get in touch with us.')."\n"; ?><br/>
    <a href="http://actionaid.org/india/" style="padding:10px 0; display:block;">Go back to ActionAid India home page &#0155;</a>
  </p>
<div class="clearfix"></div>
  <h2><?php echo __('Tell your friend!'); ?></h2>
<?php echo $this->element('Forms/SocialMedia'); ?>
</div>


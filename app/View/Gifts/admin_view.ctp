<?php 
/**
 * Gift View (Admin)
 *
 * @package     app.View.Gifts.admin_index
 * @copyright   Copyright 2012 ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Gifts View'));
  $this->set('menu_for_layout', 'gifts:admin_view');
?>
<div class='grid_3 alpha'>
  <h2><?php echo __('Gift details'); ?></h2>
  <p><strong><?php echo __('Amount'); ?></strong>: <?php echo $gift['Gift']['amount']; ?></p>
  <p><strong><?php echo __('Currency'); ?></strong>: <?php echo $gift['Gift']['currency']; ?></p>
  <p><strong><?php echo __('Appeal'); ?></strong>: <?php echo $gift['Appeal']['name']; ?></p>
</div>
<div class='grid_3'>
  <h2><?php echo __('Person details'); ?></h2>
  <p><strong><?php echo __('Title'); ?></strong>: <?php echo $gift['Person']['title']; ?></p>
  <p><strong><?php echo __('Firstname'); ?></strong>: <?php echo $gift['Person']['firstname']; ?></p>
  <p><strong><?php echo __('Lastname'); ?></strong>: <?php echo $gift['Person']['lastname']; ?></p>
  <p><strong><?php echo __('Date of birth'); ?></strong>: <?php echo $gift['Person']['dob']; ?></p>
  <p><strong><?php echo __('Pan'); ?></strong>: <?php echo $gift['Person']['pan']; ?></p>
</div>
<div class='grid_3'>
  <h2><?php echo __('Address'); ?></h2>
  <p><strong><?php echo __('Address'); ?></strong>: <?php echo $gift['Person']['address1']; ?></p>
  <p><strong><?php echo __('Address'); ?></strong>: <?php echo $gift['Person']['address2']; ?></p>
  <p><strong><?php echo __('City'); ?></strong>: <?php echo $gift['Person']['city']; ?></p>
  <p><strong><?php echo __('State'); ?></strong>: <?php echo $gift['Person']['state']; ?></p>
  <p><strong><?php echo __('Country'); ?></strong>: <?php echo $gift['Person']['country']; ?></p>
</div>
<div class='grid_3 omega'>
  <h2><?php echo __('Contact Info'); ?></h2>
  <p><strong><?php echo __('Email'); ?></strong>: <?php echo $gift['Person']['email']; ?></p>
  <p><strong><?php echo __('Phone'); ?></strong>: <?php echo $gift['Person']['phone']; ?></p>
</div>

<?php
/**
 * Login Form View (Admin)
 *
 * @package     app.View.Users.admin_login
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
  <fieldset>
    <legend><?php echo __('Please enter your username and password'); ?></legend>
  <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>

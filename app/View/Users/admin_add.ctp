<?php
/**
 * View a User (Admin)
 *
 * @package     app.View.Users.admin_add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */  
  $this->set('title_for_layout', __('Add a User'));
?>
<div class="users form">
<?php echo $this->Form->create('User');?>
  <fieldset>
    <legend><?php echo __('User details'); ?></legend>
  <?php
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('role', array(
      'options' => array('admin' => 'Admin')
    ));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

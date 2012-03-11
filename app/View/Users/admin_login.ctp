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
  $this->set('title_for_layout', __('Login'));
?>
<?php echo $this->element('Menu', array(
        'id' => 'sub.admin_auth',
        'options'=> array('class'=>'menu with_tabs ')
)); ?>
<div class="users admin_login form">
<?php echo $this->MyForm->create('User');?>
  <fieldset>
    <legend><?php echo __('Please enter your username and password'); ?></legend>
  <?php    
    echo $this->MyForm->input('User.username', array('label' => __('Username'), 'class' =>' required'));
    echo $this->MyForm->input('User.password', array('label' => __('Password'), 'class' =>' required'));
  ?>
  </fieldset>
<?php echo $this->MyForm->submit(__('Login'));?>
<?php echo $this->MyForm->end();?>
</div>

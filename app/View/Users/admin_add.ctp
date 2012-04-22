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
<div class="users MyForm">
<?php echo $this->MyForm->create('User');?>
  <fieldset>
    <legend><?php echo __('User details'); ?></legend>
  <?php
    echo $this->MyForm->input('User.username', array('label' => __('Email ID'), 'class' =>' required'));
    echo $this->MyForm->input('User.password', array('label' => __('Password'), 'class' =>' required'));
    echo $this->MyForm->input('User.password_again', array('label' => __('Repeat password'), 'class' =>' required', 'type'=>'password'));
    echo $this->MyForm->input('User.role', array(
      'label' => __('Role'), 'class' =>' required',
      'options' => array('admin' => 'Admin')
    ));
  ?>
  </fieldset>
<?php echo $this->MyForm->submit(__('save'));?>
<?php echo $this->MyForm->end();?>
</div>

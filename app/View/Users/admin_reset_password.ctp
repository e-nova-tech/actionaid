<?php
/**
 * Password reset MyForm view
 *
 * @package     app.View.Users.reset_password
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $title_for_layout = __('Reset your password',true);
  $this->set('title_for_layout',$title_for_layout);
  $tabindex = 0;
?>
<div class="users form login grid_8 alpha">
<?php echo $this->element('Menu', array(
        'id' => 'sub.admin_auth',
        'options'=> array('class'=>'menu with_tabs')
)); ?>
  <?php echo $this->MyForm->create('User', array(
    'url' => DS.'admin'.DS.'password'.DS.'reset'.DS.$token))."\n"; ?>
  <fieldset>
    <legend><?php echo __('Please enter your new password'); ?></legend>
      <?php echo $this->MyForm->input('password', array(
        'type' => 'password',
        'class' => 'required',
        'label' => __('Password',true),
        'tabindex' => ++$tabindex
      ));?>
      <?php echo $this->MyForm->input('password_again', array(
        'type' => 'password',
        'value' => '',
        'class' => 'required',
        'label' => __('Password (again)',true),
        'tabindex' => ++$tabindex,
      ));?>
    </fieldset>
    <?php echo $this->MyForm->submit(__('change password',true), array(
       'tabindex' => ++$tabindex
     )); ?>
  <?php echo $this->MyForm->end(); ?>
</div>

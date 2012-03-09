<?php
/**
 * Password recovery form view
 *
 * @package     app.View.Users.forgot_password
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $title_for_layout = __('Forgot your password?');
  $this->set('title_for_layout',$title_for_layout);
  $tabindex = 0;
?>
<?php echo $this->element('Menu', array(
        'id' => 'sub.admin_auth',
        'options'=> array('class'=>'menu with_tabs top')
)); ?>
<div class="users form grid_8 alpha">
  <?php echo $this->MyForm->create('User', array('action' => 'forgot_password'))."\n"; ?>
    <fieldset>
      <legend><?php echo __('Please enter your email address'); ?></legend>
      <?php echo $this->MyForm->input('username', array(
        'class' => 'required',
        'label' => __('Username (email)'),
        'tabindex' => ++$tabindex,
      ));?>
    </fieldset>
    <?php echo $this->MyForm->submit(__('recover password'), array(
       'tabindex' => ++$tabindex
     )); ?>
  <?php echo $this->MyForm->end(); ?>
</div>  

<?php
/**
 * Home Page (Admin)
 *
 * @package     app.View.Pages.Home
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $title_for_layout = __('What do you feel like doing?');
  $this->set('title_for_layout',$title_for_layout);
?>
  <div class='view icon'>
    <ul>
      <li><?php echo $this->Html->link( $this->Html->image('icons/xl/help.png',array('alt'=>'help')).__('Help me get started...'),
	         array('admin'=>true,'controller'=>'help'), array('escape' => false)); ?></li>
      <li><?php echo $this->Html->link( $this->Html->image('icons/xl/appeals.png', array('alt'=>'appeals')).__(' Manage Appeals'),
           array('admin'=>true,'controller'=>'appeals', 'all'), array('escape' => false)); ?></li>
      <li><?php echo $this->Html->link( $this->Html->image('icons/xl/gifts.png', array('alt'=>'help')).__('Manage Gifts'),
           array('admin'=>true,'controller'=>'gifts', 'all'), array('escape' => false)); ?></li>
      <li><?php echo $this->Html->link( $this->Html->image('icons/xl/users.png', array('alt'=>'users')).__('Manage Users'),
           array('admin'=>true,'controller'=>'users'), array('escape' => false)); ?></li>
    </ul>
  </div>

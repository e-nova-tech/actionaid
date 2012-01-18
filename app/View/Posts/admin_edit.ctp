<?php
/**
 * Edit a Post (Admin)
 *
 * @package     app.View.Posts.admin_edit
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h1><?php echo __('Edit Post'); ?></h1>
<?php
  echo $this->MyForm->create('Post', array('action' => 'edit'));
  echo $this->MyForm->input('title', array('label'=>__('Title'), 'class'=> 'required'));
  echo $this->MyForm->input('slug', array('label'=>__('Slug'), 'class'=> 'required'));
  echo $this->MyForm->input('body', array('label'=>__('Body'), 'class'=> 'required','rows' => '3'));
  echo $this->MyForm->input('id', array('type' => 'hidden'));
  echo $this->Form->end('Save Post');
?>

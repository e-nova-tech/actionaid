<?php
/**
 * Add a Post (Admin)
 *
 * @package     app.View.Posts.admin_add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Add a Post'));
?>
<?php
  echo $this->Form->create('Post');
  echo $this->MyForm->input('title', array('label'=>__('Title'), 'class'=> 'required'));
  echo $this->MyForm->input('slug', array('label'=>__('Slug'), 'class'=> 'required'));
  echo $this->MyForm->input('body', array('label'=>__('Body'), 'class'=> 'required','rows' => '3'));
  echo $this->MyForm->input('id', array('type' => 'hidden'));
  echo $this->Form->end('Save Post');
?>

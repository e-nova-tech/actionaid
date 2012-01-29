<?php
/**
 * Add an Appeals (Admin)
 *
 * @package     app.View.Appeals.admin_add
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Add an appeal'));
?>
<?php echo $this->MyForm->create('Appeal',array('action'=>'admin_add')); ?>
<?php echo $this->MyForm->input('Appeal.title', array('label'=>__('Title'), 'class'=> 'required')); ?>
<?php echo $this->MyForm->input('Appeal.slug', array('label'=>__('Slug'), 'class'=> 'required')); ?>
<?php echo $this->MyForm->input('Appeal.description', array('label'=>__('Description'), 'class'=> 'required','rows' => '3')); ?>
<?php echo $this->MyForm->input('Appeal.status', array('options' => $appeal_status_options)); ?>
<?php echo $this->MyForm->end('Save appeal'); ?>


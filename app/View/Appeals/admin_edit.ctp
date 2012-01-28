<?php
/**
 * Edit an Appeal (Admin)
 *
 * @package     app.View.Appeals.admin_edit
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Edit an appeal'));
?>
<?php
  echo $this->MyForm->create('Appeal', array('action' => 'edit'));
  echo $this->MyForm->input('name', array('label'=>__('Name'), 'class'=> 'required'));
  echo $this->MyForm->input('slug', array('label'=>__('Slug'), 'class'=> 'required'));
  echo $this->MyForm->input('description', array('label'=>__('Description'), 'class'=> 'required','rows' => '3'));
  echo $this->Form->input('status', array('options' => $appeal_status_options));
  echo $this->MyForm->input('id', array('type' => 'hidden'));
  echo $this->Form->end('Save appeal');
?>

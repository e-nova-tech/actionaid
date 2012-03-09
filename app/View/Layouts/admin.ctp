<?php
/**
 * Admin Section Layout
 *
 * @package     app.View.Layouts.admin
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<head>
  <title><?php echo $title_for_layout; ?></title>
<?php echo $this->element('Admin'.DS.'Head'); ?>
<?php echo $this->element('Admin'.DS.'Css'); ?>
</head>
<body>
<?php echo $this->element('Messages'); ?>
<div class="container header clearfix">
<div class="container_12">
  <!-- Header -->
  <header>
<?php echo $this->element('Admin'.DS.'Header'); ?>
  </header>
</div>
</div>
<div class="container main clearfix">
<div class="container_12">
  <!-- Main Content -->
  <div id="main" role="main" class="grid_12">
    <h1><?php echo $title_for_layout; ?></h1>
<?php
  if (isset($menu_for_layout)) {
    echo $this->element('Menu', array(
      'id' => 'actions.'.$menu_for_layout,
      'options' => array('class' => 'action menu'))
    );
  }
// echo $this->element('Body' . DS. 'Menu', array('options' => array('class' => 'sub menu tabs')));
?>
<?php echo $content_for_layout; ?>
  </div>
</div>
</div>
<div class="container footer clearfix">
<div class="container_12 clearfix">
<?php echo $this->element('Footer'); ?>
</div>
</div>
<?php echo $this->element('Admin' . DS . 'Js'); ?>
</body>
</html>

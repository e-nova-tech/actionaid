<?php
/**
 * Default Donation Page Layout
 *
 * @package     app.View.Layouts.default
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this->element('Head' . DS . 'Doctype'); ?>
<head>
  <title><?php echo $title_for_layout; ?></title>
<?php echo $this->element('Head'); ?>
</head>
<body>
<div class="container header clearfix">
<div class="container_12">
  <!-- Header -->
  <header>
<?php echo $this->element('Header'); ?>
  </header>
</div>
</div>
<div class="container main clearfix">
<div class="container_12">
  <!-- Main Content -->
  <div id="main" role="main" class="grid_12">
<?php echo $this->Session->flash(); ?>
<?php echo $content_for_layout; ?>
  </div>
</div>
</div>
<div class="container footer clearfix">
<div class="container_12 clearfix">
<?php echo $this->element('Footer'); ?>
</div>
</div>
<?php echo $this->element('Footer' . DS . 'Js'); ?>
</body>
</html>

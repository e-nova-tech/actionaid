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
  <base href='<?php echo Router::url('/',true); ?>'> 
  <title><?php echo $title_for_layout; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1"> 
  <meta name="robots" content="noindex,nofollow"> 
  <link href="favicon.ico" type="image/x-icon" rel="icon"> 
  <link href="favicon.ico" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="css/grid.css"> 
  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" href="css/login.css"> 
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
<?php echo $this->element('Menu', array(
  'id' => 'sub.admin_authentication',
  'options'=> array('class'=>'menu with_tabs top')
)); ?>
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

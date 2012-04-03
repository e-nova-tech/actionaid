<?php
/**
 * Redirection Page Layout
 *
 * @package     app.View.Layouts.redirect
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!doctype html>
<html>
<head>
  <base href='<?php echo Router::url('/',true); ?>'> 
  <title><?php echo $title_for_layout; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1"> 
  <meta name="robots" content="noindex,nofollow"> 
  <link href="favicon.ico" type="image/x-icon" rel="icon"> 
  <link href="favicon.ico" type="image/x-icon" rel="shortcut icon">
  <link rel="stylesheet" href="css/redirection.css"> 
</head>
<body>
<div class="container redirect">
<?php echo $content_for_layout; ?>
</div>
<?php echo $this->element('Footer'.DS.'jquery'); ?>
<script src="js/redirect.js"></script>
<?php echo $this->element('Footer'.DS.'analytics'); ?>
</body>
</html>

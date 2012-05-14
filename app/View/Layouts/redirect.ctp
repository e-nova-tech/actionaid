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
  
  <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20940239-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
</head>
<body>
<div class="container redirect">
<?php echo $content_for_layout; ?>
</div>
<?php echo $this->element('Js'); ?>
<script src="js/redirect.js"></script>
</body>
</html>

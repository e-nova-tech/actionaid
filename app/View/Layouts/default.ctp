<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $title_for_layout; ?></title>
<?php echo $this->element('Head'); ?>
</head>
<body>
<div class="container header clearfix">
<div class="container_12">
  <!-- Header -->
  <header>
    <div class="header grid_12">
      <h1 class="logo">
        <a href="http://www.actionaid.org/india" alt="ActionAid"><span>ActionAid<span></a>
      </h1>
      <h2>End poverty together.</h2>
    </div>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script type="text/javascript" src="http://fast.fonts.com/jsapi/cfd002b4-72bb-4e9d-9540-e28e1ddba02b.js"></script> 
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>

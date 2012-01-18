<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <title><?php echo $title_for_layout; ?></title>
  <base href='http://localhost/donate/'> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="ActionAid India, administration">
  <meta name="keywords" content="ActionAid,India,Donate,End Poverty,Make a gift,Sponsor a child">
  <link href="favicon.ico" type="image/x-icon" rel="icon"> 
  <link href="favicon.ico" type="image/x-icon" rel="shortcut icon"> 
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
  <meta meta name="robots" content="nofollow">
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
      <h2>Administration</h2>
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
  <!-- Footer -->
  <footer>
    <div class="grid_8">
      ActionAid India Association is registered under the Societies Registration Act of 1860
      with its registered office at New Delhi. Registration number S-6828 on the 5th of October 2006.
    </div>
  </footer>
  <div class="debug grid_12">
  <?php echo $this->element('sql_dump'); ?>
  </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script type="text/javascript" src="http://fast.fonts.com/jsapi/cfd002b4-72bb-4e9d-9540-e28e1ddba02b.js"></script> 
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
</body>
</html>

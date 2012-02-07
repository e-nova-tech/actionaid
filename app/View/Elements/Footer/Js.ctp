<?php
/**
 * Javascript Element
 *
 * @package     app.View.Elements.Js
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  if(Configure::read('Preferences.javascript')) : ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script type="text/javascript" src="js/libs/jquery.validate-1.9.0.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-ui-1.8.17.custom.min.js"></script>
<?php if (isset($js_for_layout)): ?><script src="js/<?php echo $js_for_layout; ?>.js"></script><?php echo "\n";?>
<?php else: ?><script src="js/script.js"></script><?php endif; ?>
<?php if ($this->layout != 'admin') : ?>
<script>
  var _gaq=[['_setAccount','<?php echo Configure::read('App.google_analytics.UA'); ?>'],['_trackPageview']]; 
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; endif; ?>
<script type="text/javascript" src="http://fast.fonts.com/jsapi/cfd002b4-72bb-4e9d-9540-e28e1ddba02b.js"></script> 

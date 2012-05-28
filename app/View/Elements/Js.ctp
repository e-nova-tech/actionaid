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
  $fonts = true;
  if(Configure::read('Preferences.javascript')) : ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script type="text/javascript" src="js/libs/jquery.extralibs.min.js"></script>
<?php 
  if (isset($js_for_layout)): 
    if (is_array($js_for_layout)):
      foreach($js_for_layout as $js):
?>
<script src="js/<?php echo $js_for_layout; ?>.js"></script>
<?php 
        echo "\n";
      endforeach;
    else:
?>
<script src="js/<?php echo $js_for_layout; ?>.js"></script>
<?php echo "\n";
    endif;
  endif;
?>
<script src="js/script.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32175040-1']);
  _gaq.push(['_setDomainName', 'actionaidindia.org']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script> 
<?php if(isset($social_media_js) && $social_media_js) : ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
<script>(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();</script>

<?php endif; ?>
<?php if($fonts): ?>
<script type="text/javascript" src="https://fast.fonts.com/jsapi/cfd002b4-72bb-4e9d-9540-e28e1ddba02b.js"></script> 
<?php endif;
endif; ?>

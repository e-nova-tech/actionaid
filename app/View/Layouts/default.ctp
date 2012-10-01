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
<!doctype html>
<html>
<head>
<?php if($this->here == '/sponsor/' && false): ?>
	<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='60371284-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"></sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->
<?php endif; ?>
<?php if($this->here == '/sponsor/' || $this->here == '/sponsor/child-sponsorship' || $this->here == '/sponsor/pages/thank-you'): ?>
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1002129575;
var google_conversion_label = "Z0RSCLHR2AMQp5Ht3QM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1002129575/?value=0&amp;label=Z0RSCLHR2AMQp5Ht3QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php endif; ?>
  <title><?php echo $title_for_layout; ?></title>
<?php echo $this->element('Head'); ?>
<?php echo $this->element('Css'); ?>
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
<?php if(!isset($no_container_for_layout)) : ?>
<div class="container texture header_push">
<div class="container main clearfix">
<div class="container_12">
  <!-- Main Content -->
  <div id="main" role="main" class="grid_12">
<?php echo $content_for_layout; ?>
  </div>
</div>
</div>
</div>
<?php else: ?>
<?php echo $content_for_layout; ?>
<?php endif; ?>
<div class="container footer clearfix">
<div class="container_12 clearfix">
<?php echo $this->element('Footer'); ?>
</div>
</div>
<?php echo $this->element('Js'); ?>
</body>
</html>

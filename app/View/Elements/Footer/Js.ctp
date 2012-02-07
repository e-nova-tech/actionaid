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
<?php echo $this->element('Footer'.DS.'jquery'); ?>
<script type="text/javascript" src="js/libs/jquery.validate-1.9.0.min.js"></script>
<script type="text/javascript" src="js/libs/jquery-ui-1.8.17.custom.min.js"></script>
<?php if (isset($js_for_layout)): ?><script src="js/<?php echo $js_for_layout; ?>.js"></script><?php echo "\n";?>
<?php else: ?><script src="js/script.js"></script><?php endif; ?>
<?php echo $this->element('Footer'.DS.'analytics'); ?>
<script type="text/javascript" src="http://fast.fonts.com/jsapi/cfd002b4-72bb-4e9d-9540-e28e1ddba02b.js"></script> 
<?php endif;?>

<?php
/**
 * CSS Element
 *
 * @package     app.View.Element.Head.Css
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
  <link rel="stylesheet" href="css/grid.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.17.custom.css">
<?php 
  if(isset($css_for_layout)):
    if(is_array($css_for_layout)) : 
      foreach($css_for_layout as $css) : ?>
  <link rel="stylesheet" href="css/<?php echo $css_for_layout; ?>.css">
<?php 
      endforeach;
    else:
?>
  <link rel="stylesheet" href="css/<?php echo $css_for_layout; ?>.css">
<?php 
    endif; 
  endif;
?>

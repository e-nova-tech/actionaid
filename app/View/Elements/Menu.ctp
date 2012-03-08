<?php
/**
 * Admin Menu Element
 * Used to generate Menus
 *
 * @package     app.View.Element.Body.AdminMenu
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  if(!isset($this->Menu)) { // Fix stupid behavior for missing components, etc.
    return;                       // as it only loads default helpers on error
  }
  $id = isset($id) ? $id : null;
  $menu = $this->Menu->get($id);

  if(isset($menu) && !empty($menu)):
    $options = isset($options) ? array_merge($this->Menu->getDefaultOptions(),$options)
      : $this->Menu->getDefaultOptions();
    $div = $options['div'];
?>
<?php if($div):?>
    <div class='menu_wrapper <?php echo $options['class'] ?>'>
<?php echo "\n"; endif; ?>
    <ul class='<?php echo $options['class'] ?> <?php echo $options['id'] ?>'>
<?php foreach ($menu as $name => $url) : ?>
      <li><?php echo $this->Menu->link($name,$menu); ?></li>
<?php endforeach;?>
    </ul>
<?php if($div):?>
    </div><?php echo "\n"; endif; ?>
<?php endif; ?>

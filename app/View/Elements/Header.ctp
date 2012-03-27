<?php
/**
 * Header Element
 *
 * @package     app.View.Element.Header
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
    <div class="grid_7 alpha">
      <h1 class="logo">
        <a href="http://www.actionaid.org/india" alt="ActionAid"><span>ActionAid</span></a>
      </h1>
      <h2 style="width:170px;margin-top:0;line-height:1.1em;font-size:1em;">Working since 40 years with the poor in India</h2>
    </div>
    <div class="grid_5 omega">
<?php echo $this->element('Menu', array(
      'id' => 'main.public_default',
      'options' => array('class' => 'menu top right'))
    ); 
?>
    </div>

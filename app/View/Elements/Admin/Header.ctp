<?php
/**
 * Admin Header Element
 *
 * @package     app.View.Element.Admin.Header
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
    <div class="grid_2 alpha">
      <h1 class="logo small">
        <a href="/admin/home" alt="ActionAid"><span>ActionAid</span></a>
      </h1>
    </div>
    <div class="grid_10 omega">
<?php
    echo $this->element('Menu', array(
      'options' => array('class' => 'main menu'))
    );
?>
    </div>

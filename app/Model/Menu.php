<?php
/**
 * Menu Model
 * This Model is responsible for providing the navigation to the site
 * depending on what section the user is visiting & his/her role.
 *
 * @package     app.Model.Menu
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 */
class Menu extends AppModel{
  var $useTable = false; // content is not stored in DB

  /**
   * Get the navigation for a given section
   * @param $section name
   */
  function get($section = null) {
    //$Session = Common::getComponent('Session');
    if($section == null) $section = 'main.admin';
    $menu = &Configure::read('App.menu.'.$section);
    return $menu;
  }
}

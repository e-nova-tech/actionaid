<?php
/**
 * Menu Helper
 *
 * @package     app.View.Helper.MenuHelper 
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MenuHelper extends Apphelper {
  var $helpers = array('Html');
  var $model; //@see app.models.menu
  var $id; // current navigation id

  /**
   * Before render hook function
   * @see Helper::BeforeRender
   */
  function beforeRender(){
    if(!isset($this->model)){
      $this->model = Common::getModel('Menu'); // initialize model or get it back
    }
  }

  /**
   * Small helper function to know if a navigation item is currently selected
   * @param $item
   * @return string (selected, unselected) or boolean
   */
  function isSelected($itemName,$itemList,$returnOptions='class') {
    $result = false;

    $link = $itemList[$itemName]['pattern'];
    $currentLocation = substr($this->here, strlen($this->base));

    $result = ($link == $currentLocation || strpos($link, '#') === 0
      && preg_match(substr($link, 1), $currentLocation));

    switch($returnOptions){
      case 'class':
        return $result ? 'selected' : 'unselected';
      default:
        return $result;
    }
  }

  /**
   * Generate a link for the navigation list
   * @param $name link name
   * @param $itemList menu
   */
  function link($name,$itemList){
    return $this->Html->link($itemList[$name]['name'],$itemList[$name]['url'], 
      array('class' => $this->isSelected($name,$itemList)));
  }

  /**
   * Return the navigation for a given context (location, role, etc.)
   * @param $options
   * @return array
   */
  function get($section=null){
   return $this->model->get($section);
  }

  /**
   * Return the default options for the navigation element
   * @return array $options
   */
  function getDefaultOptions(){
    return array(
      'div'    => false,                 // extra div wrapper? class name it!
      'class'  => 'sub menu with_tabs', // extra class
      'id'     => ''                   // not the id of the menu, but the id of the div
    );
  }
}
//_EOF

<?php
/**
 * MyPaginator Helper 
 * Extends paginator helper to set default numbers options and 
 * also allow the user to choose a limit
 * 
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
 * @package       app.View.Helper.MyPaginatorHelper
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MyPaginatorHelper extends PaginatorHelper {
  var $limits = array('10','20','50','100');

  /**
   * Returns a set of numbers for the paged result set - Different Defaults
   * @see /cake/libs/view/helpers/PaginatorHelper#numbers($options = array())
   * @access public
   */
  function numbers($options = array()) {
    $defaults = array(
      'tag' => 'span', 'before' => null, 'after' => null,
      'modulus' => '8', 'separator' => '', 'first' => null, 'last' => null,
    );
    $options += $defaults;
    return parent::numbers($options);
  }
  
  /**
   * Returns a set of limits links for the paged result set
   * @return $options array (see paginator::link)
   * @access public
   */
  function limit($options = array()) {
    $out = '<span>'.__('Display',false).':</span>';
    foreach ($this->limits as $limit){
      $options['class'] =  $this->__currentLimit($options) == $limit ? 'current' : '';
      $url = $this->link($limit, array(), $options);
      if(preg_match('/limit:\d*/',$url)) {
        $out .= preg_replace('/limit:\d*/','limit:'.$limit,$url);
      } else {
        $out .= preg_replace('/\" class/',DS.'limit:'.$limit.'" class',$url);
      }
    }
    return $out;
  }

  /**
   * Getter: current limit of paginated set
   * @return int limit
   * @access public
   */
  function __currentLimit($options = array()){
    $paging = $this->params();
    return (isset($paging['limit'])) ? $paging['limit'] : 0;
  }
}
?>

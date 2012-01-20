<?php
/**
 * My HTML Helper
 * Overrides Cakephp default HTML helper behavior
 *
 * @package     app.Views.Helpers.MyHtmlHelper
 * @copyright     Copyright 2012, ActionAid India 
 * @link          http://actionaid.org/india
 * @package       app.View.Helper.MyPaginatorHelper
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class MyHtmlHelper extends HtmlHelper {

  /**
   * Html::link redefinition
   * Don't generate link if disabled in options
   * Allow wrapping the link in another html tag
   * @param $name
   * @param $url
   * @param $options
   */
  function link($title, $url = null, $options = array(), $confirmMessage = false) {
    $defaultOptions = array(
      'class' => '',
      'wrap' => false
    );
    $options = array_merge($defaultOptions, $options);
    if(isset($options['disabled']) && $options['disabled']) {
      $link = '<span class="link disabled '.$options['class'].'">'.$title.'</span>';
    } else {
      $link = parent::link($title,$url,$options,$confirmMessage);
    }
    if ($options['wrap']) {
      $link = $this->tag($options['wrap'],$link);
    }
    return $link;
  }
}//_EOF

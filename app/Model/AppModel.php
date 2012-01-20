<?php
/**
 * Application Model
 * 
 * @package     app.Model.AppModel
 * @copyright   Copyright 2012 ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppModel extends Model {
  var $actsAs = array('Containable');

  /**
   * Never fetch any recursive data from associated models
   * Use containable for any assocs
   * @var integer
   */
  public $recursive = -1;

}//_EOF

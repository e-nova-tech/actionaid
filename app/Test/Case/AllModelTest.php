<?php
/**
 * All Model Tests Suite
 *
 * @package     app.Test.Case.AllModelTest
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AllModelTest extends CakeTestSuite {
  public static function suite() {
    $suite = new CakeTestSuite('All model tests');
    $suite->addTestDirectory(TESTS . 'Case' . DS . 'Model');
    return $suite;
  }
}

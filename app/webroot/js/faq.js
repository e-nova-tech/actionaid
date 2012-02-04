/**
 * Jquery Awesomeness
 *
 * @package     app.webroot.js.script
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$(function() {
	$('.accordion h3').click(function() {
		$(this).next().toggle();
		return false;
	}).next().hide();
});

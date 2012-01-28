/**
 * Jquery Awesomeness for child sponsorhip appeal
 *
 * @package     app.webroot.js.sponsor-a-child
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$(function() {
  var factor = 6000; // cost per children
  $('select#NumberOfChildren').change(function() {
    var str = "";
    $("select#NumberOfChildren option:selected").each(function () {
      str = $(this).text();
    });
    if (str == 1) {
       $(".gift .inflect").text('child!');
    } else {
       $(".gift .inflect").text('children!');
    }
    $(".gift .amount").text(str*factor);
    $("#giftamount").attr('value',str*factor);
  });
});

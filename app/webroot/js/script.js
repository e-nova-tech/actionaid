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
  // Select "other" radio button when click on text input and vice versa
  $('.radiolist .other.text').click(function() {
    $('.radiolist .other.radio').attr('checked', 'checked');
  });
  $('.radiolist .other.radio').click(function() {
    $('.radiolist .other.text').focus();
  });

  // Form autocomplete
  var cache = {},lastXhr;
  $( ".city.autocomplete" ).autocomplete({
    minLength: 1,
    source: function( request, response ) {
      var term = request.term;
      if (term in cache) {
        response(cache[term]);
        return;
      }
      lastXhr = $.getJSON( "json/cities/index/"+term, request, function( data, status, xhr ) {
        cache[ term ] = data;
        if (xhr === lastXhr) {
          response(data);
        }
      });
    },
    focus: function( event, ui ) {
      $( ".city.autocomplete" ).val( ui.item.name );
      return false;
    },
    select: function( event, ui ) {
      return false;
    }
  }).data( "autocomplete" )._renderItem = function( ul, item ) {
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append( "<a>" + item.name + "</a>" )
      .appendTo( ul );
  };

  // Data Validation 
  jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^(\w)+$/i.test(value);
  }, "Letters and numbers only please");
  
  jQuery.validator.addMethod("alphaplus", function(value, element) {
    return this.optional(element) || /^((\w)+(\-|\s|\'){1})?(\w)+$/i.test(value);
  }, "Letters, numbers, spaces, dashes only please");
  
  jQuery.validator.addMethod("pattern", function(value, element, param) {
    param = new RegExp(param);
    return this.optional(element) || param.test(value);
  }, "Invalid format.");
  
  jQuery.validator.addMethod("dob", function() {
    var dob = $("#PersonDobDay").val() + "-" + $("#PersonDobMonth").val() + '-' + $("#PersonDobYear").val();
    return /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/.test(dob);
  }, "Please specify a valid date of birth.");
  
  jQuery.validator.addMethod("numeric", function() {
    return true;
  }, "Please specify a valid number.");
  
  jQuery.validator.addMethod("giftamount", function() {
    if($("#giftamount3").attr('checked') == 'checked') {
      return /^[0-9]{4,6}$/.test($("#giftamount4").val());
    }
    return true;
  }, "Please specify a valid amount");
    
  // client side validation of the donation form
  $.getJSON('json/gifts/validation/rules', function(rules) {  // 1) Get the rules
    $.getJSON('json/gifts/validation/messages', function(messages) { // 2) Get the messages
      $("#GiftAddForm").validate({   // 3) Call the validate function and set all the params
        onsubmit:function() {
          // disable donate button once pressed
          // TODO : make it work. Not working now. Probably onsubmit is not the right callback
          $('input.submit.donate').attr("disabled", true);
          $('input.submit.donate').addClass('disabled');
          $('form').submit();
        },
        groups : {
          dob : "data[Person][dob][day] data[Person][dob][month] data[Person][dob][year]",
          giftamount : "data[Gift][amount] data[Gift][other_amount]"
        },
        errorPlacement : function(error, element) {
          var afterElt = element;
          if(element.attr("id") == "PersonDobDay" || element.attr("id") == "PersonDobMonth" || element.attr("id") == "PersonDobYear") {
            afterElt = $("#PersonDobYear"); 
          }
          else if(element.attr("id") == "giftamount0" || element.attr("id") == "giftamount1" || element.attr("id") == "giftamount2" || element.attr("id") == "giftamount3" || element.attr("id") == "giftamount4") {
            afterElt = $("#giftamount4"); 
          }
          // delete error messages left by cakephp (in case validation was not in js last round)
          if(afterElt.next().hasClass('error-message')) 
            afterElt.next().remove();
          // insert error message
          error.insertAfter(afterElt);
        },
        errorElement : 'label',
        errorClass   : 'form-js-error',
        rules: rules,
        messages: messages
      });
    });
  });
});

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
    return this.optional(element) || param.test(value);
  }, "Invalid format.");
  
  jQuery.validator.addMethod("dob", function() {
    var dob = $("#PersonDobDay").val() + "-" + $("#PersonDobMonth").val() + '-' + $("#PersonDobYear").val();
    return /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/.test(dob);
  }, "Please specify a valid date of birth.");
  
  jQuery.validator.addMethod("giftamount", function() {
    if($("#giftamount3").attr('checked') == 'checked') {
      return /^[0-9]{4,6}$/.test($("#giftamount4").val());
    }
    return true;
  }, "Please specify a valid amount");
    
  // client side validation of the donation form
  var rules = $.getJSON('json/gifts/validation/rules', function() {
    //alert('rules');
  });
  var messages = $.getJSON('json/gifts/validation/messages', function() {
    //alert('messages');
  });

  $("#GiftAddForm").validate({
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
      if(element.attr("id") == "PersonDobDay" || element.attr("id") == "PersonDobMonth" || element.attr("id") == "PersonDobYear") {
        error.insertAfter($("#PersonDobYear"));
      }
      else if(element.attr("id") == "giftamount0" || element.attr("id") == "giftamount1" || element.attr("id") == "giftamount2" || element.attr("id") == "giftamount3" || element.attr("id") == "giftamount4") {
        error.insertAfter($("#giftamount4")); 
      }
      else {
        error.insertAfter(element);
      }
    },
    errorElement : 'label',
    errorClass   : 'form-js-error',
    rules: {
      "data[Gift][other_amount]" : {
        giftamount : true 
      },
      "data[Person][title]": {
        required : true
      },
      "data[Person][firstname]": {
        required : true,
        maxlength : 64,
        alphaplus : true
      },
      "data[Person][lastname]": {
        required : true,
        maxlength : 64,
        alphaplus : true
      },
      "data[Person][address1]": {
        required : true,
        maxlength : 128
      },
      "data[Person][address2]": {
        maxlength : 128
      },
      "data[Person][city]": {
        required : true,
        maxlength : 128,
        alphaplus : true
      },
      "data[Person][pincode]": {
        required : true,
        number : true,
        rangelength : [6, 6]
      },
      "data[Person][state]": {
        required : true,
        pattern : /^[A-Z]{2}[\-]{1}[A-Z]{2}$/
      },
      "data[Person][country]": {
        required : true,
        pattern : /^[A-Z]{2}$/
      },
      "data[Person][email]": {
        required : true,
        email : true
      },
      "data[Person][phone]": {
        required : true,
        pattern : /^[0-9\-\+]{8,16}$/
      },
      "data[Person][dob][day]": {
        required : true,
        dob : true
      },
      "data[Person][dob][month]": {
        required : true,
        dob : true
      },
      "data[Person][dob][year]": {
        required : true,
        dob : true
      },
      "data[Person][pan]": {
        required : true,
        rangelength : [10, 10],
        pattern : /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/
      }
    },
    messages: {
      "data[Person][title]": {
        required : 'Please select a title'
      },
      "data[Person][firstname]": {
        required : 'Please indicate your firstname',
        maxlength : 'Your firstname should not be longer than 64 characters',
        alphaplus : 'Your name should not contain special characters (ex: ! or ? or #)'
      },
      "data[Person][lastname]": {
        required : 'Please indicate your lastname',
        maxlength : 'Your lastname should not be longer than 64 characters',
        alphaplus : 'Your name should not contain special characters'
      },
      "data[Person][address1]": {
        required : 'Please provide an adress',
        maxlength : 'Your address first line should not be longer than 128 characters'
      },
      "data[Person][address2]": {
        maxlength : 'Your address second line should not be longer than 128 characters'
      },
      "data[Person][city]": {
        required : 'Please provide a city',
        maxlength : 'Your city name should not be longer than 64 characters',
        alphaplus : 'Your city name should not contain unecessary punctuation characters'
      },
      "data[Person][pincode]": {
        required : 'Please indicate your pincode',
        number : 'Your pincode should be composed of 6 digits',
        rangelength : 'Your pincode should be composed of 6 digits'
      },
      "data[Person][state]": {
        required : 'Please select a state',
        pattern : 'Please select a valid state pattern'
      },
      "data[Person][country]": {
        required : 'Please select a country',
        pattern : 'Please select a valid country'
      },
      "data[Person][email]": {
        required : 'Please provide your email address',
        email : 'Please provide a valid email address, ex: support@actionaid.org'
      },
      "data[Person][phone]": {
        required : 'Please indicate your phone number',
        pattern : 'Please provide a valid phone number'
      },
      "data[Person][dob][day]": {
        required : 'Please provide your birthdate',
        rangelength : 'Please provide your birthdate',
        number:'Please provide your birthdate'
      },
      "data[Person][dob][month]": {
        required : 'Please provide your birthdate',
        rangelength : 'Please provide your birthdate',
        number:'Please provide your birthdate'
      },
      "data[Person][dob][year]": {
        required : 'Please provide your birthdate',
        rangelength : 'Please provide your birthdate',
        number:'Please provide your birthdate'
      },
      "data[Person][pan]": {
        required : 'Please provide your PAN number',
        rangelength : 'Please provide a valid PAN number',
        pattern : 'Please provide a valid PAN number'
      }
    }
  });
});


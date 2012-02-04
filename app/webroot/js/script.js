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
  // function useful for debugging
  var printObj = function(obj) {
    var arr = [];
    $.each(obj, function(key, val) {
      var next = key + ": ";
      next += $.isPlainObject(val) ? printObj(val) : val;
      arr.push( next );
    });
    return "{ " +  arr.join(", ") + " }";
  };

  // Select "other" radio button when click on text input and vice versa
  $('.radiolist .other.text').click(function() {
    $('.radiolist .other.radio').attr('checked', 'checked');
  });
  $('.radiolist .other.radio').click(function() {
    $('.radiolist .other.text').focus();
  });

  // Form autocomplete
  if($( ".city.autocomplete" ).length){
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
        jQuery("select#PersonState option[value='"+ui.item.state+"']").attr("selected", "selected");
        return false;
      }
    }).data( "autocomplete" )._renderItem = function( ul, item ) {
      return $( "<li></li>" )
        .data( "item.autocomplete", item )
        .append( "<a>" + item.name + "</a>" )
        .appendTo( ul );
    };
  }

  // Data Validation
  jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^(\w)+$/i.test(value);
  }, "Letters and numbers only please");
  
  jQuery.validator.addMethod("alphaplus", function(value, element) {
    return this.optional(element) || /^(([a-zA-Z])+(\-|\s|\'){1}){0,}([a-zA-Z])+$/i.test(value);
  }, "Letters, numbers, spaces, dashes only please");
  
  //var reg = new RegExp("^[0-9\-\+]{8,16}$");
  //alert(reg.test('999950102d3'));
  
  jQuery.validator.addMethod("pattern", function(value, element, param) {
    var regexpStr = param.replace("\\\\", "\\");  // remove double backslash
    regexpStr = regexpStr.replace(/^\//, '').replace(/\/$/, ''); // remove delimiters
    var regexp = new RegExp(regexpStr);
    return this.optional(element) || regexp.test(value);
  }, "Invalid format.");
  
  jQuery.validator.addMethod("dateOfBirth", function() {
    var dob = $("#PersonDobDay").val() + "-" + $("#PersonDobMonth").val() + '-' + $("#PersonDobYear").val();
    return /^[0-9]{2}-[0-9]{2}-[0-9]{4}$/.test(dob);
  }, "Please specify a valid date of birth.");
  

  jQuery.validator.addMethod("giftamount", function() {
    if($("#giftamount3").attr('checked') == 'checked') {
      return /^[0-9]{4,6}$/.test($("#giftamount4").val());
    }
    return true;
  }, "Please specify a valid amount");
  
  // Add Below the rules and messages that CakePHP cannot return (compatibility problems)
  var hardCodedRules = {
    rules:{
      "data[Gift][other_amount]" : {
          giftamount : true
      }
    },
    messages:{
      "data[Gift][other_amount]" : {
          giftamount : "Please specify an amount"
      }
    }
  }

  // client side validation of the donation form
  $.getJSON('json/gifts/validation/rules', function(rules) {  // 1) Get the rules
    $.getJSON('json/gifts/validation/messages', function(messages) { // 2) Get the messages
      $("#GiftAddForm").validate({   // 3) Call the validate function and set all the params
        submitHandler:function(form) {
          // disable donate button once pressed
          $('input.submit.donate').attr("disabled", true);
          $('input.submit.donate').addClass('disabled');
          form.submit();
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
          if($('div:last', afterElt.parent()).hasClass('error-message')) 
            $('div:last', afterElt.parent()).remove();
          // insert error message
          error.insertAfter(afterElt);
        },
        errorElement : 'label',
        errorClass   : 'form-js-error',
        rules: $.extend(true, rules, hardCodedRules.rules),
        messages: $.extend(true, messages, hardCodedRules.messages)
      });
    });
  });
});

$(function() {
  /* DONATION FORM CANDIES */
  // select "other" radio button when click on text input and vice versa
  $('.radiolist .other.text').click(function(){
    $('.radiolist .other.radio').attr('checked', 'checked');
  });
  $('.radiolist .other.radio').click(function(){
    $('.radiolist .other.text').focus();
  });
  // disable donate button once pressed
  $('input.submit.donate').click(function(){
	  $('input.submit.donate').attr("disabled", true);
    $('input.submit.donate').addClass('disabled');
    $('form').submit();
  });
});


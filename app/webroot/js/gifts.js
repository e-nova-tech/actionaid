$(function() {
    $(".hasDatePicker").datepicker({"dateFormat" : "yy-mm-dd"});
    //$(".hasDatePicker" ).datepicker( "option", "dateFormat", "dd/mm/yyyy" );
    
    if($('.dates-radio input[checked=checked]').val() != 'custom'){
      $('.dates-input').hide();
    }
    $('.dates-radio input[type=radio]').change(function(){ 
      if($(this).val() == 'custom'){
        $('.dates-input').show();
      } 
      else{
        $('.dates-input').hide();
      }
    });
    
    $('#searchResetButton').click(function(){
      document.location.href='admin/gifts/index';
      return false;
    });
});
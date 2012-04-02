$(function(){
  $("a.see-response").click(function(){
    $(this).next().slideToggle("slow");
    return false;
  });
});

$(window).ready(function(){
  if ($(this).width() < 990) {
    $("#position3").addClass("order-3");
    $("#position2").addClass("order-2");
  }else{
  	$("#position3").removeClass("order-3");
    $("#position2").removeClass("order-2");
  }
});
$(window).on('resize', function() {
  if ($(this).width() < 990) {
    $("#position3").addClass("order-3");
    $("#position2").addClass("order-2");
  }else{
  	$("#position3").removeClass("order-3");
    $("#position2").removeClass("order-2");
  }
});
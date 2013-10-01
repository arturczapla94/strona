$(document).ready(function(){
  
   
   
   $('table caption').addClass('klasa01');
   $('.klasa01').css({'font-weight':'bold'});
   
   var f1 = function(){
      $(this).addClass('klasa02');
   };
   
   $('table td').mouseover(f1);
   $('table td').mouseleave(function(){
       $(this).removeClass('klasa02');
   });
});


$(document).ready(function(){
  
   $('table tr:odd td').css({'background':'tomato'});
   $('table tr:even td').css({'background':'lightgreen'});
   $('table tr:first td').css({'background':'cyan','font-weight':'bold'});
   $('table tr:last td').css({'background':'pink','font-weight':'bold'});
   
   $('table caption').addClass('klasa01');
   $('.klasa01').css({'font-weight':'bold'});
   
   $('table caption').removeClass('klasa01');
});


jQuery(document).ready(function() {
   $('fieldset input[type="text"], fieldset input[type="email"], fieldset textarea').bind('focus',function(){
       $(this).css({'border':'1px solid red','background':'white'});
   });
   
   $('fieldset input[type="text"], fieldset input[type="email"], fieldset textarea').bind('blur',function(){
       $(this).css({'border':'1px solid darkred','background':'lightgray'});
   });
  
   
});
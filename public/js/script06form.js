jQuery(document).ready(function() {
    $('fieldset input, fieldset textarea, fieldset select').bind('focus',function(){
        $(this).css({'border':'1px solid red','background':'white'});
    });

    $('fieldset input, fieldset textarea, fieldset select').bind('blur',function(){
        $(this).css({'border':'1px solid darkred','background':'lightgray'});
    });
  
  
    var znaki = function(){
         var pole = $(this);
         var znaki = pole.val().length;
         var max = 200;
         var pozostalo = max-znaki;
         if(pozostalo<0)
         {
            pole.val(pole.val().substring(0,200));
            $('#komentarz-pliczba').text(0);
            return false;
         }
         $('#komentarz-pliczba').text(pozostalo);
    };
  $('#komentarz').bind('input propertychange',znaki);

   
});
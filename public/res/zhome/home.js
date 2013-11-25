$(document).ready(function() {
    $('.pokaz-wiecej').data({ukryto: true});
    
    $('.pokaz-wiecej').click(function(){
        $(this).data();
        if($(this).data().ukryto)
        {
            $(this).parent().children(".pokaz-wiecej").text("mniej...");
            $(this).data().ukryto=false;
            $(this).parent().children(".tekst-wiecej").stop().slideDown(400);
        }
        else
        {
            $(this).parent().children(".pokaz-wiecej").text("więcej...");
            $(this).data().ukryto=true;
            $(this).parent().children(".tekst-wiecej").stop().slideUp(400);
        }
       
   }); 
});

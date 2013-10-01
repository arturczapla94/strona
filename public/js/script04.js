$(document).ready(function(){
  
   var czy = true; 
   $('table td').mouseover( function(){
      $(this).addClass('klasa02');
   });
   $('table td').mouseleave(function(){
       $(this).removeClass('klasa02');
   });
   
   $('#testowy').click(function(){
        if(czy){
            $('#testowy').html('<h2>tekst tekst tekst!!!</h2>');
            $('#testowy').css({'color':'green'});
            czy=false;
        }
        else
        {
            $('#testowy').html(html1);
            $('#testowy').css({'color':'red'});
            czy=true;
        }
   });
   
   $('#pokaz').click(function(){
       $('#cmenu').append(menu);
   });
   $('#pokaz2').click(function(){
       $('#cmenu').prepend('pokaz2');
   });
   $('#pokaz3').click(function(){
       $('#tekst').appendTo('#cmenu');
   });
   $('#pokaz4').click(function(){
       $('#tekst').prependTo('#cmenu');
   });
   
   $('#ukryj').click(function(){
       $('#cmenu *').remove();
   });
   var menu2=false;
   var cmenu2 = '<span>nanannanann menu menu</span>';
   $('.menu2 .toggle_menu').click(function(){
       if(menu2){
           $(this).parent().first().children('.cmenu').html('');
           $(this).text('Pokaż menu');
           menu2=false;
       } else {
           $(this).parent().first().children('.cmenu').html(cmenu2);
           $(this).text('ukryj menu');
           menu2=true;
       }
       
   });
   
   var menu = '<div>MENU</div>';
   
   var html1 = '<table class="tbl1">           <caption>Kursy walut</caption>        <tr><td></td><td>CHF</td><td>EUR</td><td>USD</td><td>GBP</td><td>JPY</td><td>RUB</td><td>CZK</td></tr>        <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>        <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>        <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>        <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>        <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>        <tr><td>------</td><td>9999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>2345</td></tr></table>';
   
});


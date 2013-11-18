/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function() {
    $('#test06').click(function(){
        $('img.logo').fadeToggle(900);
    });
    $('.pokaz').bind('click', function(){
        $('.pokaz').hide();
        $('.ukryj').show();
        $('.dlugi').slideDown(800);
    });
    $('.ukryj').bind('click', function(){
        $('.ukryj').hide();
        $('.pokaz').show();
        $('.dlugi').stop();
        $('.dlugi').slideUp(800);
        
        
    });
    
    $('#test02a').bind('click', function(){
        $('#test02').slideToggle(500);
    });
    
    $('#test03a').bind('click', function(){
        $('#test03').fadeToggle(500);
    });
    
    
    $('#test04a').bind('click', function(){
        $('#test04').slideDown(500);
    });
    $('#test04b').bind('click', function(){
        $('#test04').slideUp(500);
    });
    
});

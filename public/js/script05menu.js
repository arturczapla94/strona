jQuery(document).ready(function(){
    $('.js-news #news1').hide();
    $('.js-news #news2').hide();
    $('.js-news #news3').hide();
    
    $('.js-news #news1').show();
    
    $('.js-menu #pn1').click(function(){
        $('.js-news #news1').show();
        $('.js-news #news2').hide();
        $('.js-news #news3').hide();
    });
    
    $('.js-menu #pn2').click(function(){
        $('.js-news #news2').show();
        $('.js-news #news1').hide();
        $('.js-news #news3').hide();
    });
    
    $('.js-menu #pn3').click(function(){
        $('.js-news #news3').show();
        $('.js-news #news1').hide();
        $('.js-news #news2').hide();
    });
    
    // DRUGIE MENU
    $('.js-news2 #news11').hide();
    $('.js-news2 #news12').hide();
    $('.js-news2 #news13').hide();
    
    $('.js-news2 #news11').show();
    
    $('.js-menu2 #pn11').click(function(){
        $('.js-menu2 #pn11').css({'border-style':'none solid none none'});
        $('.js-menu2 #pn12').css({'border-style':'none solid solid none'});
        $('.js-menu2 #pn13').css({'border-style':'none none solid none'});
        $('.js-news2 #news11').show();
        $('.js-news2 #news12').hide();
        $('.js-news2 #news13').hide();
    });
    
    $('.js-menu2 #pn12').click(function(){
        $('.js-menu2 #pn12').css({'border-style':'none solid none none'});
        $('.js-menu2 #pn11').css({'border-style':'none solid solid none'});
        $('.js-menu2 #pn13').css({'border-style':'none none solid none'});
        $('.js-news2 #news12').show();
        $('.js-news2 #news11').hide();
        $('.js-news2 #news13').hide();
    });
    
    $('.js-menu2 #pn13').click(function(){
        $('.js-menu2 #pn13').css({'border-style':'none none none none'});
        $('.js-menu2 #pn11').css({'border-style':'none solid solid none'});
        $('.js-menu2 #pn12').css({'border-style':'none solid solid none'});
        $('.js-news2 #news13').show();
        $('.js-news2 #news11').hide();
        $('.js-news2 #news12').hide();
    });
});
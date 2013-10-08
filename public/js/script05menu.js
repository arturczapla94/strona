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
});
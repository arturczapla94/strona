$(document).ready(function(){
    var o1 = $(".news-block:nth-child(2)");
    
    var o2 = o1.find(".block-contents p");
    o1 = o1.find("figure");
    o1.hide();
    o1.show({duration : 2000,
        easing : 'easeOutBounce',
        complete : function(){
            o2.animate({'backgroundColor':'#9c9c9c'},1000);
        }
    });
    /*o1.effect("Bounce",{times:5}, 1000,function(){
        o2.animate({'backgroundColor':'#9c9c9c'},500);
    });*/
    
    o2.css({'backgroundColor':'#ffffff'});
    
});


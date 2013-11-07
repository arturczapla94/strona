jQuery(document).ready(function() {
    $('fieldset input, fieldset textarea, fieldset select').bind('focus',function(){
        $(this).addClass("active");
        $(this).removeClass("notactive");
    });

    $('fieldset input, fieldset textarea, fieldset select').bind('blur',function(){
        $(this).addClass("notactive");
        $(this).removeClass("active");
    });
    /*$('fieldset input, fieldset textarea, fieldset select').bind('focus',function(){
        $(this).css({'border':'1px solid red','background':'white'});
    });

    $('fieldset input, fieldset textarea, fieldset select').bind('blur',function(){
        $(this).css({'border':'1px solid darkred','background':'#F8F8F8'});
    });*/
  
  
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

    //=====================================================
    //MUZYKA 
    //------------------------------------------------------
  $('#calamuzyka').bind('on change',function(){
       if(this.checked)
        {
            $('#jakamuzyka01').prop('checked',true);
            $('#jakamuzyka02').prop('checked',true);
            $('#jakamuzyka03').prop('checked',true);
            $('#jakamuzyka04').prop('checked',true);
            $('#jakamuzyka05').prop('checked',true);
            $('#jakamuzyka06').prop('checked',true);
            $('#jakamuzyka06').trigger('onchange');
        }
       else
        {
            $('#jakamuzyka01').prop('checked',false);
            $('#jakamuzyka02').prop('checked',false);
            $('#jakamuzyka03').prop('checked',false);
            $('#jakamuzyka04').prop('checked',false);
            $('#jakamuzyka05').prop('checked',false);
            $('#jakamuzyka06').prop('checked',false);
            $('#jakamuzyka06').trigger('onchange');
        }
   });
   
   $('.cb-jakamuzyka').bind('on change',  function(){
        if($('#jakamuzyka01')[0].checked && $('#jakamuzyka02')[0].checked && $('#jakamuzyka03')[0].checked && $('#jakamuzyka04')[0].checked && $('#jakamuzyka05')[0].checked && $('#jakamuzyka06')[0].checked) 
        {
            $('#calamuzyka')[0].checked = true;
        }
        else if(!$('#jakamuzyka01')[0].checked || !$('#jakamuzyka02')[0].checked || !$('#jakamuzyka03')[0].checked || !$('#jakamuzyka04')[0].checked || !$('#jakamuzyka05')[0].checked || !$('#jakamuzyka06')[0].checked)
        {
            $('#calamuzyka')[0].checked = false;
        }
   });
   var innamuzyka="";
   $('#jakamuzyka06').bind('on change',  function(){
        if(this.checked){
            $('#innamuzyka').prop('disabled',false);
            if(innamuzyka.length>0)
                $('#innamuzyka').val(innamuzyka);
        } else {
            $('#innamuzyka').prop('disabled',true);
                innamuzyka=$('#innamuzyka').val();
            $('#innamuzyka').val("");
        }
   });
   
  
    //=====================================================
    //kopiowanie adresu
    //------------------------------------------------------
    $('#adres_zamieszkania').bind('on change',function(){
        if($('#adres_kopiuj')[0].checked)
        {
            $('#adres_zameldowania').val($('#adres_zamieszkania').val());
        }
    });
    
    $('#adres_kopiuj').bind('on change',function(){
        if(this.checked)
        {
            //kopiowanie = true;
            $('#adres_zameldowania').val($('#adres_zamieszkania').val());
            $('#adres_zameldowania').prop('disabled',true);
        }
        else
        {
            //kopiowanie = false;
            $('#adres_zameldowania').prop('disabled',false);
        }
    });
    

    //=====================================================
    //Walidacja
    //------------------------------------------------------
    jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });
    
    $("#form1").validate({
        onfocusout: function(e) {
            this.element(e);
        },
        rules:{
            email:{
                required: true,
                email: true
            },
            imie:"required",
            nazwisko:"required",
            plec:"required"
        },
        messages:{
            
            email:{
                required: "Podaj email!",
                email: "Podaj poprawny email!"
            },
            imie: "Podaj imie!",
            nazwisko:"Podaj nazwisko!",
            plec:"Zaznacz płeć!"

        }
    });
});
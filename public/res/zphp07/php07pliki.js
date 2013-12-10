$(document).ready(function() {
   
    var szybkosc = 800;
    
    $('#fwybor-wiersza input[type="radio"]').bind('change', function(e){
         var ajaxUrl2 = ajaxUrl.replace("{{id}}",$(this).prop("id"));
        $.ajax({ 
            type: 'GET', 
            url: ajaxUrl2, 
            /*data: { variable: 'value' }, */
            dataType: 'json',
            success: function(data) { 
                if($('#wiersz-wiersz').length<=0){
                    $('#fwybor-wiersza').first().after('<h2 id="wiersz-header"><span id="wiersz-title"></span> <i class="small" id="wiersz-autor"> </i></h2>\n<p id="wiersz-wiersz"></p>');
                    
                }
                var stary = $('#wiersz-wiersz').children(".span-wiersza");
                stary.slideUp(szybkosc, function(){ $(this).remove(); });
                
                var nowy = $('#wiersz-wiersz').prepend('<p class="span-wiersza" style="display:none;"></p>').children(".span-wiersza").first();
                nowy.html(data.wiersz.replace(/\n\n/g, "<br />"));
                nowy.slideDown(szybkosc);
                $('#wiersz-title').html(data.txt_wybrany.title);
                $('#wiersz-autor').html(data.txt_wybrany.autor);
            }   
        });
    });
    
    
    
});


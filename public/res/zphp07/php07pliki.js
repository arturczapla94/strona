$(document).ready(function() {
   
    
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
                $('#wiersz-wiersz').html(data.wiersz.replace(/\n\n/g, "<br />"));
                $('#wiersz-title').html(data.txt_wybrany.title);
                $('#wiersz-autor').html(data.txt_wybrany.autor);
            }   
        });
    });
    
    
    
});


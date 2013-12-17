$(document).ready(function(){
    $('#dr-block').draggable({containment: "parent"});
    
    $('#resizable-block').resizable({minHeight: 28,minWidth: 110,containment: "parent"});
    $('#selectable').selectable();
    $( "#sl-progressbar" ).progressbar({
      value: 0
    });
    
    $('#sortable').sortable({
        update: function( event, ui ) {

            var par=0;
            var dobrze=0;
            $('#sortable > li:nth-last-child(n+2)').each(function(){
                par=par+1;
                var obecny = $(this);
                var nastepny = $(this).next("li");
                if(obecny.text() < nastepny.text() )
                {
                    dobrze=dobrze+1;
                }
                
            });
            var procent = dobrze*100/par;
            $('#sl-postep').html(procent);
            $( "#sl-progressbar" ).progressbar({
                value: procent
              });
            if(dobrze >= par )
            {
                $('#sl-komunikat').show().html("DOBRZE!!!").css({'color':'green'});
            }
            else if($('#sl-komunikat').text().length>0)
            {
                 $('#sl-komunikat').html("ŹLE!!!").css({'color':'red'});
            }

        }
    });
    $( "#datepicker" ).datepicker();
});


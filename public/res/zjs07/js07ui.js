$(document).ready(function(){
    $('#dr-block').draggable();
    
    $('#resizable-block').resizable({minHeight: 28,minWidth: 110});
    $('#selectable').selectable();
    
    $('#sortable').sortable();
    $( "#datepicker" ).datepicker();
});


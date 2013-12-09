$(document).ready(function(){
    $('#dr-block').draggable({containment: "parent"});
    
    $('#resizable-block').resizable({minHeight: 28,minWidth: 110,containment: "parent"});
    $('#selectable').selectable();
    
    $('#sortable').sortable();
    $( "#datepicker" ).datepicker();
});


jQuery(document).ready(function() {
    var imie ="jan";
    var nazwisko = "kowalski";
    
   alert("Załadowano, nazywam się "+imie +" "+nazwisko); 
   $('body').css('color','red');
   $('p').css({'color':'blue', 'text-decoration':'underline'});
   $('h1').css('display','none');
   var rozmiar=$('h1').css('font-size');
   alert("Rozmiar h1:" + rozmiar);
   
});
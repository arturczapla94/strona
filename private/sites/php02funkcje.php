<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>Strona domowa</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
</head>
<body>
<div id="wrapper">
<?php
	include('private/html/header.php');
?>
	<div id="container2">
		<div id="container">
			<?php 
			 include('private/html/menu.php');
			?>
			<div id=contents>
<?php
    function napis()
    {
        echo "Copyright Artur Czapla 2013. Wszystkie prawa zastrzeżone.";
    }
    
    napis();
    
   
    echo"<h1>ćwiczenie 02</h1>";
    
    $n=12;
    echo "silnia z 5: ".silnia($n)."<br>";
    
    echo"<h1>ćwiczenie 03</h1>";
    
    $nr = rand (1,8);
    $dzisiaj=dzien_tygodnia($nr);
    echo "wylosowano: ".$nr." czyli: ".$dzisiaj."<br>";
    
    

?>
			</div>
		</div>
	</div>
	<?php 
	 include('private/html/footer.php');
	?>
	
</div>
</body>
</html>
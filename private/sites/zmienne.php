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

    echo "<p>";
    $imie = 'Jan';
    $nazwisko = "Kochanowski";
    echo $nazwisko;
    echo "<br>";
    echo $nazwisko.$imie;
    echo "<br>";
    echo "1. Nazywam się ". $imie . " " . $nazwisko . "<br >";
    echo "2. Nazywam się $imie ". $nazwisko . " <br>";
    echo "3. Nazywam się $imie $nazwisko <br>";
    echo '4. Nazywam się $imie $nazwisko <br>';
    echo '5. Nazywam się '."$imie $nazwisko".'<br>';
    
    echo "<br>";
    echo "6. Nazywam się {$imie} {$nazwisko} <br>";
    echo "</p>";
    echo "<br>";echo "<br>";echo "<br>";
    
    echo"<h1>ćwiczenie 02</h1>";
    $liczba1 = 23;
    $liczba2 = 3.45;
    $liczba3;
    
    $zm1="sdf";
    $zm2 = array("11", "22");
    $zm3 = new Config();
    
    echo gettype($liczba1)."<br>";
    echo gettype($liczba2)."<br>";
    echo gettype($liczba3)."<br>";
    echo gettype($zm1)."<br>";
    echo gettype($zm2)."<br>";
    echo gettype($zm3)."<br>";
    echo "<br>";
    
    
    echo"<h1>ćwiczenie 03</h1>";
    $txt = "30 ton";
    echo "napis: ".$txt."<br>";
    $wynik = 3*$txt;
    echo "Wynik mnożenia 3*{$txt} = ".$wynik."<br>";
    
    $a=10;
    $b = 5.5;
    $c = "jan";
    
    $suma=$a+$b+$c;
    echo "<br> suma: ".$suma."<br>";
    $wynik = "{$a}+{$b}+{$c}";
    echo $wynik."<br>";
    
    $a=10;
    $b = 5.5;
    $c = "piątek";
    
    $zmienna="talerz";
    $wynik = $zmienna*999;
    echo '<br> talerz*999 = '.$wynik."<br>";
    

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
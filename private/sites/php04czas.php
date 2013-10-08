<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>PHP 03 Tablice</title>
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
                            <h1>Data i czas</h1>
<?php
////////START////////START////////START////////START////////START////////START////////START////////START////////START///

$obrazki = array();
for($i=1;$i<=12;$i++)
{
    $obrazki[]="img".$i.".jpg";
}

shuffle($obrazki);

for($i=0;$i<5;$i++)
{
    echo '<img src="public/res/01/'.$obrazki[$i].'" style="float:left;" />';
}

echo "<h2>data</h2>";

echo date("d.m.Y")."<br><br><br>";

echo date("j").". ".miesiac(date("n")).date(" Y ")."r., godz.".date(" H:i")."<br>";
echo "Dzisiaj jest ".  dzien_tygodnia(date("N")).", jest to ".date("z").". dzień roku<br>";
echo "Do końca miesiąca mamy ".(date("t")-date("j")).", a do końca roku ".(date("L")?(366-date("z")):(365-date("z")) )." dni.<br>";
$teraz = DateTime();
$matura = new DateTime('2014-05-05');
echo "Do matury zostało ".($teraz->diff($matura)->s)." sekund, czyli ".((time()-$matura)/60)." minut.<br>";




////////KONIEC////////KONIEC////////KONIEC////////KONIEC////////KONIEC////////KONIEC////////KONIEC////////KONIEC////////
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
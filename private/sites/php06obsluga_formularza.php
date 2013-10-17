<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>PHP 06 Formularze</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
        <link rel="stylesheet" href="public/style/forms.css" type="text/css" />
        <script type="text/javascript" src="public/js/jquery-2.0.3.js"> </script>
        <script type="text/javascript" src="public/js/script06form.js"> </script>
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
////////START////////START////////START////////START////////START////////START////////START////////START////////START///
$imie = $_POST['imie'];
$imie2 = $_POST['imie2'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$plec = $_POST['plec'];
$szkola = $_POST['nazwa_szkoly'];
$wojewodztwo = $_POST['wojewodztwo'];
$sms = $_POST['ilesms'];
$ilesms;
switch ($sms)
{
    case 'p1': 
        $ilesms = " mniej niż 10";
        break;
    case 'p5': 
        $ilesms = " 10-50";
        break;
    case 'p10': 
        $ilesms = " 51-100";
        break;
    case 'p15': 
        $ilesms = " 101-15";
        break;
    case 'p20': 
        $ilesms = " 151-200";
        break;
    case 'p30': 
        $ilesms = " 201-300";
        break;
    case 'p50': 
        $ilesms = " 301-500";
        break;
    case 'w50': 
        $ilesms = " powyżej 500";
        break;
    case 'zlz': 
        $ilesms = " zależy, ile mam kasy";
        break;
}
$jakamuzyka = $_POST['jakamuzyka'];
$innamuzyka = $_POST['innamuzyka'];
$komentarz = $_POST['komentarz'];
$przegladarki = $_POST['przegladarki'];

echo "<h1>Dane osobowe</h1>\n";
echo "Imię: ".$imie."<br>\n";
echo "Drugie imię: ".$imie2."<br>\n";
echo "Nazwisko: ".$nazwisko."<br>\n";
echo "Płeć: ".$plec."<br>\n";
echo "Szkoła: ".$szkola."<br>\n";
echo "Województwo: ".$wojewodztwo."<br>\n";
echo "Miesięcznie wysyła ".$ilesms." SMS-ów<br>\n";
echo "Lubi muzykę: ";
foreach ($jakamuzyka as $value){
    if(count($value)>0)
    {
        if($value=="inna")
            echo "'".$innamuzyka."'";
        else
            echo "'{$value}' ";
    }
}
echo "<br>\n";
echo "Komentarz: ".$komentarz."<br>\n";
echo "Przeglądarki: ";
foreach ($przegladarki as $value){
    if(count($value)>0)
    {
        echo "'{$value}' ";
    }
}

echo "<br>\n";


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
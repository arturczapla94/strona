<!DOCTYPE html>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Prezentacja formularza" />
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
echo "<table>\n";
echo "<tr><th>Imię:</th><td>".$imie."</td></tr>\n";
echo "<tr><th>Drugie imię:</th><td>".$imie2."</td></tr>\n";
echo "<tr><th>Nazwisko:</th><td>".$nazwisko."</td></tr>\n";
echo "<tr><th>Płeć:</th><td>".$plec."<</td></tr>\n";
echo "<tr><th>Szkoła:</th><td>".$szkola."</td></tr>\n";
echo "<tr><th>Województwo:</th><td>".$wojewodztwo."</td></tr>\n";
echo "</table>";
echo "<br>";
echo "Miesięcznie wysyła <b>".$ilesms."</b> SMS-ów<br>\n";

if(count($jakamuzyka)<=0)
{
    echo "<b>Nie</b> lubi muzyki!<br>";
} else
{
    echo "Lubi muzykę typu: <span class=\"wyr\">";
    if($jakamuzyka[0]=="inna")
    {
        echo $innamuzyka;
    }
    else
    {
        echo $jakamuzyka[0];
    }
    for($i=1;$i<count($jakamuzyka);$i++)
    {
        echo "</span>";
        if($i+1==count($jakamuzyka))
            echo " i ";
        else
            echo ", ";
        
        echo "<span class=\"wyr\">".$jakamuzyka[$i];
    }
    echo "</span>";
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
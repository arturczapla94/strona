<!DOCTYPE html>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Prezentacja formularza" />
	<title>PHP 06 Formularze</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
        <link rel="stylesheet" href="public/style/php06obsluga_formularza.css" type="text/css" />
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
$imie = strip_tags($_POST['imie']);
$imie2 = strip_tags($_POST['imie2']);
$nazwisko = strip_tags($_POST['nazwisko']);
$email = strip_tags($_POST['email']);
$plec = strip_tags($_POST['plec']);
$szkola = strip_tags($_POST['nazwa_szkoly']);
$wojewodztwo = strip_tags($_POST['wojewodztwo']);
$sms = strip_tags($_POST['ilesms']);
$ilesms="";
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
$jakamuzyka = strip_tags($_POST['jakamuzyka']);
$innamuzyka = strip_tags($_POST['innamuzyka']);
$komentarz = nl2br(htmlspecialchars($_POST['komentarz']));
$przegladarki = strip_tags($_POST['przegladarki']);

$cbledy=0;
$wysw=0;
$dane="";
$bledy = array();

if(!empty($imie))
{
    $dane.="<tr><th>Imię:</th><td>".$imie."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano imienia!";
}

if(!empty($imie2))
{
    $dane.="<tr><th>Drugie imię:</th><td>".$imie2."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano drugiego imienia!";
}
if(!empty($nazwisko))
{
    $dane.="<tr><th>Nazwisko:</th><td>".$nazwisko."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano nazwiska!";
}


if(!empty($email))
{
    $dane.="<tr><th>E-mail:</th><td>".$email."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano e-emaila!";
}

if(!empty($plec))
{
    $dane.="<tr><th>Płeć:</th><td>".$plec."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano płci!";
}

if(!empty($szkola))
{
    $dane.="<tr><th>Szkoła:</th><td>".$szkola."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano szkoły!";
}

if(!empty($wojewodztwo))
{
    $dane.="<tr><th>Województwo:</th><td>".$wojewodztwo."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano województwa!";
}

if($wysw>0)
{
    echo "<h1>Dane osobowe</h1>\n";
    if($cbledy>0)
    {
        echo '<div class="err-block">'."\n";
        echo '<h2 class="err">Znaleziono '.$cbledy.' błąd/błędy/błędów</h2>'."\n";
        foreach($bledy as $blad)
        {
            echo '<p class="err">'.$blad.'</p>'."\n";
        }
        echo '</div>';
    }
    echo "<table>\n";
    echo $dane;
    echo "</table>\n";
    
}
else
{
    echo '<h2 class="err">Nie podano danych osobowych!</h2>'."\n";
}
echo "<br><br><br><br>\n\n";
echo "cbłedy "; var_dump($cbledy); echo "<br>";
echo "wysw "; var_dump($wysw); echo "<br>";
echo "błedy "; var_dump($bledy); echo "<br>";
echo "dane "; var_dump($dane); echo "<br>";
echo "<br><br><br><br>\n\n";

echo "<br>\n\n";

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

echo "<br>\n";echo "<br>\n";echo "<br>\n";echo "<br>\n";
ob_start();
print_r($_POST);

$output = ob_get_clean();
ob_end_flush();
$output = nl2br(htmlspecialchars($output));
$output = str_replace("  ","&nbsp;&nbsp;", $output);
echo $output;

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
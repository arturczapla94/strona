<?php
function checkRegon($str)
{
	if (strlen($str) != 9)
	{
		return false;
	}
 
	$arrSteps = array(8, 9, 2, 3, 4, 5, 6, 7);
	$intSum=0;
	for ($i = 0; $i < 8; $i++)
	{
		$intSum += $arrSteps[$i] * $str[$i];
	}
	$int = $intSum % 11;
	$intControlNr=($int == 10)?0:$int;
	if ($intControlNr == $str[8]) 
	{
		return true;
	}
	return false;
}
function checkPesel($pesel)
{
  if (strlen($pesel) != 11 || !is_numeric($pesel))
	 return 0;
  $steps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
  for ($x = 0; $x < 10; $x++) {
	$sum_nb += $steps[$x] * $pesel[$x];
  }
  $sum_m = 10 - $sum_nb % 10;
  if ($sum_m == 10)
	 $sum_c = 0;
  else
	 $sum_c = $sum_m;
  if ($sum_c == $pesel[10])
	 return 1;
  return 0;
} 


?><!DOCTYPE html>
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

$imie =      isset($_POST['imie']) ? trim(strip_tags($_POST['imie']))     : null;
$imie2 =     isset($_POST['imie']) ? rtrim(strip_tags($_POST['imie2']))   : null;
$nazwisko =  isset($_POST['imie']) ? trim(strip_tags($_POST['nazwisko'])) : null;
$nrdowodu =  isset($_POST['nrdowodu']) ? trim(strip_tags($_POST['nrdowodu'])): null;
$nrpesel =  isset($_POST['nrpesel']) ? trim(strip_tags($_POST['nrpesel'])): null;
$nrregon =  isset($_POST['nrregon']) ? trim(strip_tags($_POST['nrregon'])): null;
$email =     isset($_POST['imie']) ? strip_tags($_POST['email'])          : null;
$plec =      isset($_POST['imie']) ? strip_tags($_POST['plec'])           : null;
$szkola =    isset($_POST['imie']) ? strip_tags($_POST['nazwa_szkoly'])   : null;
$wojewodztwo=isset($_POST['imie']) ? strip_tags($_POST['wojewodztwo'])    : null;
$sms =       isset($_POST['imie']) ? strip_tags($_POST['ilesms'])         : null;
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
$uwagi = nl2br(htmlspecialchars($_POST['uwagi']));
    $szukaj = array(' sasza',' szosą',' pchła');
    $zamien = "...";
    $uwagicenzura = str_replace($szukaj,$zamien,$uwagi);
    $szukaj = array(' drepka',' drepki',' drepce',' drepkę',' drepką',' drepko',' cepka',' cepki',' cepce',' cepkę',' cepką',' cepko');
    $zamien = "????";
    $uwagicenzura = str_replace($szukaj,$zamien,$uwagicenzura);

$komentarz = nl2br(htmlspecialchars($_POST['komentarz']));
$przegladarki = strip_tags($_POST['przegladarki']);

$cbledy=0;
$wysw=0;
$dane="";
$bledy = array();

if(!empty($imie))
{
    $dane.="<tr><th>Imię:</th><td>".ucwords($imie)."<span class=\"liczba_znakow\">długość: ".strlen($imie)." ".odmiana(strlen($imie),"znak","znaki","znaków")."</span></td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano imienia!";
}

if(isset($imie2) && strlen(trim($imie2))>0)
{
    $dane.="<tr><th>Drugie imię:</th><td>".ucwords($imie2)."<span class=\"liczba_znakow\">długość: ".strlen($imie2)." ".odmiana(strlen($imie2),"znak","znaki","znaków")."</span></td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano drugiego imienia!";
}
if(!empty($nazwisko))
{
    $dane.="<tr><th>Nazwisko:</th><td>".ucwords($nazwisko)." <span class=\"liczba_znakow\">długość: ".strlen(trim($nazwisko))." ".odmiana(strlen($nazwisko),"znak","znaki","znaków")."</span></td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano nazwiska!";
}

if(!empty($nrdowodu))
{
    $dane.="<tr><th>Nr dowodu:</th><td>".  strtoupper(substr($nrdowodu,0,3)).substr($nrdowodu,3)."</td></tr>\n";
    $wysw++;
}
else
{
    $cbledy++;
    $bledy[]="Nie podano nr dowodu!";
}

if(!empty($nrpesel))
{
    $dane.="<tr><th>Nr dowodu:</th><td>".  $nrpesel."</td></tr>\n";
    $wysw++;
    if(!checkPesel($nrpesel))
    {
        $cbledy++;
        $bledy[]="Podano nie prawidłowy nr PESEL!";
    }
}


if(!empty($nrregon))
{
    $dane.="<tr><th>Nr REGON:</th><td>".  $nrregon."</td></tr>\n";
    $wysw++;
    
    if(!checkRegon($nrregon))
    {
        $cbledy++;
        $bledy[]="Podano nie prawidłowy nr REGON!";
    }
}


if(!empty($email))
{
    $dane.="<tr><th>E-mail:</th><td>".strtolower($email)."</td></tr>\n";
    $r=  explode("@", $email);
    $dane.="<tr><th>E-mail użytkownik:</th><td>".$r[0]."</td></tr>\n";
    $dane.="<tr><th>E-mail domena:</th><td>".$r[1]."</td></tr>\n";
    $wysw++;
    if((bool)filter_var($email, FILTER_VALIDATE_EMAIL) === false )
    {
        $cbledy++;
        $bledy[]="Podano nie prawidłowy adres e-mail!";
    }
}
else
{
    $cbledy++;
    $bledy[]="Nie podano e-maila!";
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
  
    $tmp = ucwords($szkola);
    $szukaj = array(' W ',' Im ',' Im. ');
    $zamien = array(' w ',' im. ',' im. ');
    $tmp = str_replace($szukaj,$zamien,$tmp);
    $dane.="<tr><th>Szkoła:</th><td>".$tmp."</td></tr>\n";
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
        echo '<h2 class="err">Znaleziono '.$cbledy.' '.odmiana($cbledy, "bląd", "błędy", "błędów").'</h2>'."\n";
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
if($debug)
{
    echo '<aside class="debug">';
    echo "\n\n";
    echo "cbłedy "; var_dump($cbledy); echo "<br>";
    echo "wysw "; var_dump($wysw); echo "<br>";
    echo "błedy "; var_dump($bledy); echo "<br>";
    echo "dane "; var_dump($dane); echo "<br>";
    echo "\n\n";
    echo "</aside>";
}

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
echo "Komentarz: ".$komentarz."<br><br><br><br><br>\n";
echo "Uwagi: <p>".substr($uwagicenzura, 0,700)."</p><br><br><br>\n";
echo "Przeglądarki: ";
foreach ($przegladarki as $value){
    if(count($value)>0)
    {
        echo "'{$value}' ";
    }
}

echo "<br>\n";echo "<br>\n";
if($debug)
{
    echo "<br>\n";echo "<br>\n";
    ob_start();
    print_r($_POST);

    $output = ob_get_clean();
    ob_end_flush();
    $output = nl2br(htmlspecialchars($output));
    $output = str_replace("  ","&nbsp;&nbsp;", $output);
    echo $output;
}

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
<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>PHP 05 Formularze</title>
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
                <h1>Ankieta Osobowa</h1>
                <form method="post" action="#">
                    <fieldset id="ankieta_osobowa1">
                        <legend>Dane osobowe</legend>
                        <label for="nazwisko">Nazwisko</label>
                        <input type="text" name="nazwisko" id="nazwisko"><br>
                        <label for="imie">Pierwsze imię</label>
                        <input type="text" name="imie" id="imie"><br>
                        <label for="imie2">Drugie imię</label>
                        <input type="text" name="imie2" id="imie2"><br>
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email"><br>

                        <input type="radio" name="plec" value="mezczyzna" id="mezczyzna" /><label for="mezczyzna" >Mężczyzna</label>
                        <input type="radio" name="plec" value="kobieta" id="kobieta" /><label for="kobieta" >Kobieta</label><br/>
                        <label for="nazwa_szkoly">Nazwa Szkoły: </label>
                        <input type="text" name="nazwa_szkoly" id="nazwa_szkoly"><br>

                        <label for="wojewodztwo">Województwo: </label>
                        <select name="wojewodztwo" id="wojewodztwo">
                            <option>dolnośląskie</option>
                            <option>kujawsko-pomorskie</option>
                            <option>lubelskie </option>
                            <option>lubuskie </option>
                            <option>łódzkie </option>
                            <option>małopolskie </option>
                            <option>mazowieckie </option>
                            <option>opolskie </option>
                            <option>podkarpackie </option>
                            <option>podlaskie </option>
                            <option>pomorskie </option>
                            <option>śląskie </option>
                            <option>świętokrzyskie </option>
                            <option>warmińsko-mazurskie </option>
                            <option>wielkopolskie </option>
                            <option>zachodniopomorskie </option>
                        </select>

                        

                    </fieldset>
                    <fieldset id="ankieta_osobowa2">
                        <legend>Pytania zasadnicze</legend>
                        <p>Ile miesięcznie wysyłasz SMS-ów?</p>
                        <input type="radio" name="ilesms" value="p1" id="ilesms01" /><label for="ilesms01" >poniżej 10</label>
                        <input type="radio" name="ilesms" value="p5" id="ilesms02" /><label for="ilesms02" >10-50</label>
                        <input type="radio" name="ilesms" value="p10" id="ilesms03" /><label for="ilesms03" >51-100</label>
                        <input type="radio" name="ilesms" value="p15" id="ilesms04" /><label for="ilesms04" >101-150</label>
                        <input type="radio" name="ilesms" value="p20" id="ilesms05" /><label for="ilesms05" >151-200</label>
                        <input type="radio" name="ilesms" value="p30" id="ilesms06" /><label for="ilesms06" >201-300</label>
                        <input type="radio" name="ilesms" value="p50" id="ilesms07" /><label for="ilesms07" >301-500</label>
                        <input type="radio" name="ilesms" value="w50" id="ilesms08" /><label for="ilesms08" >powyżej 500</label>
                        <input type="radio" name="ilesms" value="zlz" id="ilesms09" /><label for="ilesms09" >zależy, ile mam kasy</label>
                        
                        <p>Jaką lubisz muzykę(możesz zaznaczyć więcej możliwości)?</p>
                        <input type="checkbox" name="jakamuzyka" value="rock" id="jakamuzyka01" /><label for="jakamuzyka01">Rock </label>
                        <input type="checkbox" name="jakamuzyka" value="heavy metal" id="jakamuzyka02" /><label for="jakamuzyka02">Hevy Metal </label>
                        <input type="checkbox" name="jakamuzyka" value="pop" id="jakamuzyka03" /><label for="jakamuzyka03">Pop </label>
                        <input type="checkbox" name="jakamuzyka" value="techno" id="jakamuzyka04" /><label for="jakamuzyka04">Techno </label>
                        <input type="checkbox" name="jakamuzyka" value="muzyka powazna" id="jakamuzyka05" /><label for="jakamuzyka05">Muzyka poważna </label>
                        <input type="checkbox" name="jakamuzyka" value="inna" id="jakamuzyka06" /><label for="jakamuzyka06">Inna(podaj jaką): </label>
                        <input type="text" name="innamuzyka" value="" id="innamuzyka" />
                        
                        <p>
                    </fieldset>
                    <br>
                    <input type="submit" value="Wyślij">

                </form>
<?php
////////START////////START////////START////////START////////START////////START////////START////////START////////START///




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
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<title>PHP 05 Formularze</title>
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
                <h1>Ankieta Osobowa</h1>
                <form method="post" action="?str=php06obsluga_formularza">
                    <fieldset id="ankieta_osobowa1">
                        <legend>Dane osobowe</legend>
                        <div class="row"><label for="nazwisko">Nazwisko</label>
                        <input type="text" name="nazwisko" id="nazwisko"></div>
                        <div class="row"><label for="imie">Pierwsze imię</label>
                        <input type="text" name="imie" id="imie"></div>
                        <div class="row"><label for="imie2">Drugie imię</label>
                        <input type="text" name="imie2" id="imie2"></div>
                        <div class="row"><label for="email">E-mail</label>
                        <input type="email" name="email" id="email"></div>

                        <div class="row">
                            <label>Płeć:</label>
                            <input type="radio" name="plec" value="mezczyzna" id="mezczyzna" /><label for="mezczyzna" >Mężczyzna</label>
                            <input type="radio" name="plec" value="kobieta" id="kobieta" /><label for="kobieta" >Kobieta</label></div>
                        <div class="row"> <label for="nazwa_szkoly">Nazwa Szkoły: </label>
                            <input type="text" name="nazwa_szkoly" id="nazwa_szkoly">
                        </div>
                        
                        <div class="row"> <label for="adres_zamieszkania">Adres zamieszkania: </label>
                            <input type="text" name="adres_zamieszkania" id="adres_zamieszkania">
                        </div>
                        <div class="row">
                            <label for="adres_zameldowania">Adres zameldowania: </label>
                            <input type="text" name="adres_zameldowania" id="adres_zameldowania">
                            <input type="checkbox" name="adres_kopiuj" value="kopiuj" id="adres_kopiuj" />
                            <label for="adres_kopiuj">kopiuj</label>
                        </div>
                        
                        
                        <div class="row"><label for="wojewodztwo">Województwo: </label>
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
                        </div>

                        

                    </fieldset>
                    <fieldset id="ankieta_osobowa2">
                        <legend>Pytania zasadnicze</legend>
                        <p>Ile miesięcznie wysyłasz SMS-ów?</p>
                        <div class="row"><input type="radio" name="ilesms" value="p1" id="ilesms01" /><label for="ilesms01" >poniżej 10</label> 
                            <input type="radio" name="ilesms" value="p5" id="ilesms02" /><label for="ilesms02" >10-50</label>
                            <input type="radio" name="ilesms" value="p10" id="ilesms03" /><label for="ilesms03" >51-100</label> </div>
                        <div class="row"><input type="radio" name="ilesms" value="p15" id="ilesms04" /><label for="ilesms04" >101-150</label>
                            <input type="radio" name="ilesms" value="p20" id="ilesms05" /><label for="ilesms05" >151-200</label>
                            <input type="radio" name="ilesms" value="p30" id="ilesms06" /><label for="ilesms06" >201-300</label></div>
                        <div class="row"><input type="radio" name="ilesms" value="p50" id="ilesms07" /><label for="ilesms07" >301-500</label>
                            <input type="radio" name="ilesms" value="w50" id="ilesms08" /><label for="ilesms08" >powyżej 500</label>
                            <input type="radio" name="ilesms" value="zlz" id="ilesms09" /><label for="ilesms09" >zależy, ile mam kasy</label></div>
                        
                        <p>Jaką lubisz muzykę(możesz zaznaczyć więcej możliwości)?</p>
                        <div class="row"><input type="checkbox" name="calamuzyka" value="calamuzyka" id="calamuzyka" /> <label for="calamuzyka">(Zaznacz wszystko) </label></div>
                        <div class="row"><input class="cb-jakamuzyka"  type="checkbox" name="jakamuzyka[]" value="rock" id="jakamuzyka01" /><label for="jakamuzyka01">Rock </label>
                            <input type="checkbox" class="cb-jakamuzyka"  name="jakamuzyka[]" value="heavy metal" id="jakamuzyka02" /><label for="jakamuzyka02">Hevy Metal </label> </div>
                        <div class="row"><input class="cb-jakamuzyka"  type="checkbox" name="jakamuzyka[]" value="pop" id="jakamuzyka03" /><label for="jakamuzyka03">Pop </label> 
                            <input class="cb-jakamuzyka"  type="checkbox" name="jakamuzyka[]" value="techno" id="jakamuzyka04" /><label for="jakamuzyka04">Techno </label> </div>
                        <div class="row"><input class="cb-jakamuzyka"  type="checkbox" name="jakamuzyka[]" value="muzyka powazna" id="jakamuzyka05" /><label for="jakamuzyka05">Muzyka poważna </label> </div>
                        <div class="row"><input class="cb-jakamuzyka" type="checkbox" name="jakamuzyka[]" value="inna" id="jakamuzyka06" /><label for="jakamuzyka06">Inna(podaj jaką): </label>
                            <input type="text" name="innamuzyka" value="" id="innamuzyka" />
                        </div>
                        
                        <div class="row" id="div-komentarz">
                            <label for="komentarz" id="lbl-komentarz">Komentarz (max 200 znaków)</label>
                            <textarea name="komentarz" id="komentarz"></textarea>
                            <div id="komentarz-pozostalo">Pozostało <span id="komentarz-pliczba">200</span> znaków</div>
                        </div>
                       
                        <div class="row" id="div-przegladarki">
                            <label for="przegladarki" id="lbl-przegladarki">Jakie masz przeglądarki?</label>
                            <select name="przegladarki[]" id="przegladarki"  multiple="multiple">
                                <option>Opera &lt;= 12</option>
                                <option>Opera &gt;= 16</option>
                                <option>Firefox</option>
                                <option>Google Chrome</option>
                                <option>Safari</option>
                                <option>Internet Explorer</option>
                            </select>
                        </div>
                    </fieldset>
                    
                    
                    <br>
                    <input type="submit" value="Wyślij" /><input type="button" value="Wyczyść" />

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
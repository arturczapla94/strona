<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>Skrypty 03</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
        <link rel="stylesheet" href="public/style/test.css" type="text/css" />
        <script type="text/javascript" src="public/js/jquery-2.0.3.js"> </script>
        <script type="text/javascript" src="public/js/script04.js"> </script>
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
				<h1>JS 03 Elementy DOM!</h1>
                                <table class="tbl1">
                                    <caption>Kursy walut</caption>
                                    <tr><td></td><td>CHF</td><td>EUR</td><td>USD</td><td>GBP</td><td>JPY</td><td>RUB</td><td>CZK</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>------</td><td>9999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>2345</td></tr>
                                    
                                </table>
				<br/><br/>
                                <div id="tekst">jakiś tekst </div>
                                <div id="testowy">Testowy!!!</div><br/><br/><br/><br/><br/>
                                
                                <div id="divmenu">
                                    <div class="pmenu" id="pokaz">Pokaż menu</div>
                                    <div class="pmenu" id="pokaz2">Pokaż menu2 prepend</div>
                                    <div class="pmenu" id="pokaz3">Pokaż menu3</div>
                                    <div class="pmenu" id="pokaz4">Pokaż menu4</div>
                                    <div class="pmenu" id="ukryj">ukryj</div>
                                    <div id="cmenu"></div>
                                    
                                </div>
                                
                                
                                <br/><br/><br/><br/>;
                                <div class="menu2">
                                    <div class="toggle_menu pmenu">
                                        Pokaż menu
                                    </div>
                                    <div class="cmenu">
                                        
                                    </div>
                                </div>
			</div>
		</div>
	</div>
	<?php 
	 include('private/html/footer.php');
	?>
	
</div>
</body>
</html>
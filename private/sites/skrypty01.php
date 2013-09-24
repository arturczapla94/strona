<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>Skrypty</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
        <script type="text/javascript" src="public/js/jquery-2.0.3.js"> </script>
        <script type="text/javascript" src="public/js/script02.js"> </script>
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
				<h1>Witamy na naszej stronie!</h1>
                                <table>
                                    <tr><td></td><td>CHF</td><td>EUR</td><td>USD</td><td>GBP</td><td>JPY</td><td>RUB</td><td>CZK</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>abcde</td><td>123</td><td>2435</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td><td>2345</td></tr>
                                    <tr><td>------</td><td>9999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>999</td><td>2345</td></tr>
                                    
                                </table>
				<br/><br/><br/><br/><br/><br/><br/>
			</div>
		</div>
	</div>
	<?php 
	 include('private/html/footer.php');
	?>
	
</div>
</body>
</html>
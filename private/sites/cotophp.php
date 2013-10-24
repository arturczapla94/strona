<!DOCTYPE html
	PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
	'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>PHP</title>
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
				<h1>PHP!</h1>
				
                                <p>PHP, co jest skrótem od "PHP: Hypertext Preprocessor",
                                    jest powszechnie używanym językiem skryptowym ogólnego przeznaczenia,
                                    który jest szczególnie przystosowany
                                    do tworzenia aplikacji internetowych,
                                    także poprzez zagnieżdżenie wewnątrz języka HTML.
                                    Składnia, wywodząca się z języków C, Java i Perl,
                                    jest łatwa do nauczenia się.
                                    Głównym celem języka jest umożliwienie programistom szybkiego 
                                    tworzenia stron internetowych, ale PHP umożliwia znacznie więcej.</p><br/><br/>
			</div>
		</div>
	</div>
	<?php 
	 include('private/html/footer.php');
	?>
</div>
</body>
</html>

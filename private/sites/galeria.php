<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>Galeria</title>
	<link rel="stylesheet" href="public/style/style.css" type="text/css" />
	<link rel="stylesheet" href="public/style/galeria.css" type="text/css" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	
	<script type="text/javascript">
		$(function() { 
			
			$('.miniatury ul li:first-child a img').css('opacity',0.5);
			
			$(".miniatury a").click(function(){
				
				$('.miniatury a img').css('opacity',1);
				$(this).children().css('opacity',0.5);
				
				var sciezka = $(this).attr("href");
				var tytul = $(this).attr("title");
				
				$(".duzy").attr({ src: sciezka, alt: tytul });
				
				return false;
			});
			
		});
	</script>
 
 
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
	
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
				<div class="galeria">
					<img class="duzy" src="public/obrazki/1.jpg" alt="Duże zdjęcie Obrazek 1" />
				</div>
				
				<div class="miniatury">
					<ul>
						<li><a href="public/obrazki/1.jpg" title="Obrazek 1"><img src="public/obrazki/1-mini.jpg" alt="miniaturka Obrazek 1" /></a></li>
						<li><a href="public/obrazki/2.jpg" title="Obrazek 2"><img src="public/obrazki/2-mini.jpg" alt="miniaturka Obrazek 2" /></a></li>
						<li><a href="public/obrazki/3.jpg" title="Obrazek 3"><img src="public/obrazki/3-mini.jpg" alt="miniaturka Obrazek 3" /></a></li>
						<li><a href="public/obrazki/4.jpg" title="Obrazek 4"><img src="public/obrazki/4-mini.jpg" alt="miniaturka Obrazek 4" /></a></li>
					</ul>
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

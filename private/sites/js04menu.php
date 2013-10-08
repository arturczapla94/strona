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
        <script type="text/javascript" src="public/js/script05menu.js"> </script>
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
                        <?php /*//////////////////////*/ ?>        
                        <h1>JS 04 MENU</h1> 
                        <div id="news-block">
                            <ul class="js-menu" >
                                <li id="pn1">News 1</li>
                                <li id="pn2">News 2</li>
                                <li id="pn3">News 3</li>
                            </ul>

                            <div class="js-news">
                                <div id="news1">
                                    <h2>News 1</h2>
                                    <p>News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 </p>
                                </div>
                                <div id="news2">
                                    <h2>News 2</h2>
                                    <p>News 2 News 2 News 2 News 2 News 2 News 2 News 2 News 2 News 2 </p>
                                </div>
                                <div id="news3">
                                    <h2>News 3</h2>
                                    <p>News 3 News 3 News 3 News 3 News 3 News 3 News 3 News 3  </p>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div id="news-block2">
                            <ul class="js-menu2" >
                                <li id="pn11">News 1</li>
                                <li id="pn12">News 2</li>
                                <li id="pn13">News 3</li>
                            </ul>

                            <div class="js-news2">
                                <div id="news11">
                                    <h2>News 1</h2>
                                    <p>News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 News 1 </p>
                                </div>
                                <div id="news12">
                                    <h2>News 2</h2>
                                    <p>News 2 News 2 News 2 News 2 News 2 News 2 News 2 News 2 News 2 </p>
                                </div>
                                <div id="news13">
                                    <h2>News 3</h2>
                                    <p>News 3 News 3 News 3 News 3 News 3 News 3 News 3 News 3  </p>
                                </div>
                            </div>
                            
                        </div>
                        
                                
                         <?php /*//////////////////////*/ ?>          
			</div>
		</div>
	</div>
	<?php 
	 include('private/html/footer.php');
	?>
	
</div>
</body>
</html>
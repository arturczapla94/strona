<!DOCTYPE html lang="pl">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Strona testowa. Przykładowy opis strony" />
	<meta name="Keywords" content="Przykładowa, testowa,strona,przykładowe,słowa, kluczowe" />
	<title>PHP 03 Tablice</title>
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
                            <h1>TABLICEEE</h1>
<?php
    $imiona = array("Albert","Henri","Niels","Max","Hendrik");
    
    print_r($imiona);
    echo "<br><br>";
    var_dump($imiona);
    echo "<br><br>";
    echo "imiona[0] $imiona[0] <br>";
    echo "imiona[1] ($imiona[1]} <br>";
    echo "imiona[2] $imiona[2] <br>";
    
    
    
    echo "<table class=\"tbl1\"><tr><th>nr</th><th>imie</th></tr>\n";
    foreach($imiona as $key=>$imie)
    {
        echo "<tr><td>".($key+1)."</td><td>{$imie}</td></tr>\n";
    }
    echo "</table>\n";
    
    $nazwiska = array("Einstein","Becquerel","Bohr","Planck","Lorentz");
    
    echo "<table class=\"tbl1\"><tr><th>imie</th><th>nazwisko</th></tr>\n";
    foreach($imiona as $key=>$imie)
    {
        echo "<tr><td>".$imie."</td><td>{$nazwiska[$key]}</td></tr>\n";
    }
    echo "</table>\n";
    echo "<br><br>";
    
    $liczby=array();
    for($i=0;$i<200;$i++)
    {
        $liczby[]=rand(0,99);
    }
    
    
    echo "<table class=\"tbl1\"><tr><th colspan=\"20\">liczby pseudo losowe</th></tr>\n";
    for($i=0;$i<10;$i++)
    {
        echo "<tr>";
        for($j=0;$j<20;$j++)
        {
            echo "<td>".$liczby[$i*10+$j]."</td>";
        }
        echo "</tr>\n";
        
    }
    echo "</table>\n";
    echo "<br><br>";
    
    
    $stolice = array('Albania' => 'Tirana',
                    'Belgia'   => 'Bruksela',
                    'Chorwacja'=> 'Zagrzeb',
                    'Finlandia'=> 'Helsinki',
                    'Gruzja'   => 'Tbilisi');
    
    echo "<table class=\"tbl1\"><tr><th>Państwo</th><th>Stolica</th></tr>\n";
    foreach($stolice as $panstwo=>$stolica)
    {
        echo "<tr><td>{$panstwo}</td><td>{$stolica}</td></tr>\n";
    }
    echo "</table>\n";
    echo "<br><br>";
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
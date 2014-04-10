<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
use sys\authentication\User;

function wyswietl($parametry)
{
    $mysqli = new mysqli(\Config\Config::$dbhost, \Config\Config::$dbuser, \Config\Config::$dbpass, \Config\Config::$dbname);
    if ($mysqli->connect_errno)
    {
        $parametry['res'] = "error";
        $parametry['msg']= "Błąd połączenia MySQL [" . $mysqli->connect_errno . "]: " . $mysqli->connect_error;
    }
    else
    {
        $mysqli->query("SET NAMES 'utf8'");
        $t1 = "`".$mysqli->escape_string(\Config\Config::$dbprefix) ."cars`";
        $strona = 1;
        $ile = 50;
        if(!empty($_GET['p']) && is_numeric($_GET['p']))
            $strona = $_GET['p'];
        $od=($strona-1)*$ile;

        $query = "SELECT COUNT(*) FROM $t1;";
        $res = $mysqli->query($query);
        if($res === false)
        {
            $parametry['res'] = "error";
            $parametry['msg']= "Błąd zapytania";
        } 
        else 
        {
            $row = mysqli_fetch_row($res );
            $parametry['num_rows']= $row[0];
            $parametry['stron'] = ceil($row[0]/$ile);
        }

        $query = "SELECT * FROM $t1 LIMIT $od,$ile;";
        $res = $mysqli->query($query);
        if($res === false)
        {
            $parametry['res'] = "error";
            $parametry['msg']= "Błąd zapytania";
        } 
        else 
        {
            $parametry['res'] = "ok";
            while($column = mysqli_fetch_field($res))
            {
                $parametry['fields'][] = $column->name;
            }
            while ($row = mysqli_fetch_row($res )) {
                $parametry['rows'][]= $row;
            }
        }
    }
    return $parametry;
}

$parametry = array();


if(User::curUsr()!=null && User::curUsr()->isLogged() )
{
    $action = (empty($_GET['action']) ? "see" : $_GET['action']);
    
    if($action=="add")
    {
        if(User::curUsr()->hasPerm('strphp12.add'))
        {
            
        }
        else
        {
            $parametry['res'] = "error";
            $parametry['msg']= "Brak autoryzacji!";
        }
    }
    elseif($action=="addform")
    {
        if(User::curUsr()->hasPerm('strphp12.add'))
        {
            $parametry['res']="addform";
        }
        else
        {
            $parametry['res'] = "error";
            $parametry['msg']= "Brak autoryzacji!";
        }
        
    }
    elseif($action=="see" && User::curUsr()->hasPerm('strphp12.see'))
    {
        $parametry=wyswietl($parametry);
    }
    else
    {
        $parametry['res'] = "error";
        $parametry['msg']= "Brak autoryzacji!";
    }
} 
 else
{
    $parametry['res'] = "error";
    $parametry['msg']= "Brak autoryzacji!";
}


//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////

class CView extends inc\ViewBasic {
    function __construct($widok) {
        $this->dane = $widok;
        $this->customHeaders = '' //'<link rel="stylesheet" href="public/res/zhome/home.css" type="text/css" />'
            //. '<script type="text/javascript" src="public/res/zhome/home.js"> </script>'
. <<<EOT
<style>
    div.pages-links
    {
        margin: 16px 8px 4px 8px;
    }
    .pages-links .p-link
    {
        margin: 0 7px 0 0;         
    }
    table tr td, table tr td {
        text-align: center;
    }
</style>
EOT;
        
        $this->description = "Baza samochodów";
        $this->title = "Baza samochodów";
    }
    
    
    public function write()
    {
        ?>
    
        <article class=" block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
        
       
        <?php
        /*print_r($this->dane['fields']);
        print_r($this->dane['rows']);*/
        if(strcasecmp($this->dane['res'],'ok')===0)
        {
            echo "<table>";
            echo "<tr>";
            foreach ($this->dane['fields'] as $field)
            {
                echo "<th>$field</th>";
            }
            echo "</tr>";
            foreach ($this->dane['rows'] as $row)
            {
                echo "<tr>";
                foreach ($row as $field)
                {
                    echo "<td>$field</td>";
                }
                echo "</tr>\n";
            }
            echo "</table>\n\n";
            
            echo '<div class="pages-links">'."\n";
            for($i=1; $i<=$this->dane['stron'];$i++)
            {
                echo "<a class='p-link' href='index.php".gen_link_var("p","$i")."'> $i </a>";
            }
            echo "</div>\n\n";
        }
        elseif(strcasecmp($this->dane['res'],"addform")===0)
        {
            ?>
        <form action="<?php echo System::$system->site->gen_link(array('str'=>'php12baza','action'=>'add')); ?>" method="post" name="php12addform" id="php12addform">
            <fieldset>
                <label for="marka">Marka:</label><input type="text" name="marka" id="marka" /><br />
                <label for="model">Model:</label><input type="text" name="model" id="model" /><br />
                <label for="wersja">Wersja:</label><input type="text" name="wersja" id="wersja" /><br />
                <label for="pojemnosc">Pojemność:</label><input type="number" name="pojemnosc" id="pojemnosc" /><br />
                <label for="moc">Moc:</label><input type="number" name="moc" id="moc" /><br />
                <label for="nadwozie">Nadwozie:</label><input type="text" name="nadwozie" id="nadwozie" /><br />
                <label for="drzwi">Drzwi:</label><input type="number" name="drzwi" id="drzwi" /><br />
                <label for="silnik">Silnik:</label><input type="text" name="silnik" id="silnik" /><br />
                <label for="cena">Cena:</label><input type="number" name="marka" id="cena" /><br />
                <button type="submit" name="submit" value="sent" >Wyślij</button>
            </fieldset>
            
        </form>
            
            <?php
        }
        else
        {
            echo "<h1>".$this->dane['msg']."</h1>";
        }
        ?>

    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));

//$widok = new CView($parametry);
//$klasa = CUR_THEME;
//$szablon = new $klasa($widok);



?>
<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
$parametry = array();

function rysujos($image, $width, $height , $dane, $color)
{
    $xpion = floor($width/2);
    $ypoziom = floor($height/2);
    
    $margin = $dane['margin'];
    $grotdl = $dane['grotdl'];
    $grotszer = $dane['grotszer'];
    
    $ykreski = $dane['ykreski'];
    $xkreski = $dane['xkreski'];
    $szerkreski = $dane['szerkreski'];
    //pionowa
    imageline($image, $xpion, $margin, $xpion, $height-$margin, $color);
    //grot
    imageline($image, $xpion, $margin, $xpion-$grotszer, $margin+$grotdl, $color);
    imageline($image, $xpion, $margin, $xpion+$grotszer, $margin+$grotdl, $color);
    //kreski
    $wysRobocza = $ypoziom - $margin - $grotdl - 1;
    $ilosc = floor($wysRobocza / $ykreski);
    for($i=1;$i<=$ilosc;$i++)
    {
        imageline($image, $xpion-floor($szerkreski/2), $ypoziom-$i*$ykreski, $xpion+floor($szerkreski/2), $ypoziom-$i*$ykreski, $color);
        imageline($image, $xpion-floor($szerkreski/2), $ypoziom+$i*$ykreski, $xpion+floor($szerkreski/2), $ypoziom+$i*$ykreski, $color);
    }
    
    //pozioma
    imageline($image, $margin, $ypoziom, $width - $margin, $ypoziom, $color);
    //grot
    imageline($image, $width-$margin-$grotdl, $ypoziom-$grotszer, $width-$margin, $ypoziom, $color);
    imageline($image, $width-$margin-$grotdl, $ypoziom+$grotszer, $width-$margin, $ypoziom, $color);
    //kreski
    $szerRobocza = $xpion - $margin - $grotdl - 1;
    $ilosc = floor($szerRobocza / $xkreski);
    for($i=1;$i<=$ilosc;$i++)
    {
        imageline($image, $xpion-$i*$xkreski,$ypoziom-floor($szerkreski/2) ,$xpion-$i*$xkreski , $ypoziom+floor($szerkreski/2), $color);
        imageline($image, $xpion+$i*$xkreski,$ypoziom-floor($szerkreski/2) ,$xpion+$i*$xkreski , $ypoziom+floor($szerkreski/2), $color);
        
    }
}

if(isset($_GET['typ']) && $_GET['typ']=='image')
{
    $width = 600;
    $height = 520;
    
    $dane = array();
    $dane['grotdl'] = 20;
    $dane['grotszer'] = 10;
    
    $dane['ykreski'] = 10;
    $dane['xkreski'] = 10;
    $dane['szerkreski'] = 10;
    $dane['wartoscKreski'] = 1; //jaka liczba przypada na jedną kreskę skali
    $dane['margin'] = 10;
    
    $image = imagecreatetruecolor($width, $height);
    $bialy = imagecolorallocate($image,255,255,255);
    $braz  = imagecolorallocate($image,150, 75,  0);
    $czarny  = imagecolorallocate($image,0, 0,  0);
    
    imagefilledrectangle($image, 0, 0,$width-1 , $height-1, $bialy);
    
    
    rysujos($image, $width, $height, $dane , $braz);
    $xpion = floor($width/2);
    $ypoziom = floor($height/2);
    
    
    
    if(isset($_GET['obrazek']) && $_GET['obrazek']=='1')
    {
        
        for($xObr=$dane['margin'];$xObr<$width-$dane['margin'];$xObr++)
        {
            $xW = ($xObr - $xpion )*$dane['wartoscKreski'] / $dane['szerkreski'];
            
            $yW = $xW*$xW;
            
            $yObr = -$yW*$dane['szerkreski'] / $dane['wartoscKreski'] + $ypoziom;
            if(isset($oldY))
            {
                
                imageline($image,$xObr-1 ,$oldY ,$xObr , $yObr , $czarny);
            }
            
            $oldY=$yObr;
        }
//        for($x=-$xpion+$dane['margin'];$x<$xpion-$dane['margin'];$x++)
//        {
//            $y = $x*$x;
//            if(isset($oldY))
//            {
//                //TO DO: przerobić x na obrazkowe
//                imageline($image,$x-1 + $xpion ,-$oldY+$ypoziom ,$x+ $xpion , -$y+$ypoziom , $czarny);
//            }
//            $oldY=$y;
//        }
    }
        
        
    $parametry['image'] = $image;
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
                . '';
        
        $this->description = "Serwer";
        $this->title = "Serwer";
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
        
        <div class="news-in2">
            <div class="news-tags">

            </div> 
            <section class="news-content">
               
                <img src="<?php echo $_SERVER['SCRIPT_NAME'].gen_link_var("typ","image")."&obrazek=1"; ?>" alt="wykres"/>
                
            </section>
        </div>
    </div>
</article>
<?php
    }
}
if(isset($_GET['typ']) && $_GET['typ']=='image')
{
    header("Content-type: image/png");
    imagepng($parametry['image']);
    
}
else
{
    $widok = new CView($parametry);
    $klasa = CUR_THEME;
    $szablon = new $klasa($widok);
}




?>
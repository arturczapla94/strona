<?php

function silnia($i)
{
    $wynik = 1;
    for(;$i>1;$i--)
    {
        $wynik*=$i;
    }
    return $wynik;
    
}

function dzien_tygodnia ($nr)
{
    
    switch ($nr) {
        case 1:
            return "poniedziałek";
            break;
        case 2:
            return "wtorek";
            break;
        case 3:
            return "środa";
            break;
        case 4:
            return "czwartek";
            break;
        case 5:
            return "piątek";
            break;
        case 6:
            return "sobota";
            break;
        case 7:
            return "niedziela";
            break;

        default:
            return false;
            break;
    }
    
}

?>

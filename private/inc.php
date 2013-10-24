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


function miesiac($nr)
{
    
    switch ($nr) {
        case 1:
            return "stycznia";
            break;
        case 2:
            return "lutego";
            break;
        case 3:
            return "marca";
            break;
        case 4:
            return "kwietnia";
            break;
        case 5:
            return "maja";
            break;
        case 6:
            return "czerwca";
            break;
        case 7:
            return "lipca";
            break;
        
        case 8:
            return "sierpnia";
            break;
        case 9:
            return "września";
            break;
        case 10:
            return "października";
            break;
        case 11:
            return "listopada";
            break;
        case 12:
            return "grudnia";
            break;

        default:
            return false;
            break;
    }
    
}



?>

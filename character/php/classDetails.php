<?php

/*Warrior*/

function savingThrowReflex($level)
{
    $reflex = 0;

    if($level >= 1 && $level <= 3)
    {
        $reflex = 1;
    }
    
    if($level >= 4 && $level <= 6)
    {
        $reflex = 2;
    }

    if($level >= 7 && $level <= 9)
    {
        $reflex = 3;
    }

    if($level >= 10)
    {
        $reflex = 4;
    }

    return $reflex;

}


function savingThrowFort($level)
{
    $fort = 0;

    if($level >= 1 && $level <= 2)
    {
        $fort = 1;
    }
    
    if($level >= 3 && $level <= 4)
    {
        $fort = 2;
    }
    
    if($level == 5)
    {
        $fort = 3;
    }

    if($level >= 6 && $level <= 7)
    {
        $fort = 4;
    }

    if($level >= 8 && $level <= 9)
    {
        $fort = 5;
    }

    if($level >= 10)
    {
        $fort = 6;
    }

    return $fort;

}


function savingThrowWill($level)
{
    $will = 0;

    if($level >= 3 && $level <= 5)
    {
        $will = 1;
    }
    
    if($level >= 6 && $level <= 8)
    {
        $will = 2;
    }

    if($level >= 9)
    {
        $will = 3;
    }

    return $will;

}

function criticalDie($level)
{
    $critical = "";

    if($level == 1)
    {
        $critical = "1d12/III";
    }

    if($level == 2)
    {
        $critical = "1d14/III";
    }

    if($level == 3)
    {
        $critical = "1d16/IV";
    }

    if($level == 4)
    {
        $critical = "1d20/IV";
    }

    if($level == 5)
    {
        $critical = "1d24/V";
    }

    if($level >= 6 && $level >= 7)
    {
        $critical = "1d30/V";
    }

    if($level >= 8)
    {
        $critical = "2d20/V";
    }

    return $critical;

}

function deedDie($level)
{
    $deedDie = "";

    switch($level)
    {
        case 1:
            $deedDie = "+d3";
        break;
        
        case 2:
            $deedDie = "+d4";
        break;
        
        case 3:
            $deedDie = "+d5";
        break;
        
        case 4:
            $deedDie = "+d6";
        break;
        
        case 5:
            $deedDie = "+d7";
        break;
        
        case 6:
            $deedDie = "+d8";
        break;
        
        case 7:
            $deedDie = "+d10+1";
        break;

        case 8:
            $deedDie = "+d10+2";
        break;
        
        case 9:
            $deedDie = "+d10+3";
        break;
        
        case 10:
            $deedDie = "+d10+4";
        break;

        default:
        $deedDie = "";
    }

    return $deedDie;
}


?>
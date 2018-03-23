<?php

function CalculerScore($quest, $rep, $type)
{
    if ($type == 'AD')
    {
        $rep-=4;

        if ($quest == 31 || $quest == 32
            || $quest == 33 || $quest == 35
            || $quest == 41 || $quest == 43
            || $quest == 44 || $quest == 47
            || $quest == 52 || $quest == 53
            || $quest == 56 || $quest == 61
            || $quest == 63 || $quest ==65
            || $quest == 67)
            $rep=-$rep;
    }
    elseif ($type == 'SUS')
    {
        for ($ind = 22; $ind < 31; $ind+=2)
            if($quest == $ind)
                $rep = 5 - $rep;
        for ($ind = 21; $ind < 30; $ind+=2)
            if($quest == $ind)
                $rep--;
    }

    return $rep;
}

?>
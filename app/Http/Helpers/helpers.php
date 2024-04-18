<?php


namespace App\Http\Helper;


function randomNumber(){
    $randomNumber = mt_rand(100000, 999999);
    $formattedNumber = str_pad($randomNumber, 6, '0', STR_PAD_LEFT);
   return $formattedNumber;
}

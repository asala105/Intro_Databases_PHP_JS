<?php
//Q1 
function Factorial($number){
    $product = 1;
    for ($i=$number; $i>=1; $i--){
        $product = $product * $i;
    }
    return $product;
}

echo Factorial(4)."\n";
?>
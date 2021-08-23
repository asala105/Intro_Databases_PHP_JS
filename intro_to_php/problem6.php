<?php
//Q6
/*

*/
function binToDec($number){
    $decimal_value = 0;
    $n = 0;
    $temp_number = $number;
    while($temp_number != 0){
        $digit = $temp_number%10;
        $decimal_value = $decimal_value + $digit*pow(2,$n);
        $temp_number = $temp_number/10;
        $n = $n + 1;
    }
    return $decimal_value;
}

echo binToDec(10101);
echo "\n";

?>
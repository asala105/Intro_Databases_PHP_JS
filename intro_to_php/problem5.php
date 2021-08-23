<?php
//Q5
$odds = array();
$evens = array();
foreach ($arr as $key => $val){
    if ($val % 2 == 0){
        array_push($evens, $val);
    }
    else{
        array_push($odds, $val);
    }
}
print_r($odds);
print_r($evens);

?>
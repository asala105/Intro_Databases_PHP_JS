<?php
//Q4
function reverse($arr){
    $n = count($arr);
    for($i = 0; $i < $n/2; $i++){
        $temp = $arr[$n - $i-1];
        $arr[$n - $i- 1] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

$arr = reverse($arr);
print_r($arr);
?>
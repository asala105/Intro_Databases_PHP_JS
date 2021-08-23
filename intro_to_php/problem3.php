<?php
//Q3
$arr = [2, 3, 1, 7];
$n = count($arr);
$min_element = $arr[0];
$max_element = $arr[0]; 
for($i=1; $i<$n; $i++){
    if($min_element>$arr[$i]){
        $min_element = $arr[$i];
    }
    if($max_element<$arr[$i]){
        $max_element = $arr[$i];
    }
}
echo "min is $min_element\nmax is $max_element";
?>

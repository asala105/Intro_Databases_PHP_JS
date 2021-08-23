<?php
//Q7
/*
To solve this question I initialize the max element
to be equal to the first element of the array
and assign the index to be that of the first element
then with a loop on the elements of the array I find the index of the max element
*/
$arr = array(20,13,18,'a' => 90,12);
$max_idx = array_key_first($arr);
$max = $arr[$max_idx];
foreach($arr as $key => $val){
    if ($val > $max){
        $max = $val;
        $max_idx = $key;
    }
}
echo "$max_idx\n";
?>
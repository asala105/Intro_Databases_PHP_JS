<?php
//Q10
$array1 = array(20,1,13,18,90,12);
$array2 = array(20,1,8,90,8,2);
/* 
the way I thought of to solve this question 
is simply by merging the two arrays together
sort the new array and then eliminate duplicates
*/
function arrayUnion($array1,$array2){
    $array3 = array_merge($array1,$array2);
    sort($array3);
    $array_union = array();
    $n = count($array3)-1;
    for ($i=0;$i<$n;$i++){
        if ($array3[$i] != $array3[$i+1]){
            $val = $array3[$i];
            array_push($array_union,$val);
        }
    }
    array_push($array_union,$array3[count($array3)-1]);
    return $array_union;
}
arrayUnion($array1,$array2);
?>
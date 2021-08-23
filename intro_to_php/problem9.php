<?php
//Q9
$arr1 = ['a' => 1,'b' => 5,'c' => 6,'d' => 9,'e' => 2];
$arr2 = [1,5,6,9,2];
/*
In my solution I tried to take into consideration whether 
the array is an associative array or numeric array.
therefore I added an argument to my function that states 
whether the user wants me to treat the array as associative or not
by default the function treats the array as numeric
*/
function arrayDeleteElement($array,$index, $associative = false){
    $new_array = array();
    foreach ($array as $key => $val){
        echo $key;
        if ($key != $index){
// if the array is associative i add every with its original key
            if ($associative){
                $new_array[$key] = $val;
            }
//else i just push the element to end of the array
            else{
                array_push($new_array,$val);
            }
        print_r($array);
        }
    }
    return $new_array;
}
$arr1 = arrayDeleteElement($arr1,'c',true);
$arr2 = arrayDeleteElement($arr2,4);
print_r($arr1);
print_r($arr2);
?>
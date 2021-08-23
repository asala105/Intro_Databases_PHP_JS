<?php
//Q8
$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";
$list = $list1 . "," . $list2;
$list = array_unique(explode(',',$list));
print_r($list);
$result_array = array_values($list);
print_r($result_array);
$result = $result_array[0];

for($i=1;$i<count($result_array);$i++){
    $result = $result . "," . $result_array[$i];
}
echo $result;
?>
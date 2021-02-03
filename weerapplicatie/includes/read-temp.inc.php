<?php

$array = [];
$myfile = fopen("./testing/temperatures.txt", "r") or die("Error");
if($myfile){
    while(($line = fgets($myfile)) !== false){
        //echo $line;
        //echo "<br>";
        //hier exploden
        // voeg exploded array toe aan normale array

        $lilarray = explode("*", $line);
        array_push($array, $lilarray);
        
    }
    fclose($myfile);
}

function get_highest($arrey){
    $highest = $arrey[0][1];
    foreach ($arrey as $cur){
        if($m[1] >= $highest){
            $highest = $cur;
        }
    }
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

array_sort_by_column($array, 1);

/*
foreach ($array as $current){
    print_r($current);
    print("<br>");
}
*/
$final_array = [];

for($i = 0; $i <= 9; $i++){
    array_push($final_array, $array[$i]);
}
/*
echo "<br>";
foreach ($final_array as $current){
    print($current[0] . " " . $current[1]);
    print("<br>");
}*/

$file = fopen("./data/temperatures.txt", "w");
foreach ($final_array as $ths){
    $paste = $ths[0] . "*" . $ths[1];
    fwrite($file, $paste);
}
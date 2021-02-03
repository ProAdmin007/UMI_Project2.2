<?php

$array = [];
$myfile = fopen("./testing/cities.txt", "r") or die("Error");
if($myfile){
    while(($line = fgets($myfile)) !== false){

        $second = $line[0] . "*" . $line;
        array_push($array, $second);
        
    }
    fclose($myfile);
}

sort($array);

foreach($array as $current){
    echo $current . "<br>";
}

$file = fopen("./data/cities.txt", "w");
foreach ($array as $ths){
    fwrite($file, $ths);
}
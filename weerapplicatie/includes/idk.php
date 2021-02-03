<?php

$array = [];
$myfile = fopen("../testing/cities.txt", "r") or die("Error");
if($myfile){
    while(($line = fgets($myfile)) !== false){

        $second = $line;
        array_push($array, $second);
        
    }
    fclose($myfile);
}
sort($array);
//print_r($array);

function give_array($input){
    return($input);
}

$file = fopen("../data/cities.txt", "w");
foreach ($array as $ths){
    fwrite($file, $ths);
}

function split_cities($array, $letters){
    $toreturn = [];
    //$current_letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
    foreach($array as $current){
        if(in_array(strtoupper($current[0]), $letters)){
            array_push($toreturn, $current);
        }
        else{
            break;
        }
    }
    return $toreturn;
}

$yeet = split_cities($array, ['A']);
print_r($yeet);
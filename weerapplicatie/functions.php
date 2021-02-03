<?php

function read_file_in_array($path){
    $array = [];
    $myfile = fopen($path, "r") or die("Error");
    if($myfile){
        while(($line = fgets($myfile)) !== false){

            $second = $line;
            array_push($array, $second);
            
        }
        fclose($myfile);
    }
    return $array;
}


function split_cities($array, $letters){
    $toreturn = [];
    //$current_letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
    foreach($array as $current){
        if(in_array(strtoupper($current[0]), $letters)){
            array_push($toreturn, $current);
        }
        else{
            continue;
        }
    }
    return $toreturn;
}


function split_cities_single($array, $letter){
    $toreturn = [];
    //$current_letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
    foreach($array as $current){
        if(strtoupper($current[0]) == $letter){
            array_push($toreturn, $current);
        }
        else{
            continue;
        }
    }
    return $toreturn;
}

function split_stations_data($input){
    $return = explode("*", $input);
}
/*
$yehaw = read_file_in_array("./data/cities.txt");

$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');



print("<div id='top'></div>");
foreach($alphabet as $letter){
    $this_letter = split_cities_single($yehaw, $letter);
    if(count($this_letter) > 0){
        print("<a href='#" . $letter . "'>" . $letter . "</a>&nbsp;&nbsp;&nbsp;");
    }
}

foreach($alphabet as $letter){
    $this_letter = split_cities_single($yehaw, $letter);
    //print_r($this_letter);
    if(count($this_letter) > 0){
        print("<h4 id='" . $letter . "'>" . $letter . "</h4>");
        print("<p><a href='#top'>back to top</a></p>");
        foreach($this_letter as $current){
            print("<a href='#'>" . $current . "</a></br>");
        }
    }
    else{
        continue;
    }
}
*/
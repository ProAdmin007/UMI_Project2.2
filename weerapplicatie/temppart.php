<?php
function read_file_and_split_in_array($path){
    $array = [];
    $myfile = fopen($path, "r") or die("Error");
    if($myfile){
        while(($line = fgets($myfile)) !== false){

            $second = explode("*", $line);
            array_push($array, $second);
            
        }
        fclose($myfile);
    }
    return $array;
}

//$path = scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[0];
$number = 0;
$size = filesize("./datafromstations/" . scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[$number]);
for($i = 0; $i <= 19; $i++){
    if(!$size = filesize("./datafromstations/" . scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[$i]) < 100000){
        $number = $i;
        break;
        //echo scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[$i] . "<br>";
    }
}
$path = scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[$number];
//echo $path;
$array = read_file_and_split_in_array("./datafromstations/" . $path);

$file = fopen("./data/real-temp.txt", "w");
foreach ($array as $ths){
    fwrite($file, $ths[0] . "*" . $ths[3]."\n");
}

//function that hopefully does work now
function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

//makes an array with every station in asia with as first index the station number and as second index the location.
$q = array(); //multidem incl country
$r = array(); //only list of
$file = fopen("./data/WeatherstationsAsia.dat", "r");
if($file){
    while(($line = fgets($file)) !== false){
        $topush = str_replace('"', "", $line);
        $topush = explode(",", $topush,2);
        array_push($r, $topush[0]);
        array_push($q, $topush);
    }
    fclose($file);
}

/*foreach ($r as $y){
    print_r($y);
    echo "<br>";
}*/

//require 'functions.php';
//require 'make-temperature-file.php';

//makes a usable array from the temperature data
$f = file("./data/real-temp.txt");
$array = [];
foreach($f as $current){
    $var = explode("*", $current);
    $ar = [];
    foreach($var as $x){
        $vartwo = explode("$", $x);
        array_push($ar, $vartwo[1]);
    }
    array_push($array, $ar);
    //array_push($array, explode($current))
}
$goodone = array();
foreach($array as $joe){
    if(in_array($joe[0], $r)){
        foreach($q as $z){
            if($z[0] == $joe[0]){
                $joe[0] = trim($z[1]);
            }
        }
        if($joe[1][1] == "."){
            $joe[1] = "0" . $joe[1];
        }
        if($joe[1][0] == "-" && $joe[1][2] == "."){
            $joe[1] = str_replace("-", "-0", $joe[1]);
        }
        array_push($goodone, ($joe[0] . "*" . $joe[1]));
    }
}

$writefile = fopen("./data/templist.txt", "w");
foreach($goodone as $gg){
    fwrite($writefile, $gg);
}
fclose($writefile);

$final = array();
$finalfile = fopen("./data/templist.txt", "r") or die("error");
if($finalfile){
    while(($line = fgets($finalfile)) !== false){
        $lilarray = explode("*", $line);
        array_push($final, $lilarray);
    }
    fclose($finalfile);
}

$columns = array_column($final, 1);
array_multisort($columns, SORT_DESC, $final);


$final_array = [];

for($i = 0; $i <= 9; $i++){
    array_push($final_array, $final[$i]);
}


$file = fopen("./data/temperatures.txt", "w");
foreach ($final_array as $ths){
    $paste = $ths[0] . "*" . $ths[1];
    fwrite($file, $paste);
}

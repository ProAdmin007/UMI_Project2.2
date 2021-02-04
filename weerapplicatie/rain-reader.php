<?php

$q = array();
$r = array();
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

$path = scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[2];
//echo $path;
$file = fopen("./datafromstations/" . $path, "r") or die("Error");
$array = array();
if($file){
    while(($line = fgets($file)) !== false){
        $push = str_replace("STN$", "", explode("*", $line));
        if(in_array($push[0], $r)){
            foreach($q as $z){
                if($push[0] == $z[0]){
                    $push[0] =  trim($z[1]) . "%" . $push[0] . "%" . $path;
                }
            }
            if(str_replace("PRCP$", "", $push[9]) > 0.1){
                array_push($array, $push[0]);
            }
        }
    }
    fclose($file);
}

$writefile = fopen("./data/currently-raining.txt", "w");
foreach($array as $value){
    fwrite($writefile, $value . "\n");
}
fclose($writefile);

/*
foreach($array as $current){
    print_r($current);
    echo "<br>";
}*/
<?php
$files = scandir('data', SCANDIR_SORT_DESCENDING);
$newest_file = $files[0];


$file = fopen("./data/station_country_data.dat", "r");
$var = array();
while($x = fgets($file)){
    $print = str_replace('"', "", $x);
    print($print . "<br>");
}

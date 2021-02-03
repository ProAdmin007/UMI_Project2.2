<?php

$path = scandir('./datafromstations/', SCANDIR_SORT_DESCENDING)[0];
$abc = file("./datafromstations/" . $path);
$finalline = htmlentities($abc[count($abc)-1]);

$myfile = fopen("./datafromstations/" . $path, "a") or die("Error");

if(!strpos($finalline, "/WEATHERDATA")){
    fwrite($myfile, "</WEATHERDATA>");
}
fclose($myfile);

//$toscan = file_get_contents("./datafromstations/" . $path);
//$fullstring = (htmlentities($toscan));
/*
print($fullstring);
if(strpos($fullstring, "/WEATHERDATA") !== false){
    echo "top";
}
else{
    fwrite($myfile, "</WEATHERDATA>");
}

*/


$files = (scandir('./datafromstations', SCANDIR_SORT_DESCENDING));

$rained = [];
$xml_file = simplexml_load_file("./datafromstations/" . $files[0]) or die ("Error, something has gone horribly wrong.");

foreach($xml_file->children() as $station){
    echo "<b>" . $station->STN . "</b><br>";
    echo $station->DATE . "<br>";
    echo $station->TIME . "<br>";
    echo $station->TEMP . "<br>";
    echo $station->DEWP . "<br>";
    echo $station->STP . "<br>";
    echo $station->SLP . "<br>";
    echo $station->VISIB . "<br>";
    echo $station->WDSP . "<br>";
    echo "perrrr" . $station->PRCP . "<br>";
    echo $station->SNDP . "<br>";
    echo $station->FRSHTT . "<br>";
    echo $station->CLDC . "<br>";
    echo $station->WNDDIR . "<br><br>";
    if($station->PRCP > 0.1){
        array_push($rained, $station->STN);
    }
}

$station_with_country = array();
foreach($rained as $current){
    print($current . "<br>");
}
<?php
session_start();
$data = $_SESSION['data'];
$data = str_replace("<p>", "", $data);
$data = str_replace("</p>", "", $data);
$data = str_replace("/ 360 &deg;", "", $data);
$data = str_replace("&deg;", "degrees ", $data);
$data = str_replace("<br>", "", $data);
$file = "weather-station-data.txt";
$txt = fopen($file, "w") or die("Unable to open file!");
fwrite($txt, $data);
fclose($txt);

header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
header("Content-Type: text/plain");
readfile($file);
?>

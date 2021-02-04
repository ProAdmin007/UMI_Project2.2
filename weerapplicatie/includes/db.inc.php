<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "NietjouwPCvriend1!";
$dbName = "weather-user";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("connection failed". mysqli_connect_error());
}
<?php

include 'functions.php';

$array = read_file_and_split_in_array("Java_program_v4TueFeb02202447CET2021output.txt");
foreach($array as $current){
    foreach($current as $x){
        echo $x . "<br>";
    }
    echo "<br>";
}


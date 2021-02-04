<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

$row_one = ['A','B','C','D','E','F','G'];
$row_two = ['H','I','J','K','L','M','N'];
$row_three = ['O','P','Q','R','S','T','U'];
$row_four = ['V','W','X','Y','Z'];

require 'functions.php';
//require './includes/make-usable-data.inc.php';
//require './includes/read-temp.inc.php';
//require './includes/city-reader.inc.php';

?>

<html>
    <head>
        <meta name="description" content="description">
        <meta name="keywords" content="tags">
        <?php require 'head-part.php'; ?>
		<title>Overview - Weatherapp Hero Cycles</title>
	</head>

    <body class="regular">
        <div class="normal-page">
            <div class="top-row">
                <div class="top-row-i">
                    <?php require 'navbar.php'; ?>
                </div>
            </div>
            <div class="main-part">
                <!--<div class="overview-quick-link">
                    <a href="#rain">Currently raining</a>
                    <a href="#temppart">Highest temperatures</a>
                    <a href="#">link</a>
                </div>-->


                <div class="overview-top-temp-part" id="temppart">
                    <h3>HIGHEST TEMPERATURES</h3>
                    <div class="short-line"></div>
                    <?php   
                    require 'temppart.php';
                    //$f = file("./data/real-temp.txt");
                    //foreach($f as $current){
                    //    print_r($current);
                    //    echo "<br>";
                    //}


                    $array = [];
                    $myfile = fopen("./data/temperatures.txt", "r") or die("Error");
                    if($myfile){
                        while(($line = fgets($myfile)) !== false){
                            $lilarray = explode("*", $line);
                            array_push($array, $lilarray);
                        }
                        fclose($myfile);
                    }

                    foreach($array as $current){
                        print("<div class='top-temp'><p>" . $current[0] . ": " . $current[1] . " &deg; C</p></div>");
                    }
                    ?>
                </div>

                <div class="overview-raining-part" id="rain">
                    <h3 id="top">CURRENTLY RAINING</h3>
                    <div class="short-line-two"></div>
                    <p class="expl">A list of all weather stations where it is currently raining. Click on the name of the station to see more information.</p>
                    <div class="lshift">
                    <?php
                    require 'rain-reader.php';
                    foreach($alphabet as $letter){
                        $this_letter = split_cities_single(read_file_in_array("./data/currently-raining.txt"), $letter);
                        if(count($this_letter) > 0){
                            print("<a href='#" . $letter . "' class='aaaaa'>" . $letter . "</a>&nbsp;&nbsp;&nbsp;");
                        }
                    }
                    ?>
                    <br><br>
                    
                        <div class="list-row">
                            <div class="lr-in">
                                <?php
                                foreach($row_one as $letter){
                                    $this_letter = split_cities_single(read_file_in_array("./data/currently-raining.txt"), $letter);
                                    //print_r($this_letter);
                                    if(count($this_letter) > 0){
                                        print("<h4 id='" . $letter . "'>" . $letter . "</h4>");
                                        print("<p><a href='#top'>back to top</a></p>");
                                        foreach($this_letter as $current){
                                            $current = explode("%", $current);
                                            print("<a href='extra-data.php?station=" . $current[1] . "*" . $current[2] . "'>" . $current[0] . " <i>(station " . $current[1] . ")</i></a></br>");
                                        }
                                    }
                                    else{
                                        continue;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="list-row">
                            <div class="lr-in">
                                <?php
                                foreach($row_two as $letter){
                                    $this_letter = split_cities_single(read_file_in_array("./data/currently-raining.txt"), $letter);
                                    //print_r($this_letter);
                                    if(count($this_letter) > 0){
                                        print("<h4 id='" . $letter . "'>" . $letter . "</h4>");
                                        print("<p><a href='#top'>back to top</a></p>");
                                        foreach($this_letter as $current){
                                            $current = explode("%", $current);
                                            print("<a href='extra-data.php?station=" . $current[1] . "*" . $current[2] . "'>" . $current[0] . " <i>(station " . $current[1] . ")</i></a></br>");
                                        }
                                    }
                                    else{
                                        continue;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="list-row">
                            <div class="lr-in">
                                <?php
                                foreach($row_three as $letter){
                                    $this_letter = split_cities_single(read_file_in_array("./data/currently-raining.txt"), $letter);
                                    //print_r($this_letter);
                                    if(count($this_letter) > 0){
                                        print("<h4 id='" . $letter . "'>" . $letter . "</h4>");
                                        print("<p><a href='#top'>back to top</a></p>");
                                        foreach($this_letter as $current){
                                            $current = explode("%", $current);
                                            print("<a href='extra-data.php?station=" . $current[1] . "*" . $current[2] . "'>" . $current[0] . " <i>(station " . $current[1] . ")</i></a></br>");
                                        }
                                    }
                                    else{
                                        continue;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="list-row">
                            <div class="lr-in">
                                <?php
                                foreach($row_four as $letter){
                                    $this_letter = split_cities_single(read_file_in_array("./data/currently-raining.txt"), $letter);
                                    //print_r($this_letter);
                                    if(count($this_letter) > 0){
                                        print("<h4 id='" . $letter . "'>" . $letter . "</h4>");
                                        print("<p><a href='#top'>back to top</a></p>");
                                        foreach($this_letter as $current){
                                            $current = explode("%", $current);
                                            print("<a href='extra-data.php?station=" . $current[1] . "*" . $current[2] . "'>" . $current[0] . " <i>(station " . $current[1] . ")</i></a></br>");
                                        }
                                    }
                                    else{
                                        continue;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="overview-left">
                    <div class="overview-left-i">
                        <p class="ov-l-title">HIGHEST TEMPERATURE</p>
                    </div>
                </div>
                <div class="overview-right">
                    <div class="overview-right-i">
                        RIGHT
                        RIGHT
                        RIGHTLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi augue magna, dignissim vitae lorem a, gravida egestas nisi. Nulla et quam mauris. Phasellus hendrerit pretium lacus vitae fermentum. Nullam quis lectus non lectus congue dictum. Curabitur ut lacus in dolor porta convallis. Sed erat arcu, auctor a mi et, vulputate finibus leo. Vestibulum non rhoncus tellus, ac sodales sapien. Etiam arcu ex, tempor vel maximus sit amet, mollis non ante. Nunc non venenatis dolor. Vivamus et venenatis enim, id ullamcorper nisi. Sed in augue blandit, mollis ligula quis, pellentesque ligula. Vivamus viverra sem non faucibus feugiat. Nulla nibh ex, gravida in convallis a, eleifend sit amet mauris. Vestibulum sodales posuere nunc, a tempus mi euismod sit amet. 
                        RIGHT
                    </div>
                </div>-->
            </div>
        </div>
    </body>
</html>
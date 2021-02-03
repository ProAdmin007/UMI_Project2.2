<?php
session_start();
$graph = [[0,0], [1, 10], ];
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

$station = explode("*", $_GET['station'])[0];
$from = explode("*", $_GET['station'])[1];
$all_data = "";

$q = array();
$stations_list = fopen("./data/WeatherstationsAsia.dat", "r");
if($stations_list){
    while(($line = fgets($stations_list)) !== false){
        $topush = str_replace('"', "", $line);
        $topush = explode(",", $topush,2);
        array_push($q, $topush);
    }
    fclose($stations_list);
}
foreach($q as $c){
    if($station == $c[0]){
        $country = $c[1];
    }
}

$weather_data_file = fopen("./datafromstations/" . $from, "r");
if($weather_data_file){
    while(($line = fgets($weather_data_file)) !== false){
        $info_var = explode("*", $line);
        $st = explode("$", $info_var[0])[1];
        if($st == $station){
            $all_data = $line;
        }
    }
    fclose($weather_data_file);
}

?>

<html>
    <head>
        <meta name="description" content="description">
        <meta name="keywords" content="tags">
        <?php require 'head-part.php'; ?>
		<title>Data - Weatherapp Hero Cycles</title>
	</head>

    <body class="regular">
        <div class="normal-page">
            <div class="top-row">
                <div class="top-row-i">
                    <?php require 'navbar.php'; ?>
                </div>
            </div>
            <div class="download-page">
                <div class="download-page-in">
                    
                    <h3>Weather data from station <?php echo $station . " in " . $country;?></h3>
                    
                    <br>
                    <?php
                    //echo $all_data;
                    $data_array = explode("*", $all_data);
                    $what_data = ["Station", "Date", "Time", "Temperature", "Dew Point", "Air pressure (Station Level)", "Air pressure (Sea Level)", "Visibility in KM", "Windspeed", "Percipitation", "Snowpoint", "FRRRRR", "Cloudage", "Wind direction"];
                    $stn = explode("$", $data_array[0])[1];
                    $date = explode("$", $data_array[1])[1];
                    $time = explode("$", $data_array[2])[1];
                    $temp = explode("$", $data_array[3])[1];
                    $dewp = explode("$", $data_array[4])[1];
                    $stp = explode("$", $data_array[5])[1];
                    $slp = explode("$", $data_array[6])[1];
                    $visib = explode("$", $data_array[7])[1];
                    $wdsp = explode("$", $data_array[8])[1];
                    $prcp = explode("$", $data_array[9])[1];
                    $sndp = explode("$", $data_array[10])[1];

                    //ffff
                    $frshht = explode("$", $data_array[11])[1];
                    $freeze = $frshht[0];
                    $rained = $frshht[1];
                    $snowed = $frshht[2];
                    $hail = $frshht[3];
                    $thunder = $frshht[4];
                    $tornado = $frshht[5];
                    function print_bool($input){
                        if($input == 0){
                            return "False";
                        }
                        elseif($input == 1){
                            return "True";
                        }
                    }
                    //ffff end

                    $cldc = explode("$", $data_array[12])[1];
                    $wnddir = explode("$", $data_array[13])[1];
                    
                    $toprint = "
                    <p>Station: " . $station . " in " . $country . "</p>
                    <p>Date: " . $date . "</p>
                    <p>Time: " . $time . "</p>
                    <p>Temperature: " . $temp . " &deg;C</p>
                    <p>Dew Point: " . $dewp . " &deg;C</p>
                    <p>Air Pressure (Station Level): " . $stp . " mbar</p>
                    <p>Air Pressure (Sea Level): " . $slp . " mbar</p>
                    <p>Visibility: " . $visib . " Km</p>
                    <p>Windspeed: " . $wdsp . " Km/H</p>
                    <p>Percipitation: " . $prcp . " cm</p>
                    <p>Snowpoint: " . $sndp . " cm</p>
                    <p>Cloud Cover: " . $cldc . " cm</p>
                    <p>Wind Direction: " . $wnddir . "/ 360 &deg;</p>
                    <br>
                    <p>Has the temperature dropped below 0 &deg;C: " . print_bool($freeze) . "</p>
                    <p>Has there been rainfall:  " . print_bool($rained) . "</p>
                    <p>Has there been snowfall:  " . print_bool($snowed) . "</p>
                    <p>Has there been hail:  " . print_bool($hail) . "</p>
                    <p>Have there been any thunderstorms:  " . print_bool($thunder) . "</p>
                    <p>Have there been any tornadoes:  " . print_bool($tornado) . "</p><br>
                    ";
                    
                    $_SESSION['data'] = $toprint;
                    echo $_SESSION['data'];
                    ?>
                    
                    
                    <form action="download.php" method="POST">
                        <input type="hidden" name="hello" value="yeet">
                        <input type="submit" value="Download this data">
                    </form>
            </div>
        </div>
    </body>
</html>
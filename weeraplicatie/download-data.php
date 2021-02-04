<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>

<html>
    <head>
        <meta name="description" content="description">
        <meta name="keywords" content="tags">
        <?php require 'head-part.php'; ?>
		<title>Download Data - Weatherapp Hero Cycles</title>
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
                    <h3>DOWNLOAD DATA</h3>
                    <p>On this page you can download all weather data.</p>
                    <p><a href="https://www.youtube.com/watch?v=MnIps8Yc8CY">https://www.youtube.com/watch?v=MnIps8Yc8CY</a></p>
                    <p class="download-title">DOWNLOAD ALL CURRENT RAINFALL STATS</p>
                    <div class="download-line"></div>
                    <p>Download the weather data of the stations where it is currently raining. You will receive a graph with the rainfall of the past hour, complemented by all other statistics of that specific station. These are template template template template template and template.</p>
                    <div class="download-button">
                        <a href="#" download>DOWNLOAD</a>
                    </div>
                    <p class="download-title">DOWNLOAD TITLE</p>
                    <div class="download-line"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elementum, lorem sagittis scelerisque dictum, magna est suscipit sem, eget lacinia sapien sapien in diam. Mauris quis mollis augue. Pellentesque molestie ut dui sit amet lacinia. Cras eleifend est non gravida scelerisque. Etiam pretium, mauris id tristique porttitor, elit ex luctus justo, id placerat velit urna nec elit. Aliquam finibus ante nibh. Nulla facilisi. Phasellus hendrerit ipsum diam, vel iaculis ipsum facilisis at. Etiam dictum sem non ante tempus, id euismod lacus laoreet. Curabitur molestie odio massa, vulputate bibendum magna gravida eget. Morbi accumsan massa et lectus condimentum pellentesque.</p>
                    <div class="download-button">
                        <a href="#">DOWNLOAD</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
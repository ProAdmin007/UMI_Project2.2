<?php
session_start();
?>

<html>
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="description">
		<meta name="keywords" content="Weather app hero cycles">
		<meta name="author" content="Johan van Hengelaar">
		<link rel="stylesheet" href="style.css">
		<link rel="shortcut icon" href="./images/favicon.gif"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Red+Hat+Display&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
		<title>Sign In - Weatherapp Hero Cycles</title>
	</head>

    <body>
        <div class="loginpages">
            <div class="text-on-image">
                <div class="login-box">
                    <?php
                    if($_GET && $_GET['msg'] == "explanation"){
                        print(
                            '<div class="login-msg-box">
                            <div class="login-msg-box-i">
                            <p>Nullam quis lectus non lectus congue dictum. Curabitur ut lacus in dolor porta convallis. Sed erat arcu, auctor a mi et, vulputate finibus leo</p>
                            </div>
                        </div>'
                        );
                    }?>
                    
                    <div class="login-box-inside">
                        <h2>Sign in</h2>
                        <p>Sign in to this weather application with your <a href="index.php?msg=explanation">provided*</a> username and password.</p>
                        <form action="./includes/login.inc.php" method="POST">
                            <input type="text" name="usernamex" placeholder="Username" required value=""><br>
                            <input type="password" name="passwordx" placeholder="Password" required value=""><br>
                            <input type="submit" name="submit" value="Sign in"><br>
                        </form>
                    </div>
                </div>
            </div>
        <!--https://webdesignbestfirm.com/forecastfont/-->
        </div>
    </body>
</html>
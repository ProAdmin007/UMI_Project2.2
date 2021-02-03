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
		<title>Management - Weatherapp Hero Cycles</title>
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
                    <h3>MANAGEMENT</h3>
                    <p>This page shows an overview of all accounts that have access to this weather application. You can add accounts on this page aswell, as can you remove existing accounts.</p>
                    <p class="download-title">LIST OF ACTIVE ACCOUNTS</p>
                    <div class="download-line"></div>

                    <!-- HTMLENTITIES FILTER !!!!!-->
                    
                    <?php

                    require './includes/db.inc.php';
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = htmlentities($row['user_id']);
                            $username = htmlentities($row['username']);
                            $name = htmlentities($row['name']);
                            $email = htmlentities($row['email']);

                            print('
                            <div class="user-row">
                                <div class="ur-one"><p>' . $username . '</p></div>
                                <div class="ur-two"><p>' . $email . '</p></div>
                                <div class="ur-three"><p>' . $name . '</p></div>
                                <a href="./includes/delete-user.inc.php?id= ' . $id . '"><div class="ur-four"><p>DELETE</p></div></a>
                            </div>
                            ');
                        }
                    }

                    ?>
                    
                </div>
                <div class="download-page-in">
                    <p class="download-title">ADD NEW USER</p>
                    <div class="download-line"></div>
                    <p>
                        <form action="./includes/signup.inc.php" method="POST">
                            <input type="text" name="uid" placeholder="Username" required><br>
                            <input type="text" name="name" placeholder="Full name" required><br>
                            <input type="email" name="email" placeholder="Email" required><br>
                            <input type="password" name="password" placeholder="Password" required><br>
                            <input type="password" name="passwordrep" placeholder="Repeat password" required><br>
                            <input type="submit" name="su-btn" value="Add new user">
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
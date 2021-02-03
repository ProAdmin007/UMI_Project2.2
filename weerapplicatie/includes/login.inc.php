<?php
session_start();

if(isset($_POST['submit'])){

    require 'db.inc.php';
    $username = $_POST['usernamex'];
    $password = $_POST['passwordx'];

    //sql blablabla
    $_SESSION['user'] = $username;
    header("Location: ../home.php");
}
else{
    header("Location: ../index.php");
}
<?php
session_start();

if(isset($_POST['submit'])){

    require 'db.inc.php';
    $username = $_POST['usernamex'];
    $password = $_POST['passwordx'];

    if(empty($username) or empty($password)){
        header("Location: ../index.php?msg=a");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?msg=b");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header("Location: ../index.php?msg=c");
                    exit();
                }
                elseif($pwdCheck == true){
                    session_start();
                    $_SESSION['user'] = $username;
                    header("Location: ../home.php");
                    exit();
                }
                else{
                    header("Location: ../index.php?msg=d");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?msg=e");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php?msg=f");
    exit();
}
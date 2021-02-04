<?php
session_start();

if(isset($_POST['su-btn'])){
    if(!isset($_SESSION['user'])){
        header("Location: ../index.php?hello");
        exit();
    }
    else{

        require 'db.inc.php';

        $username = $_POST['uid'];
        $password = $_POST['password'];
        $passwordrep = $_POST['passwordrep'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        if(empty($username) or empty($password) or empty($passwordrep) or empty($email) or empty($name)){
            header("Location: ../users-list.php?msg=empty");
            exit();
        }
        elseif(strlen($password) < 8){
            header("Location: ../users-list.php?msg=tooshortpw");
            exit();
        }
        elseif($password !== $passwordrep){
            header("Location: ../users-list.php?wrongpasscheck");
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) or !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../users-list.php?msg=wrongmailusername");
            exit();
        }
        else{
            $sql = "SELECT username FROM users WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){ //controleer sql
                header("Location: ../users-list.php?msg=error2");
                exit();
            }
            else{ //sql werkt
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){//user bestaat al
                    header("Location: ../users-list.php?msg=exist");
                    exit();
                }
                else{
                    $sql = "INSERT INTO users (username, password, name, email) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){//sql check werkt niet
                        header("Location: ../users-list.php?msg=error1");
                        exit();
                    }
                    else{
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPwd, $name, $email);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../users-list.php?msg=success");
                        exit();
                    }
                }
            }

            mysqli_stmt_close($stmt);
	        mysqli_close($conn);
        }

    }
}
else{
    header("Location: ../index.php?bye");
    exit();
}
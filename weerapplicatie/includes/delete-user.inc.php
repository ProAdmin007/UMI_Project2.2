<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../index.php?hello");
    exit();
}
else{
    $id = trim($_GET['id']);
    if($id){

        require 'db.inc.php';
        $sql = "DELETE FROM users WHERE user_id=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../users-list.php?msg=y");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            header("Location: ../users-list.php?msg=woop");
            exit();
        }

    }
    else{
        header("Location: ../users-list.php?msg=x");
        exit();
    };

    

}
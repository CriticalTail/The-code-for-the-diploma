<?php
include_once("config.php");
session_start();
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $emailQuery = "SELECT * FROM `users` WHERE email = '$email'";
    $runEmailQuery = mysqli_query($conn, $emailQuery);

    if(!$runEmailQuery){
        echo "Query Failed";
    }else{
        if(mysqli_num_rows($runEmailQuery) > 0){
            $passwordQuery = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
            $runPasswordQuery = mysqli_query($conn, $passwordQuery);
            if(!$runPasswordQuery){
                echo "Query Failed";
            }else{
                if(mysqli_num_rows($runPasswordQuery) > 0){
                    $fetchData = mysqli_fetch_assoc($runPasswordQuery);
                    $_SESSION['id'] = $fetchData['id'];
                    $status = "Online";
                    $statusQuery = "UPDATE users SET status = '{$status}' WHERE id = '{$_SESSION["id"]}'";
                    $runStatusQuery = mysqli_query($conn, $statusQuery);
                    if(!$runStatusQuery){
                        echo "failed while updating status";
                    }else{
                        echo "success";
                    }
                }else{
                    echo "Password not matched";
                }
            }
        }else{
            echo "Invalid email address";
        }
    }
}
?>
<?php
include_once("config.php");
session_start();
$userData = "SELECT * FROM `users` WHERE id = '{$_SESSION["id"]}'";
$runUserData = mysqli_query($conn, $userData);
if(mysqli_num_rows($runUserData) > 0){
if(isset($_POST['changeData'])){   
    if(strlen($_POST["password"]) < 8 || strlen($_POST["confirmPassword"]) < 8){
        echo "В пароле должно быть больше восьми символов";
        }else if($_POST["password"] != $_POST['confirmPassword']){
            echo "Пароли не совпадают";
        }else{
            $password = md5($_POST["password"]);
            $insertQuery = "UPDATE users SET password = '{$password}' WHERE id = '{$_SESSION["id"]}'";
            $runInsertQuery = mysqli_query($conn, $insertQuery);
            if(!$runInsertQuery){
                echo "Ошибка при загрузке данных";
            }else{
                echo "Данные изменены успешно";
                header("../users.php");
                }
            }
        }
    }
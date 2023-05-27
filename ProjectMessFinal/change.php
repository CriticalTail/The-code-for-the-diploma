<?php
include_once("php/config.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/Login.css">
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/Signup.css">
</head>
<body>
    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
        <h2>Новый пароль</h2>
        <form action="php/changeFunc.php" method = "post" id="changeFunc">
            <input type="password" name="password" id="password" placeholder="Пароль" required><br>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Новый пароль" required><br><br>
            <input type="submit" name="changeData" id="changeData" value="Изменить данные">
            <p>Уже есть аккаунт? <a href="Login.php">Войти</a></p>
        </form>
    </div>
</body>
</html>
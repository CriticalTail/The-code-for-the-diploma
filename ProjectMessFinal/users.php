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
    <title>Пользователи</title>
    <link rel="stylesheet" href="css/Users.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
        <div id="header">
        <?php
        $headerQuery = "SELECT * FROM `users` WHERE id = '{$_SESSION["id"]}'";
        $runHeaderQuery = mysqli_query($conn, $headerQuery);
        if(!$runHeaderQuery){
            echo "connection failed";
        }else{
            $info = mysqli_fetch_assoc($runHeaderQuery);
        ?>
            <div id="headerProfile">
                <a href="change.php"><img src="images/<?php echo $info['image']; ?>" alt=""></a>
            </div>
            <div id="details">
                <h3 id="headerName"><?php echo $info['firstName']." ".$info['lastName']; ?></h3>
                <h3 id="headerStatus"><?php echo $info['status']; ?></h3>
            </div>
            <?php
            }
            ?>
            <button id="logout"><a href="php/logout.php">Выйти</a></button>
        </div>
        <div id="searchBox">
            <input type="text" id="search" placeholder="Find a Friend To Chat" autocomplete="OFF">
            <i class="fas fa-search searchButton"></i>
        </div>
        <div id="onlineUsers">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/users.js"></script>
</body>
</html>
<!-- end -->
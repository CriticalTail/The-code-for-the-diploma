<?php
include_once("php/config.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="css/mess.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    <div class="circle"></div>
    <div class="circle circle2"></div>
    <div id="container">
        <div id="header">
            <a href="users.php">
                <i class="fas fa-arrow-left"></i>
            </a>
            <?php
            $myid = $_SESSION['id'];
            $userid = mysqli_real_escape_string($conn, $_GET['userid']);

            $headerQuery = "SELECT * FROM `users` WHERE id = '{$userid}'";
            $runHeaderQuery = mysqli_query($conn, $headerQuery);

            if (!$runHeaderQuery) {
                echo "Connection failed";
            } else {
                $info = mysqli_fetch_assoc($runHeaderQuery);
            ?>
                <div id="profileImage">
                    <img src="images/<?php echo $info['image']; ?>" alt="">
                </div>
                <div id="userDetail">
                    <h3 id="name"><?php echo $info['firstName'] . " " . $info['lastName']; ?></h3>
                    <p id="status"><?php echo $info['status']; ?></p>
                </div>
        </div>
    <?php
            }
    ?>
    <div id="mainSection">
    </div>
    <form action="" id="typingArea">
    <div id="messagingTypingSection">
        <input type="text" name="outgoing" placeholder="Введите сообщение..." id="outgoing" class="setid" autocomplete="off" value="<?php echo $myid; ?>" hidden>
        <input type="text" name="incoming" placeholder="Введите сообщение..." id="incoming" class="setid" autocomplete="off" value="<?php echo $userid?>" hidden>
        <input type="text" name="typingField" placeholder="Введите сообщение..." id="typingField" autocomplete="off">
        <input type="submit" value="Send" id="sendMessage">
    </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/message.js"></script>
    <script src="js/showChat.js"></script>
</body>
</html>
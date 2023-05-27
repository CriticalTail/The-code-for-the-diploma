<?php
include_once("config.php");
if(isset($_POST['signup'])){
    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword']) || empty($_FILES['image'])){
        echo "All inputs are required";
    }else{   
    $firstName = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $emailQuery = "SELECT * FROM `users` WHERE email = '{$email}'";
    $runEmailQuery = mysqli_query($conn,$emailQuery);

    if($runEmailQuery){
        if(mysqli_num_rows($runEmailQuery) > 0){
            echo "Email is already exist.";
        }else{
            if(strlen($_POST["password"]) < 8 || strlen($_POST["confirmPassword"]) < 8){
                echo "Please use 8 or more characters in password";
            }else if($_POST["password"] != $_POST['confirmPassword']){
                echo "Password Not Matched";
            }else{
                $password = md5($_POST["password"]);
                $image = $_FILES['image'];
                $imageName = $image['name'];
                $imageSize = $image['size'];
                $imageTempName = $image['tmp_name'];
                $imageType = $image['type'];
                $explode = explode(".", $imageName);
                $lowercase = strtolower(end($explode));
                $extension = ["png","jpg","jpeg"];
                if(in_array($lowercase,$extension) == false){
                    echo "This Extension file not allowed,Please choose JPG or PNG.";
                }else{
                    $random = rand(999999999,111111111);
                    $time = time();
                    $uniqueImageName = $random . $time . $imageName;
                    move_uploaded_file($imageTempName, "../images/" . $uniqueImageName);
                    $status = "Offline";
                    $insertQuery = "INSERT INTO `users` (firstName,lastName,email,password,image,status)
                    VALUES('{$firstName}','{$lastName}','{$email}','{$password}','{$uniqueImageName}','{$status}')";
                    $runInsertQuery = mysqli_query($conn, $insertQuery);
                    if(!$runInsertQuery){
                        echo "Failed while entering data in database";
                    }else{
                        echo "success";
                    }
                }
            }
        }
    }
    }
}

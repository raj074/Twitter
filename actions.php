<?php

    include("functions.php");

    if($_GET["action"] == "loginSignup"){
        
        $error = "";

        if(!$_POST['email']){

            $error = "Email address is required*";

        }else if(!$_POST['password']){

            $error = "Password is required*";

        }else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
            $error = "Enter a valid email address";
        }
        if($error != ""){
            echo $error;
            exit();
        }



        if($_POST['loginActive'] == "0"){
            
            $query = "SELECT * from `users` WHERE email = '".mysqli_real_escape_string($link , $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link , $query);
            
            if(mysqli_num_rows($result) > 0){
                $error = "This email address is already registered!";
            }else{
                $query = "INSERT INTO `users`(`email` , `password`) VALUES('".mysqli_real_escape_string($link , $_POST['email'])."' , '".mysqli_real_escape_string($link , $_POST['password'])."') LIMIT 1";
            
                if(mysqli_query($link , $query)){

                    $_SESSION['id'] = mysqli_insert_id($link);

                    $query = "UPDATE `users` SET password = '".md5(md5($_SESSION['id']).$_POST['password'])."' WHERE id = '".$_SESSION['id']."' LIMIT 1";
                    mysqli_query($link , $query);

                    echo 1;
                    

                }else{

                    $error = "there were some errors. Please try again later.";

                }
            }

        }else{

            $query = "SELECT * from `users` WHERE email = '".mysqli_real_escape_string($link , $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link , $query);
            
            if(mysqli_num_rows($result) != 0){
                $row = mysqli_fetch_array($result);
                if($row['password'] == md5(md5($row['id']).$_POST['password'])){
                    echo 1;

                    $_SESSION['id'] = $row['id'];
                }else{
                    $error = "Please check your email or password and try again later!";
                }
            }else{
                $error = "Register this email!";
            }
            
        }

        if($error != ""){
            echo $error;
            exit();
        }
    }

    if($_GET['action'] == 'toggleFollow'){

        $query = "SELECT * from `isFollowing` WHERE follower = ".mysqli_real_escape_string($link , $_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link , $_POST['userId'])." ";
        $result = mysqli_query($link , $query);
        
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
            mysqli_query($link , "DELETE FROM `isFollowing` WHERE id = ".mysqli_real_escape_string($link , $row['id'])." LIMIT 1");

            echo 1;
        }else{

            mysqli_query($link , "INSERT INTO `isFollowing`(follower , isFollowing) VALUES(".mysqli_real_escape_string($link , $_SESSION['id'])." , ".mysqli_real_escape_string($link , $_POST['userId']).") LIMIT 1");

            echo 2;
        }
            
    }

    if($_GET['action'] == 'postTweet'){

        if(!$_POST['tweetContent']){
            echo "Please type something first";
        }else if(strlen($_POST['tweetContent']) > 150){
            echo "your tweet is too long";
        }else{

            mysqli_query($link , "INSERT INTO `tweets`(tweet , userid ,datetime ) VALUES('".mysqli_real_escape_string($link , $_POST['tweetContent'])."' , ".mysqli_real_escape_string($link , $_SESSION['id'])." ,NOW())");
            echo "1";
        }
    }

?>
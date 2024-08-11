<?php
include "connection.php";
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    $email= $_POST['email'];
    $pass= $_POST['pass'];

    $sql="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numrows= mysqli_num_rows($result);
        if($numrows==1){
             $row=mysqli_fetch_assoc($result);
             $uid=$row['user_id'];
                  if(password_verify($pass, $row["user_pass"]) ){
                    session_start();
                    $_SESSION["login"]=true;
                    $_SESSION["userid"]=$uid;
                    $_SESSION["email"]=$email;
                    header("Location:/forumsapp/index.php?loginsuccess=true");
                    }
                  else{
                    header("Location:/forumsapp/index.php?loginsuccess=false");
                    }
                        }
                      }
                    else {
                      header("Location:/forumsapp/index.php?loginsuccess=false");
                    }
                  
?>
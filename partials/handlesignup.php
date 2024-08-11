<?php
include 'connection.php';
$showerror = 'false';
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    //check whether this email exist
    $existsql ="SELECT * FROM users where user_email='$email'";
    $result = mysqli_query($conn,$existsql);
    $numrows=mysqli_num_rows($result);
        if($numrows> 0){
    echo"Email already exist";
}
else{
    if($pass==$cpass){
      $hash = password_hash($pass, PASSWORD_DEFAULT);
       $sql="INSERT INTO users (user_email,user_pass,created) VALUES ('$email','$hash',current_timestamp())";
       $result=mysqli_query($conn,$sql);
       if($result){
        $showalert=true;
        header("Location:/forumsapp/index.php?signupsuccess=true");
        exit();
       }
    }
    else{
        $showerror="passwords do not match";
    }   
}  
        header("Location:/forumsapp/index.php?signupsuccess=false&error=$showerror"); 
}
?>
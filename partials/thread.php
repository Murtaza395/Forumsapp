<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forums</title>
</head>
<style>
</style>

<body>
    <?php include "header.php"; 
    include "connection.php"; 

    $id=$_GET['threadid'];
    $sql="SELECT * FROM threads Where thread_id='$id'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $title=$row["thread_title"];
        $desc=$row["thread_desc"];
        $tid =$row["thread_user_id"];
        if(is_array($row)){
            $sql2="SELECT * FROM users WHERE user_id='$tid'";
            $result2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_assoc($result2)){
    

   echo '<div class="container my-4  bg-light">
        <div class="jumbotron" tabindex="-1">
            <h1 class="display-4"> '.$row["thread_title"].' </h1>
            <p class="lead">
          <?php  '.$row["thread_desc"].' ?>
            </p>
            <hr class="my-4">
            <p>This Forum is to sharing knowledge with each other. Never post personal information about another forum participant....
Dont post anything that threatens or harms the reputation of any person or organization....
Dont post anything that could be considered intolerant of a persons race, culture, appearance, gender, sexual preference, religion or age.</p>
           <p><b>Posted by: '.$row2["user_email"].'</b></p>
        </div>
    </div>';
            }

    }
}   
    ?>
        <div class="container">
        <form method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
            <div class="container">
                <h1>Start a Discussion</h1>
            </div>

            <?php 
            $showalert=false;
            $id=$_GET['threadid'];
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment=$_POST['com'];
            $comment_by=$_POST['user_id'];
            $sql=" INSERT INTO `comments`(`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment','$id','$comment_by',current_timestamp())";
            $result=mysqli_query($conn,$sql);
            $showalert=true;
            if($showalert){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Comment has been posted</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            }
        }
        ?>
        <?php 
        if(isset($_SESSION['login'])&& ($_SESSION['login'])==true){
        echo
            '<div class="mb-3">
                <label for="comment" class="form-label">Post a comment</label>
                <textarea class="form-control" id="com" name="com" rows="3" placeholder="comment"></textarea>
                <input type="hidden" name="user_id" value="'.$_SESSION['userid'].'">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="submit" value="Post a Query">
            </div>';
        }
        else{
            echo'<div class="container">
            <p class="text-dark">You are not logged in please log in to post a comments </p>
            </div>';
        }


     echo   '</form>
    </div>';
?>
    <div class="container" id="ques" >
    <h1>Discussions</h1>
    <?php  $catid=$_GET['threadid'];

$sql="SELECT * from comments where thread_id='$id'";
$noresult=true;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $noresult=false;
    $id=$row["comment_id"];
    $content=$row["comment_content"];
    $comment_time=$row['comment_time'];
    $com_by=$row['comment_by'];
    $sql2="SELECT user_email FROM users WHERE user_id='$com_by'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);

     echo   '<div class="container">
     <div class="media my-3">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQttE9sxpEu1EoZgU2lUF_HtygNLCaz2rZYHg&s" width="40px"alt="user">
                <div class="media-body">
                <p class="my-0"><b>Asked by: '. $row2['user_email'] .' at '.$comment_time.'</b> </p> 
                   <p>'.$content.'</p>
            </div>
            </div>
        </div>';
}
    if($noresult){
       echo'<div class="container bg-light text-dark text-center"  style="height: 200px">
       <div class="jumbotron">
  <p style="font-size:30px"><b>No Threads Found</b></p>
  <p id="margin">Be the first to ask a question.</p>
  </div>
</div>';
    }
   ?>
     </div> 

    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forums</title>
    <style>
    #ques {
        min-height: 300px;
    }

    #margin {
        margin-top: 60px;
    }
    </style>
</head>
<body>
    <?php include "header.php"; 
    include "connection.php"; 
    $id=$_GET['catid'];
    $sql="SELECT * from categories where category_id='$id'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row["category_name"];
        $catdesc=$row["category_description"];
  ?>

    <div class="container my-4  bg-light">
        <div class="jumbotron" tabindex="-1">
            <h1 class="display-4">Welcome to <?php echo $catname ?> forums</h1>
            <p class="lead">
                <?php echo $catdesc ?>
            </p>
            <hr class="my-4">
            <p>This Forum is for sharing knowledge with each other. Never post personal information about another forum
                participant. ...
                Don't post anything that threatens or harms the reputation of any person or organization. ...
                Don't post anything that could be considered intolerant of a person's race, culture, appearance, gender,
                sexual preference, religion or age.</p>
            <a role="button" class="btn btn-success" href="#">Learn More</a>
        </div>
    </div>
    <?php } ?>
    <?php 
        $showalert=false;
    $id=$_GET['catid'];
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $uid=$_SESSION['userid'];
        $sql2="SELECT user_email FROM users WHERE user_id='$uid'";
        $res=mysqli_query($conn,$sql2);
        $array=mysqli_fetch_assoc($res);
        $sql="INSERT INTO `threads`(`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `created`) VALUES ('$title','$desc','$id','$uid',current_timestamp())";
        $res=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Your thread has been added.Please wait for community to respond</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
         }
    }

    ?>
    <?php
    if(isset($_SESSION['login']) && ($_SESSION['login'])==true)
    echo'<div class="container">
        <form method="post" action='. $_SERVER["REQUEST_URI"] .'>
            <div class="container">
                <h1>Ask a question</h1>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Thread Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Elaborate your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="submit" value="Post a Query">
            </div>
        </form>
    </div>';
    else{
        echo'<div class="container">
        <p class="text-dark">You are not logged in please log in to ask a question </p>
        </div>';
    }
?>
    <div class="container" id="ques">
        <h1>Browse Questions</h1>
        <?php 
        $id=$_GET['catid'];
        $sql="SELECT * from threads where thread_cat_id='$id'";
        $noresult=true;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        $noresult=false;
        $title=$row["thread_title"];
        $desc=$row["thread_desc"];
        $comment_time=$row["created"];
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT user_email FROM users WHERE user_id='$thread_user_id'";
        $res=mysqli_query($conn,$sql2);
        $array=mysqli_fetch_assoc($res);
     echo '<div class="media my-3">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQttE9sxpEu1EoZgU2lUF_HtygNLCaz2rZYHg&s" width="50px"alt="user">
                <div class="media-body">
                     <p class="my-0"><b>Asked by: '. $array['user_email'] .' at '. $comment_time .'</b> </p> 
                     <a href="thread.php?threadid='.$id.'" class="mt-0 text-dark">'.$title.'</a>
                     <p>'.$desc.'</p>
                </div>
            </div>';
}
    if($noresult){
       echo'<div class="container bg-dark text-light text-center"  style="height: 200px">
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
<!--<input type="hidden" name="user_id" value="'.$_SESSION['userid'].'">-->
</html>
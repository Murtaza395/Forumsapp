<?php
session_start();
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forumsapp/index.php">Forums Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/about.php">About</a>
        </li>
                <li class="nav-item">
          <button class="nav-link" data-bs-toggle="modal" data-bs-target="#contactModal" aria="true">Contact</button>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catogeries
          </a>
         <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="background-color:blue; color:pink; border:2px solid black;" href="https://localhost/forumsapp/partials/threadslist.php?catid=1">python</a></li>
            <li><a class="dropdown-item"style="background-color:blue; color:pink; border:2px solid black ; margin-top:3px" href="https://localhost/forumsapp/partials/threadslist.php?catid=2">Javascript</a></li>
             <li><a class="dropdown-item" style="background-color:blue; color:pink; border:2px solid black; margin-top:3px"href="https://localhost/forumsapp/partials/threadslist.php?catid=3">Java</a></li>
              <li><a class="dropdown-item" style="background-color:blue; color:pink; border:2px solid black; margin-top:3px" href="https://localhost/forumsapp/partials/threadslist.php?catid=1">ReactJS</a></li>
          </ul>
          </li>
      </ul>';
      if (isset($_SESSION['login'])&& $_SESSION['login']==true) {
        echo
 '<form class="d-flex" role="search" method="post" action="/forumsapp/partials/handlelogout.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <p class="text-light my-0 mx-2"><b class="ms-5">Welcome</b> '.$_SESSION['email'].'</p>
        <button class="btn btn-outline-success" type="submit" name="logout">Logout</button>
      </form>';
      }
      else{
      echo'<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <button class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#LoginModal">Login In</button>
      <button class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#SignUpModal">Sign Up</button>';
      }

echo '</div>
  </div>
</nav>';
?>
<?php 
include"loginmodal.php";
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false")
{
  echo'<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
  <strong>Wrong Credentials</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>You are logged in </strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
  }
include"SignUpmodal.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>You can now login</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
include "contactmodal.php";
?>
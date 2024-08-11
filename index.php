<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Forums</title>
</head>

<body>
    <?php include "partials/header.php"; 
    include "partials/connection.php"; 
  ?>
    <!-- Slider Starts here -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/270366/pexels-photo-270366.jpeg?auto=compress&cs=tinysrgb&w=600"
                    width="100%" height="500px" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1181298/pexels-photo-1181298.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="d-block w-100" width="100%" height="500px" alt="image2">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1779487/pexels-photo-1779487.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="d-block w-100" width="100%" height="500px" alt="image3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Card Container Starts here -->
    <div class="container my-3">
        <h1 class="text-center my-3">Welcome to Forums - Categories</h1>
        <div class="row ms-2 container ms-2">
            <?php 
            $sql= "SELECT * FROM categories";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $cat=$row['category_name'];
                $des=$row['category_description'];
                $id=$row['category_id'];
            echo'
            <div class="card ms-3 my-2" style="width: 18rem;">
              <img src="img/cat'.$id.'.jpeg"
                    width=100% height=160px class="card-img-top mt-2" alt="" >
                <div class="card-body">
                    <h5 class="card-title"><a href="/forumsapp/partials/threadslist.php?catid='.$id.'">'.$cat.'</a></h5>
                    <p class="card-text">'.$des.'.</p>
                    <a href="/forumsapp/partials/threadslist.php?catid='.$id.'" class="btn btn-primary">View threadslist</a>
                </div>
            </div>';
        }
        ?>
        </div>
    </div>


    <?php include "partials/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
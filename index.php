<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php include "header.php"; ?>

    <div class="container-fluid m-0 " style="background-color: #f6f2e9;">
        <div class="row">
            <div class="col-lg-1 col-md-0 col-sm-0"></div>
            <div class="col-lg-6 col-md-7 mx-auto" >
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://porus.g5plus.net/wp-content/uploads/revslider/home-01/product-21.png" height="400px" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://porus.g5plus.net/wp-content/uploads/revslider/home-01/product-21.png" height="400px" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://porus.g5plus.net/wp-content/uploads/revslider/home-01/product-21.png" height="400px" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " hidden aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" hidden aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-top: 20px; text-align:center;">
                <h4>Everyday we make</h4>
                <h1>Freshly baked bread </h1>
                <?php
                if (!isset($_SESSION['u_id'])) {
                ?>
                    <a class="btn btn-outline-dark shadow-none mb-5" href="login.php">Get Started</a>
                <?php } else { ?>
                    <a class="btn btn-outline-dark shadow-none mb-5" href="#">Contact Us</a>
                <?php } ?>
            </div>

        </div>

    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <div class="h2"> Experience Flavour with us</div>
            </div>
        </div>
        <div class="row mt-4">
            <?php
                $query = mysqli_query($con, "select * from product limit 8");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <a href="moreinfo.php?id=<?= $row['p_id'] ?>" class="text-dark " style="text-decoration: none;">
                        <div class="card mt-4">
                            <div class="card-body">
                                <img src="images/<?= $row['p_img'] ?>" height="200px" alt="" class="card-img-top">
                                <h5 class="text-center mt-4 "> <?= $row['p_title'] ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <div class="h2"> Popular Picks</div>
            </div>
        </div>
        <div class="row mt-4">
            <?php
            $query = mysqli_query($con, "select * from product limit 4");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <a href="moreinfo.php?id=<?= $row['p_id'] ?>" class="text-dark " style="text-decoration: none;">
                        <div class="card mt-4">
                            <div class="card-body">
                                <img src="images/<?= $row['p_img'] ?>" height="200px" alt="" class="card-img-top">
                                <h5 class="text-center mt-4 "> <?= $row['p_title'] ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>


    <footer class="container-fluid py-5" style="background-color: #f6f2e9;">
        <div class="row">

            <div class="col-6 col-md text-center">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Cool stuff</a></li>
                    <li><a class="link-secondary" href="#">Random feature</a></li>
                    <li><a class="link-secondary" href="#">Team feature</a></li>
                    <li><a class="link-secondary" href="#">Stuff for developers</a></li>
                    <li><a class="link-secondary" href="#">Another one</a></li>
                    <li><a class="link-secondary" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-center">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Resource name</a></li>
                    <li><a class="link-secondary" href="#">Resource</a></li>
                    <li><a class="link-secondary" href="#">Another resource</a></li>
                    <li><a class="link-secondary" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-center">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Cake</a></li>
                    <li><a class="link-secondary" href="#">Cookies</a></li>
                    <li><a class="link-secondary" href="#">Muffins</a></li>
                    <li><a class="link-secondary" href="#">Donuts</a></li>
                </ul>
            </div>
            <div class="col-6 col-md text-center">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Team</a></li>
                    <li><a class="link-secondary" href="#">Locations</a></li>
                    <li><a class="link-secondary" href="#">Privacy</a></li>
                    <li><a class="link-secondary" href="#">Terms</a></li>
                </ul>
            </div>
            <div class="col-12 col-md mt-5">
                <svg class="float-end me-5 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path>
                </svg>
                <small class="d-block float-end text-muted">© 2017–2021</small>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
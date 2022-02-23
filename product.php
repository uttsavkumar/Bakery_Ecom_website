<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background-color: #f6f2e9;">
    <?php include "header.php"; ?>


    <div class="container mt-5">

        <h5>Products</h5>
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $c_id = $_GET['id'];
                $query = mysqli_query($con, "select * from product where cat_id = '$c_id'");
            }
            else{
                 if (isset($_GET['go'])) {
                $search = $_GET['search'];
                $query = mysqli_query($con, "select * from product where p_title like '%$search%'");
                 }
               
         }
         $count = mysqli_num_rows($query);
         if($count < 1 ){
           
                echo "<p style='width:500px' class='alert alert-danger'> Product not found !</p>";
            
         }
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                    <div class="card " style="background-color: #f6f2e9; border:none;">
                        <h5 class="ms-3 mt-2" style="font-weight: 400;"><?= $row['p_title'] ?></h5>
                        <img src="images/<?= $row['p_img'] ?>" alt="" height="170px" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title mb-3"><?= "Rs ." . $row['p_price'] ?></div>


                            <?php
                            if (!isset($_SESSION['u_id'])) {
                            ?>
                                <a href="login.php" class="btn btn-outline-dark">Add to Cart</a>
                            <?php } else { ?>
                                <a href="cart.php?id=<?= $row['p_id'] ?>" class="btn btn-outline-dark">Add to Cart</a>
                            <?php } ?>
                            <a href="moreinfo.php?id=<?= $row['p_id'] ?>" class="btn btn-outline-dark ms-3">More Info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
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

<body>
    <?php include "header.php"; ?>


    <div class="container-fluid m-0" style="background-color: #f6f2e9;height:500px;">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 mt-5">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = mysqli_query($con, "select * from product join category on product.cat_id = category.c_id where p_id = '$id'");
                    $row = mysqli_fetch_array($query);
                }

                ?>
                <h5 class="ms-lg-5 ms-md-5" style=" font-weight: 200px;">Category: <?= $row['c_title'] ?></h5>
                <img src="images/<?= $row['p_img'] ?>" alt="" height="300px" width="300px" class="ms-lg-5  img-fluid mx-auto" style=";border-radius:200px;">
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 mt-md-5" style="background-color: #f6f2e9;">
                <h3 class=" mt-lg-0 mt-sm-5"><u><?= $row['p_title'] ?></u></h3>
                <h5 class="mt-2"><?= "Rs. " . $row['p_price'] ?></h5>
                <h4 class="mt-4">Ingredrient:</h4>
                <p>The essential ingredients consists of flour, leaveners, salt, sugar, dairy, fats, extracts, spices & other add-ins such as vanilla extract, and chocolate chips.
                </p>
                <h4 class="mt-4">Preparation:</h4>
                <p>One of the most important aspects of successful cookie baking is preparing ahead of time. It does not matter how great your ingredients are if you forget one of them and have to run to the store while your batter firms, gets too warm, or too cold.</p>
                <?php
                if (!isset($_SESSION['u_id'])) {
                ?>
                    <a href="login.php" class="btn btn-outline-dark mt-2">Add to cart</a>
                <?php } else { ?>
                    <a href="cart.php?id=<?= $row['p_id'] ?>" class="btn btn-outline-dark mt-2">Add to cart</a>
                <?php } ?>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
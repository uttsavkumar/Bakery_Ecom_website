<?php
include "connect.php";

if (!isset($_SESSION['u_id'])) {
    echo "<script>window.open('index.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="bg-light">
    <?php include "header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-0 col-lg-2"></div>
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Order Id</td>
                                <td scope="">Product</td>
                                <td scope="">Price</td>
                               

                            </tr>
                            <?php
                           if(isset($_SESSION['u_id'])){
                            $id = $_SESSION['u_id'];
                            $query = mysqli_query($con, "select * from cart join product on cart.cartp_id = product.p_id where cartuser_id = '$id' and status = 1" );

                           }
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <td><?= "#OR" . $row['cart_id'] ?></td>
                                    <td scope="" class="d-flex">
                                        <img src="images/<?= $row['p_img'] ?>" alt="" class="card-img-top" height="100px" style="width: 100px;">
                                       <span class="mt-4 ms-3"> <?= $row['p_title'] ?></span>
                                    </td>
                                    <td scope="" class=""><span class="mt-4 "><?= "Rs ." . $row['p_price'] ?></span></td>
                                </tr>
                            <?php } ?>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>

</html>
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

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout </h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <?php
                    $u_id = $_SESSION['u_id'];
                    $query = mysqli_query($con, "select * from cart where cartuser_id = '$u_id' and status = 0");
                    $count = mysqli_num_rows($query);
                    ?>
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>

                        <span class="badge bg-primary rounded-pill"><?= $count ?></span>
                    </h4>
                    <?php
                   
                    $u_id = $_SESSION['u_id'];
                    $query = mysqli_query($con, "select * from cart join product on cart.cartp_id = product.p_id where cartuser_id = '$u_id' and status = 0");
                    $sum = 0;
                    while ($row = mysqli_fetch_array($query)) {


                    ?>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?= $row['p_title'] ?></h6>
                                </div>
                                <span class="text-muted"><?= "Rs. " . $row['p_price'] ?></span>
                                <input hidden><?php

                                                $total = $row['p_price'];
                                                $sum = $sum + $total; ?></input>
                            </li>
                        <?php } ?>

                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                
                            </div>
                            <span class="text-success">−0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (Rupee)</span>
                            <strong><?= "Rs " . $sum ?></strong>
                        </li>
                        </ul>

                        <form class="card p-2">
                            <a  href="checkout.php?id=<?=$_SESSION['u_id']?>" class="btn btn-primary">Confirm order</a>
                        </form>
                       <?php
                       if(isset($_GET['id'])){
                           $id = $_GET['id'];
                            $query = mysqli_query($con,"update cart inner join user on cart.cartuser_id = user.u_id set status = 1  where  cartuser_id = '$id'");
                            if($query){
                                echo"<script>window.open('index.php','_self')</script>";
                            }

                       }
                       ?>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $u_id = $_SESSION['u_id'];
                            $user = mysqli_query($con, "select * from user where u_id = '$u_id'");
                            while ($row = mysqli_fetch_array($user)) {

                            ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">Login <i class="bi bi-check-lg"></i></h5>

                                        <div class="d-flex">
                                            <h4><?= $row['u_name'] ?></h4>
                                            <p class="mt-1 ms-3"><?= $row['u_email'] ?></p>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="text-muted">Payment Method</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                            <label class="form-check-label" for="flexRadioDisabled">
                                                                UPI
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                            <label class="form-check-label" for="flexRadioDisabled">
                                                                Wallet
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                            <label class="form-check-label" for="flexRadioDisabled">
                                                                Credit/Debit/ATM Card
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                                                            <label class="form-check-label" for="flexRadioDisabled">
                                                                Net Banking
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" checked required>
                                                            <label class="form-check-label" for="flexRadioDisabled">
                                                                Cash on delivery
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017–2021 Bakery</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>

</html>
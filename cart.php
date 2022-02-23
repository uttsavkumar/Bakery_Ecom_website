<?php include "connect.php";


?>
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
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $u_id = $_SESSION['u_id'];
        $query = mysqli_query($con, "insert into cart(cartp_id,cartuser_id) value('$id','$u_id')");
        if ($query) {
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
    ?>

    <div class="container mt-5 mb-5">

        <h5>Your Cart</h5>
        <div class="row">
            <div class="col-lg-9 col-md-12 ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <!-- <th >Quantity</th> -->
                            <th>unit Price</th>
                            <th>Remove Item</th>

                        </tr>
                    </thead>

                    <?php
                    $u_id = $_SESSION['u_id'];
                    $query = mysqli_query($con, "select * from product join cart on product.p_id = cart.cartp_id where p_id = cartp_id  and cartuser_id = '$u_id' and status=0");
                    $count = mysqli_num_rows($query);
                    $sum;
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th>
                                <div class="col-lg-9 col-sm-12 d-flex">
                                    <div class="card" style="border: none;">
                                        <div class="card-body">
                                            <img src="images/<?= $row['p_img'] ?>" alt="" height="90px" style="width: 120px;" class="card-img-top me-5">

                                        </div>
                                    </div>
                                    <h6 class="mt-5"> <?= $row['p_title'] ?></h6>
                                </div>

                            </th>
                            <!-- hera -->
                            <!-- <th>
                               <form action="" method="post">
                                   <input type="submit" value="+" name="inc" class="btn btn-outline-dark">
                                   78
                                   <input type="submit" value="-" name="dec" class="btn btn-outline-dark">
                               </form>
                               <?php
                                //    if(isset($_POST['inc'])){
                                //        $id = $_SESSION['u_id'];
                                //        $inc = $_POST['inc'];
                                //        $inc =  $inc++;
                                //        $query = mysqli_query($con,"update cart inner join product on cart.cartp_id = product.p_id set quantity = '$inc'  where  p_id = cartp_id  and cartuser_id = '$id'");
                                //    }
                                ?>
                           </th> -->
                            <th>
                                <h6 class="mt-5"><?= "Rs. " . $row['p_price'] ?></h6>

                            </th>
                            <th><a href="cart.php?del=<?= $row['cart_id'] ?>" class="btn btn-danger ms-4" style="margin-top:40px;">X</a></th>
                            <th></th>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <!-- order summary -->
            <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                <h4 class="text-center mb-4 "><u>Order Summary</u></h4>
                <form action="">
                    <div class="card">
                        <div class="card-body">
                            <p>Product's you have selected</p>
                            <table class="table">
                                <tr>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>price</td>

                                </tr>
                                <?php
                                $u_id = $_SESSION['u_id'];
                                $query = mysqli_query($con, "select * from product join cart on product.p_id = cart.cartp_id where p_id = cartp_id  and cartuser_id = '$u_id' and status =0");
                                $no = 0;
                                $sum = 0;
                                while ($row = mysqli_fetch_array($query)) {

                                    $no++;
                                ?>
                                    <tr>
                                        <td>
                                            <p style="font-size: 12px;" class="mt-1"><?= "#PR" . $no ?></p>
                                        </td>
                                        <td><?= $row['p_title'] ?></td>
                                        <td><?= $row['p_price'] ?></td>
                                        <td hidden><?php
                                                    $new = $row['p_price'];
                                                    $sum = $sum + $new;
                                                    ?></td>

                                    </tr>
                                <?php } ?>
                            </table>
                            <div class="d-flex">
                                <h6 class="ms-1 mt-4">Total Amount :</h6>
                                <h6 class="ms-2 mt-4"><?php echo "Rs." . "$sum" ?></h6>
                            </div>
                            <a href="checkout.php" class="btn btn-success float-end mt-3 w-100">Checkout</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $query = mysqli_query($con, " delete from cart where cart_id = '$del'");
    if ($query) {
        echo "<script>window.open('cart.php','_self')</script>";
    }
}
?>
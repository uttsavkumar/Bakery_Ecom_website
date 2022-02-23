<?php
include "connect.php";
if (!isset($_SESSION['info'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info /Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-3" style="margin-left: -15px;"> <?php include "side.php" ?></div>

            <div class="col-8 mt-2">

                <div class="row">
                    <?php
                    if (isset($_GET['c_id'])) {
                        $c_id = $_GET['c_id'];
                        $query = mysqli_query($con, "select * from product where cat_id = '$c_id'");
                    }
                    while ($row = mysqli_fetch_assoc($query)) {


                    ?>
                        <div class="col-3 mt-4 ">

                            <div class="card">
                                <div class="card-header"><?= $row['p_title'] ?></div>
                                <img src="images/<?= $row['p_img'] ?>" alt="" class="card-img-top" height="170px">
                                <div class="card-body">
                                    <p class="card-text"><?= "Rs " . $row['p_price'] . "-" ?></p>
                                    <!-- edit bachha hua ha -->
                                    <a href="cake.php?edit=<?= $row['p_id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="cake.php?del=<?= $row['p_id'] ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    $query = mysqli_query($con, "delete from product where p_id = '$del'");
    if ($query) {
        echo "<script>window.open('cake.php','_self')</script>";
    }
}
?>

</html>
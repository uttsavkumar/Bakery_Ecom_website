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
    <title>Add product/Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-4" style="margin-left: -15px;"> <?php include "side.php" ?></div>

            <div class="col-8 mt-5">

                <div class="row">
                    <div class="col-4">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Add product Category</label>
                                <input type="text" name="c_title" id="" class="form-control">

                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Add category" name="insertCategory" class="btn btn-primary">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['insertCategory'])) {
                            $c_title = $_POST['c_title'];

                            $query = mysqli_query($con, "insert into category(c_title) value('$c_title')");
                            if ($query) {
                                echo "<script>window.open('cake.php','_self')</script>";
                            }
                        }
                        ?>
                    </div>

                    <div class="col-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Product Title</label>
                                <input type="text" name="p_title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Product Image</label>
                                <input type="file" name="p_img" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Product Category</label>
                                <select name="cat_id" class="form-select">
                                    <?php $query = mysqli_query($con, "select * from category");
                                    while ($row = mysqli_fetch_array($query)) {

                                    ?>
                                        <option value="<?= $row['c_id'] ?>"><?= $row['c_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Product price</label>
                                <input type="text" name="p_price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="Add product" name="addCake" class="btn btn-primary">
                            </div>

                        </form>
                        <?php
                        if (isset($_POST['addCake'])) {
                            $p_title = $_POST['p_title'];

                            $p_img = $_FILES['p_img']['name'];
                            $tmp_file = $_FILES['p_img']['tmp_name'];
                            move_uploaded_file($tmp_file, "./images/$p_img");

                            $cat_id = $_POST['cat_id'];
                            $p_price = $_POST['p_price'];

                            $query = mysqli_query($con, "insert into product(p_title,p_img,cat_id,p_price) value('$p_title','$p_img','$cat_id','$p_price')");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
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
    <title>Add user/Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-4" style="margin-left: -15px;"> <?php include "side.php" ?></div>

            <div class="col-4 mt-5">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="u_name">
                    </div>
                    <div class="mb-3">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" name="u_lastName">
                    </div>
                    <div class="mb-3">
                        <label for="">Emaik</label>
                        <input type="email" class="form-control" name="u_email">
                    </div>
                    <div class="mb-3">
                        <label for="">Pasword</label>
                        <input type="password" class="form-control" name="u_password">
                    </div>
                    <div class="mb-3">
                        <select name="u_role" id="" class="form-select">
                            <option value="0">user</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add user" name="send" class="btn btn-primary">
                    </div>

                </form>
                <?php
                if (isset($_POST['send'])) {
                    $u_name = $_POST['u_name'];
                    $u_lastName = $_POST['u_lastName'];
                    $u_email = $_POST['u_email'];
                    $u_password = md5($_POST['u_password']);
                    $u_role = $_POST['u_role'];

                    $query = mysqli_query($con, " insert into user(u_name,u_lastName,u_email,u_password,u_role) value('$u_name','$u_lastName','$u_email','$u_password','$u_role')");
                    if ($query) {
                        echo "<script>window.open('adduser.php','_self')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
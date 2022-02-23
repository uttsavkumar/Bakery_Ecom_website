<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php"?>
    <div class="container mt-5">
        <div class="row ">
           <div class="col-lg-3 col-md-0"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center" style="border: none; background-color:white"> <h4>Signup</h4> </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="u_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for=""> Last Name</label>
                                <input type="text" name="u_lastName" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="u_email" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="u_password" required class="form-control">
                            </div>
                            <div class="mt-4">
                                <input type="submit" value="Signup" name="signup" class="btn btn-primary w-100">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['signup'])) {
                            $u_name = $_POST['u_name'];
                            $u_lastName = $_POST['u_lastName'];
                            $u_email = $_POST['u_email'];
                            $u_password = md5($_POST['u_password']);

                            $query = mysqli_query($con, "insert into user(u_name,u_lastName,u_email,u_password) value('$u_name','$u_lastName','$u_email','$u_password')");

                            if ($query) {
                                echo "<script>window.open('login.php','_self')</script>";
                            } else {
                                echo "query unsuccefull";
                            }
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
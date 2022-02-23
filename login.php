<?php include "connect.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body >
    <?php include "header.php"?>
    <div class="container mt-5 ">
        <div class="col-lg-5 col-md-10 mx-auto">
            <div class="card " >
                <div class="card-header text-center h5" style="border:none ;background-color:white;"> User login </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="u_email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">password</label>
                            <input type="password" name="u_password" id="" class="form-control">
                        </div>


                        <div class="mb-3 ">
                            <input type="submit" value="login" class="w-100 btn btn-primary" name="login">
                        </div>

                        <a href="" class="link">Forget Password?</a>
                        <a href="signup.php" class="link float-end ">Signup</a>
                    </form>
                </div>
            </div>
            <?php
            if(isset($_POST['login'])) {
                $email = $_POST['u_email'];
                $password = md5($_POST['u_password']);

                $query = mysqli_query($con, "select * from user where u_email = '$email' and u_password = '$password' and u_role = 0");
                $count = mysqli_num_rows($query);
                if($count>0){
                    $row = mysqli_fetch_array($query);
                    $_SESSION['u_id'] = $row['u_id'];
                    echo "<script>window.open('index.php','_self')</script>";   
                    
                }
                else{
                    echo"<div class='alert alert-danger mt-2'> please check email or password! <div>";
                }
                
            }
           

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
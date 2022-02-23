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

<body>
    <div class="container mt-5 ">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header h4 text-center"><svg xmlns="http://www.w3.org/2000/svg" width="22 " height="22 " fill="currentColor" class="bi bi-person me-1" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>Login as Admin</div>
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

                        <a href="" class="link ">Forget Password?</a>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['login'])) {
                $email = $_POST['u_email'];
                $password = md5($_POST['u_password']);

                $query = mysqli_query($con, "select * from user where u_email = '$email' and u_password = '$password' and u_role = 1");
                $count = mysqli_num_rows($query);
                if ($count>0) {
                    $_SESSION['info'] = $email;
                    echo "<script>window.open('index.php','_self')</script>";
                    die();
                }
                else{
                    echo"<div class='alert alert-danger mt-2'> please check email or password! <div>";
                }
                
            }
           

            ?>
        </div>
    </div>

</body>

</html>
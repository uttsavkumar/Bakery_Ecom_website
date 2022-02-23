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
    <title>Admin Panel</title>

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
                    <h4>Overview</h4>
                    <div class="col-3 mt-3">
                        <div class="card ">
                            <div class="card-body d-flex">
                                <div class="card-title">
                                    <?php
                                    $query = mysqli_query($con,"select * from user where u_role = 0");
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <h2 class="text-success"><?= $count?></h2>
                                    <p class="card-text">Total User's Registration</p>
                                </div>
                                <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-person mt-4" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                    </svg></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="card ">
                            <div class="card-body d-flex">
                                <div class="card-title">
                                    <?php
                                    $query = mysqli_query($con,"select * from product");
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <h2 class="text-success"><?= $count?></h2>
                                    <p class="card-text">Total products</p>
                                </div>
                                <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-bag mt-4" viewBox="0 0 16 16">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="card ">
                            <div class="card-body d-flex">
                                <div class="card-title">
                                    <?php
                                    $query = mysqli_query($con,"select * from cart where status = 1");
                                    $count = mysqli_num_rows($query);
                                    ?>
                                    <h2 class="text-success"><?= $count?></h2>
                                    <p class="card-text">Total Orders so far</p>
                                </div>
                                <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-cart-check mt-4" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3 mt-3">
                        <div class="card ">
                            <div class="card-body d-flex">
                                <div class="card-title">
                            <?php
                            $query = mysqli_query($con,"select * from user where u_role = 0 ");
                            $count = mysqli_num_rows($query);
                         ?>
                                    <h2 class="text-success"><?=$count?></h2>
                                    <p class="card-text">Customer's Query</p>

                                </div>
                                <div class=""><svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-chat-dots-fill mt-4" viewBox="0 0 16 16">
                                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
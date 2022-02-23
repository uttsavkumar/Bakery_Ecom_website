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
            <div class="col-6 mt-5">
                <table class="table">
                    <tr>
                        <td>User name</td>
                        <td>User email</td>
                        <td>User query</td>
                       
                    </tr>
                    <?php
                    $query = mysqli_query($con,"select * from user where u_role = 0");
                    while($row = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?=$row['u_name'] ?></td>
                        <td><?=$row['u_email'] ?></td>
                        <td><?=$row['query'] ?></td>
                      
                    </tr>
                    <?php } ?>
                </table>
             
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
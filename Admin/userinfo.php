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
    <title>UserInfo/Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-4" style="margin-left: -15px;"> <?php include "side.php" ?></div>

            <div class="col-8 mt-5">
                <form action="userinfo.php" method="post">
                    <table class="table">
                        <tr>
                            <td>id</td>
                            <td>Name</td>
                            <td>LastName</td>
                            <td>email</td>
                            <td>action</td>
                            <td>orders</td>
                        </tr>
                        <?php
                        if(isset($_GET['go'])){
                            $search = $_GET['search'];
                            $query = mysqli_query($con,"select * from user where u_name like '%$search%'");
                        }
                        else{
                            $query = mysqli_query($con, " select * from user where u_role = 0");
                        }
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $row['u_id'] ?></td>
                                <td><?= $row['u_name'] ?></td>
                                <td><?= $row['u_lastName'] ?></td>
                                <td><?= $row['u_email'] ?></td>
                                <td><a href="userinfo.php?del=<?= $row['u_id'] ?>" class="btn btn-danger">Delete</a>
                                    <!-- editNotcompleted    -->
                                    <a href="userinfo.php?edit=<?= $row['u_id'] ?>" class="btn btn-success">Edit</a>
                                   
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $query = mysqli_query($con, " delete from user where u_id = '$del'");

    if ($query) {
        echo "<script>window.open('userinfo.php','_self')</script>";
    }
}
?>


</html>
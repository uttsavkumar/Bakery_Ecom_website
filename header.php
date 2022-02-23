<div class="navbar navbar-expand-lg navbar-dark" style=" height:66px; background-color: #f6f2e9;">
    <div class="container-lg">
        <div class="row mx-auto">
            <a href="" class="navbar-brand text-dark" style="font-size: 50px; ">Bakery</a>
        </div>
    </div>
</div>
<div class="navbar navbar-expand-lg navbar-dark sticky-top top-0" style="height:105px; background-color: #f6f2e9;">

    <div class="container">
        <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span ><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="" class="bi bi-list icon-dark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-5">
                <li class="nav-item"><a href="index.php" class="nav-link text-dark">Home</a></li>
                <div class="dropdown">
                    <a href="#" class="nav-link text-dark  dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">Products</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php
                        $query = mysqli_query($con, "select * from category");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <li><a class="dropdown-item" href="product.php?id=<?= $row['c_id'] ?>"><?= $row['c_title'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php
                if (isset($_SESSION['u_id'])) {
                ?>
                    <li class="nav-item"><a href="order.php" class="nav-link text-dark">My Order</a></li>
                <?php } ?>
                <li class="nav-item"><a href="#insert" data-bs-toggle="modal" class="nav-link text-dark">Inquiry</a></li>
            </ul>
            <!-- search -->
            <form action="product.php" method="get" class="d-flex ">
                <input type="search" name="search" class="form-control shadow-none ms-5" placeholder="Search Product" style="background-color: #f6f2e9; width: 330px">
                <input type="submit" value="Search" name="go" class="me-5" style="background-color: #f6f2e9;border:1px solid #ced4da; ">
            </form>
            <ul class="navbar-nav me-5">
                <?php
                if (isset($_SESSION['u_id'])) {
                ?> <li class="nav-item"><a href="logout.php" class="nav-link text-dark">Logout</a></li>

                    <li class="nav-item"><a href="#" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg></a></li>

                <?php } else { ?>
                    <li class="nav-item"><a href="login.php" class="nav-link text-dark">Login</a></li>
                    <li class="nav-item"><a href="signup.php" class="nav-link text-dark">Signup</a></li>
                <?php } ?>
                <?php
                if (isset($_SESSION['u_id'])) {
                    $u_id = $_SESSION['u_id'];
                    $query = mysqli_query($con, "select * from product join cart on product.p_id = cart.cartp_id where p_id = cartp_id  and cartuser_id = '$u_id' and status= 0");
                    $count = mysqli_num_rows($query);
                ?>
                    <li class="nav-item"><a href="cart.php" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></a></li>
                    <li style="color:red" class="nav-item h5"> <?= $count ?></li>
                <?php } else { ?>
                    <li class="nav-item"><a href="login.php" class="nav-link text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></a></li>
                <?php } ?>
            </ul>

        </div>
    </div>
</div>

<div class="modal" id="insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="border: none;">
                <h5 class="modal-title">Inquiry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="mt-3">
                    <textarea placeholder="Enter your query" name="query" class="form-control shadow-none" rows="10"></textarea>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-outline-dark" name="inq">

                    </div>
                </form>
                <?php
                if (isset($_POST['inq'])) {
                    $query = $_POST['query'];
                    $id = $_SESSION['u_id'];
                    $insert = mysqli_query($con, "update user set query = '$query' where u_id = '$id'");
                    if ($insert) {
                        echo "<script>alert('Your Inquiry is Submitted!')</script>";
                    } else {
                        echo "noT";
                    }
                }
                ?>
            </div>
            <div>
                <p class="ms-3">Or contact us at <a class="link" href="#">bakery@gmail.com</a></p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 555px">
  <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"></svg>
    <span class="fs-5">Home</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">

    <li>
      <a href="adduser.php" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Add User
      </a>
    </li>
    <li>
      <a href="userinfo.php" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        User Info
      </a>
    </li>
    <li>
      <a href="addcake.php" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Add Product
      </a>
    </li>
    <li>
    <li>
      <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        View Products
      </a>
      <ul class="dropdown-menu  text-white" aria-labelledby="dropdownMenuLink">
        <?php
        $query = mysqli_query($con, "select * from category");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <li><a class="dropdown-item" href="cake.php?c_id=<?= $row['c_id'] ?>"><?= $row['c_title'] ?></a></li>
        <?php } ?>
      </ul>
    </li>
    <li>
      <a href="order.php" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Orders
      </a>
    </li>
    <li>
      <a href="customer.php" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16">
          <use xlink:href="#people-circle"></use>
        </svg>
        Customer's Enquiry
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://previews.123rf.com/images/infinetsoft/infinetsoft2006/infinetsoft200600239/148336451-user-icon-avatar-men-contact-symbol-black-white-perfect-for-business-concepts-icon-sign-symbol-stick.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong><?= $_SESSION['info'];?></strong>
    </a>

    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
    </ul>
  </div>
</div>
<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username'])) {
    header('Location:signin.php');
}

$con = mysqli_connect("localhost:3306", "root", "", "wasteco");

#all listings
$sqlUsers = "SELECT * FROM user";
$sqlUsersResult = mysqli_query($con, $sqlUsers);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WasteCo - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/img/logo1.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php
    include "./templates/sideBar.php";
    ?>


    <!-- Content Start -->
    <div class="content">
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <form action="actionSignIn.php" method="post">
                                        <input type="submit" name="logoutAdmin" value="Log Out"
                                               class="btn btn-sm btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Users</h6>
                    <a href="">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                        <tr class="text-dark">
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($sqlUsersResult) > 0) {
                            foreach ($sqlUsersResult

                            as $rowUsers) {
                            ?>
                        <tr>
                            <td><?php echo $rowUsers['userID']; ?></td>
                            <td><?php echo $rowUsers['name']; ?></td>
                            <td><?php echo ucfirst($rowUsers['location']); ?></td>
                            <td><?php echo $rowUsers['contact']; ?></td>
                            <td><?php echo $rowUsers['email']; ?></td>

                            <td>
                                <form action="userView.php" method="post">
                                    <input type="hidden" name="sellerID" value="<?php echo $rowUsers['userID'] ?>">
                                    <input type="submit" name="viewSeller" class="btn btn-sm btn-primary"
                                           value="Detail">
                                </form>
                            </td>
                        </tr>

                        <?php
                        }
                        } else {
                            ?>
                            <tr>
                                <td>No Data To Show</td>
                            </tr>
                            <?php

                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Recent Sales End -->

        <!-- Footer Start -->
        <div class="container-fluid pt-4 ">
            <div class="bg-light rounded-top">
                <div class="row">
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
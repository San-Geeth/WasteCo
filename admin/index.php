<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username'])) {
    header('Location:signin.php');
}

$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
$status = 'open';

#Show counts sales
$sqlSaleCount = "SELECT COUNT(sellID) FROM sellp";
$resultSaleCount = mysqli_query($con, $sqlSaleCount);
$rowSaleCount = mysqli_fetch_assoc($resultSaleCount);
$saleCount = $rowSaleCount['COUNT(sellID)'];

#Show counts sales - open
$sqlSaleCountOpen = "SELECT COUNT(sellID) FROM sellp WHERE `status`='" . $status . "'";
$resultSaleCountOpen = mysqli_query($con, $sqlSaleCountOpen);
$rowSaleCountOpen = mysqli_fetch_assoc($resultSaleCountOpen);
$saleCountOpen = $rowSaleCountOpen['COUNT(sellID)'];

#Show counts bids
$sqlBidCount = "SELECT COUNT(bidID) FROM bidp";
$resultBidCount = mysqli_query($con, $sqlBidCount);
$rowBidCount = mysqli_fetch_assoc($resultBidCount);
$bidCount = $rowBidCount['COUNT(bidID)'];

#Show counts bids - open
$sqlBidCountOpen = "SELECT COUNT(bidID) FROM bidp WHERE `status`='" . $status . "'";
$resultBidCountOpen = mysqli_query($con, $sqlBidCountOpen);
$rowBidCountOpen = mysqli_fetch_assoc($resultBidCountOpen);
$bidCountOpen = $rowBidCountOpen['COUNT(bidID)'];

#Show counts users
$sqlUserCount = "SELECT COUNT(userID) FROM user";
$resultUserCount = mysqli_query($con, $sqlUserCount);
$rowUserCount = mysqli_fetch_assoc($resultUserCount);
$userCount = $rowUserCount['COUNT(userID)'];

#recent listings
$sqlRecentListingsSale = "SELECT * FROM sellp LIMIT 10";
$sqlRecentListingsSaleResult = mysqli_query($con, $sqlRecentListingsSale);

#recent bids
$sqlRecentListingsBid = "SELECT * FROM bidp LIMIT 10";
$sqlRecentListingsBidResult = mysqli_query($con, $sqlRecentListingsBid);
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

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Listings</p>
                            <p class="mb-2 text-danger">Sales</p>
                            <h6 class="mb-0"><?php echo $saleCount ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Open Listings</p>
                            <p class="mb-2 text-danger">Sales</p>
                            <h6 class="mb-0"><?php echo $saleCountOpen ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Listings</p>
                            <p class="mb-2 text-danger">Auctions</p>
                            <h6 class="mb-0"><?php echo $bidCount ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Open Listings</p>
                            <p class="mb-2 text-danger">Auctions</p>
                            <h6 class="mb-0"><?php echo $bidCountOpen ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-user fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Users</p>
                            <h6 class="mb-0"><?php echo $userCount ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->

        <!-- Widgets Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <div class="h-100 bg-light rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Calender</h6>
                        </div>
                        <div id="calender"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Widgets End -->


        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Listings - Sales</h6>
                    <a href="sales.php">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                        <tr class="text-dark">
                            <th scope="col">ProductID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($sqlRecentListingsSaleResult) > 0) {
                            foreach ($sqlRecentListingsSaleResult

                            as $rowRecentListings) {
                            ?>
                        <tr>
                            <td><?php echo $rowRecentListings['sellID']; ?></td>
                            <td><?php echo $rowRecentListings['date']; ?></td>
                            <td><?php echo $rowRecentListings['title']; ?></td>
                            <td><?php echo $rowRecentListings['type']; ?></td>
                            <td><?php echo $rowRecentListings['sellerName']; ?></td>
                            <td><?php echo $rowRecentListings['qty']; ?></td>
                            <td><?php echo $rowRecentListings['price']; ?></td>
                            <td><?php echo ucfirst($rowRecentListings['status']); ?></td>
                            <td>
                                <form action="detailSale.php" method="post">
                                    <input type="hidden" name="pid" value="<?php echo $rowRecentListings['sellID'] ?>">
                                    <input type="submit" name="details" class="btn btn-sm btn-primary" value="Detail">
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

        <!-- Recent bids Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Listings - Auctions</h6>
                    <a href="auctions.php">Show All</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                        <tr class="text-dark">
                            <th scope="col">ProductID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Auctioneer Name</th>
                            <th scope="col">Start Price</th>
                            <th scope="col">Highest Bidder</th>
                            <th scope="col">Placed Bid</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($sqlRecentListingsBidResult) > 0) {
                            foreach ($sqlRecentListingsBidResult

                            as $rowRecentBids) {
                            ?>
                        <tr>
                            <td><?php echo $rowRecentBids['bidID']; ?></td>
                            <td><?php echo $rowRecentBids['date']; ?></td>
                            <td><?php echo $rowRecentBids['title']; ?></td>
                            <td><?php echo $rowRecentBids['type']; ?></td>
                            <td><?php echo $rowRecentBids['qty']; ?></td>
                            <td><?php echo $rowRecentBids['sellerName']; ?></td>
                            <td><?php echo $rowRecentBids['startP']; ?></td>
                            <td><?php echo $rowRecentBids['bidderName']; ?></td>
                            <td><?php echo $rowRecentBids['currentBid']; ?></td>
                            <td><?php echo $rowRecentBids['status']; ?></td>
                            <td>
                                <form action="detailBid.php" method="post">
                                    <input type="hidden" name="bid" value="<?php echo $rowRecentBids['bidID'] ?>">
                                    <input type="submit" name="detailsBid" class="btn btn-sm btn-primary"
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
        <!-- Recent bids End -->


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
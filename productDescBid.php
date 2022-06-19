<?php
session_start();
error_reporting(0);
require_once('sellComponent.php');
if (isset($_POST['addBid'])) {
    $id = ($_POST['bidID']);
    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    $sql = "SELECT * FROM bidp WHERE `bidID`='" . $id . "'";
    $query_run = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($query_run);
    $proID = $row[0];
    $title = $row[2];
    $category = $row[3];
    $qty = $row[4];
    $image = $row[5];
    $detail = $row[6];
    $location = $row[8];
    $seller = $row[10];
    $startprice = $row[11];
    $currentHighest = $row[12];
    $bidPlaced = $row[14];
    $sellerCon = $row[15];
    $contact = $row[16];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/"
          name="description">

    <!-- title -->
    <title>Product Details</title>

    <!-- favicon -->
    <link href="assets/img/logo1.png" rel="shortcut icon" type="image/png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link href="assets/css/all.min.css" rel="stylesheet">
    <!-- bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- owl carousel -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <!-- magnific popup -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- animate css -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- mean menu css -->
    <link href="assets/css/meanmenu.min.css" rel="stylesheet">
    <!-- main style -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- responsive -->
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>
<body>

<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<?php
include './templates/header.php';
include './templates/searcharea.php';
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Product Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img alt="" src="<?php echo "biddingImages/" . $image; ?>">
                </div>
            </div>
            <div class="col-md-7">

                <div class="single-product-content">
                    <h3><?php echo $title ?></h3>
                    <p class="single-product-pricing">
                        <span><?php echo $qty ?></span> <?php echo $startprice . ' (LKR)' ?></p>
                    <p><?php echo $detail ?></p>
                    <div class="single-product-form">
                        <form action="ActionSubmitBid.php" method="post">
                            <input value="<?php echo $currentHighest ?>" type="number" name="bidAmount"><br>
                            <input type="hidden" name="bidProductID" value="<?php echo $proID ?>">
                            <input type="submit" name="bidValue" value="Submit Bid">
                        </form>
                        <p><strong>Current Highest Bid: </strong><?php echo $currentHighest . ' LKR' ?></p>
                        <p><strong>Bid Placed By : </strong><?php echo $bidPlaced ?></p>
                        <p><strong>Category: </strong><?php echo ucfirst($category) ?></p>
                        <p><i class="fas fa-map-marker"> <?php echo $location . ' ' ?></i> <i class="fas fa-user">
                                By <?php echo $seller . ' ' ?></i> <i
                                    class="fas fa-phone">  <?php echo $sellerCon ?></i>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Recent</span> Items</h3>
                    <p>Recently Listed Items.</p>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php
            $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
            $sql = "SELECT * FROM sellp ORDER BY sellID DESC LIMIT 4";
            $query_run = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($query_run)) {
                $image = "productImages/" . $row['image'];
                $_SESSION['sellID'] = $row['sellID'];
                sellComponent($row['title'], $row['price'], $row['qty'], $image, $row['type'], $row['location'], $row['sellID']);
            }
            ?>
        </div>


    </div>
</div>
<!-- end more products -->

<?php
include "./templates/footer.php";
include "./templates/copyright.php";
?>

<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>
</html>
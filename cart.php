<?php
session_start();
require_once('sellComponent.php');
error_reporting(0);
if (empty($_SESSION['email'])) {
    header('Location:login.php');
}
if (isset($_POST['addtoWhish'])) {
//    print_r($_POST['listID']);
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "listID");
//        print_r($item_array_id);
        if (in_array($_POST['listID'], $item_array_id)) {
            echo "<Script>alert('Already in your wishlist')</Script>";
            echo "<Script>window.location='browseSale.php'</Script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'listID' => $_POST['listID']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    } else {
        $item_array = array(
            'listID' => $_POST['listID']
        );

        $_SESSION['cart'][0] = $item_array;
//        print_r($_SESSION['cart']);
    }
}

if (isset($_POST['delete'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['listID'] == $_GET['sellID']) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
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
    <title>Cart</title>

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
                    <p>Keep your favourites here</p>
                    <h1>WISHLIST</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-150">
                <div class="cart-table-wrap">
                    <table class="cart-table" id="mytable">
                        <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th class="product-remove"></th>
                            <th class="product-image text-dark">Product Image</th>
                            <th class="product-name text-dark">Name</th>
                            <th class="product-price text-dark">Price</th>
                            <th class="product-quantity text-dark">Quantity</th>
                            <th class="product-quantity text-dark">View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $listID = array_column($_SESSION['cart'], 'listID');
                        $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
                        $sql = "SELECT * FROM sellp";
                        $query_run = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            foreach ($listID as $sellID) {
                                if ($row['sellID'] == $sellID) {
                                    cartElement("productImages/" . $row['image'], $row['title'], $row['price'], $row['qty'], $row['sellID']);
                                }
                            }
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <!-- end cart -->


    <?php
    include './templates/footer.php';
    include './templates/copyright.php';
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
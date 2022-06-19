<?php
session_start();
error_reporting(0);
if (empty($_SESSION['email'])) {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Browse</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/logo1.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

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
                    <p>Do You Have Valuable Waste Items?</p>
                    <h1>Drop It Here</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->


<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2 style="text-transform: capitalize">List Your Item For an auction or for a sale.</h2>
                    <p>You can place your listing from here. after you successfully list your waste item, you can see it
                        on our webpage for sale items. As well as you can see more options from your user profile.</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="post" action="Actionlistsell.php" enctype="multipart/form-data">
                        <p>
                            <input type="text" placeholder="Title" name="title" id="title" required
                                   style="text-transform:capitalize">
                            <select name="type" id="type" required>
                                <option value="plastic">Plastic</option>
                                <option value="rubber">Rubber</option>
                                <option value="polythene">Polythene</option>
                                <option value="wood">Wood</option>
                                <option value="metal">Metal</option>
                                <option value="electronic">Electronic</option>
                                <option value="glass">Glass</option>
                                <option value="textile">Textile</option>
                                <option value="other">Other</option>
                            </select>
                        </p>
                        <p>
                            <input type="text" placeholder="Quantity" name="qty" id="qty">
                            <select name="qtyType" id="qtyType" required>
                                <option value="Kg">Kg</option>
                                <option value="Pieces">Pieces</option>
                            </select>
                        </p>
                        <p>
                            <input type="text" placeholder="Price" name="price" id="price"><br>
                            <span style="color: gray">Ex: 100/Piece, 100000, Negotiable</span>
                        </p>
                        <p>
                            <input type="file" name="image" class="form-control" accept="productImages/*">
                        </p>
                        <p><textarea name="details" id="details" cols="30" rows="10"
                                     placeholder="Description"></textarea></p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw"/>
                        <p><input type="submit" name="addSell" id="addSell" value="Submit"
                                  onsubmit="return confirm('Are you sure you want to list this item?');"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Office Address</h4>
                        <p>44/2, St. Anthony's Road <br> Colombo 03. <br> Sri Lanka</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Open Hours</h4>
                        <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +94 70 219 6566 <br> Email: wasteco@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->


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
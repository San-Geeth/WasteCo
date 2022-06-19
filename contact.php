<?php
session_start();
error_reporting(0);
$email = $_SESSION['email'];
$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
$sql = "SELECT * FROM `user` WHERE `email`='" . $email . "'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$phone = $row['contact'];
$action1 = false;
$action2 = false;


if ($_SESSION['email']) {
    if (isset($_POST['submitMessage'])) {
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if ($subject == ' ' || $subject == null) {
            echo "<script>alert('Please enter message')</script>";
        } else {
            $action1 = true;
        }

        if ($message == ' ' || $message == null) {
            echo "<script>alert('Please enter message')</script>";
        } else {
            $action2 = true;
        }

        if ($action1 && $action2) {
            $sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `subject`, `message`) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $subject . "', '" . $message . "' )";
            $query_run = mysqli_query($con, $sql);
        }
    }

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
    <title>Contact</title>

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
include './templates/contacttop.php';
?>
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Have you any question?</h2>
                    <p>Please send your messages to us. We always here to help you as we can. Within 24 hrs, we will get
                        back into you.</p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="post" id="fruitkha-contact" action="#">
                        <p>
                            <input type="text" placeholder="Name" name="name" id="name" value="<?php echo $name ?>">
                            <input type="email" placeholder="Email" name="email" id="email"
                                   value="<?php echo $email ?>">
                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" name="phone" id="phone" value="<?php echo $phone ?>">
                            <input type="text" placeholder="Subject" name="subject" id="subject">
                        </p>
                        <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                        </p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw"/>
                        <p><input type="submit" value="Submit" name="submitMessage"></p>
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

<?php
include './templates/contactlocation.php';
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
<!-- form validation js -->
<script src="assets/js/form-validate.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Go Green</title>

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

<style>
    .button {
        background-color: #F28123;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

<body>

<!--PreLoader-->

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
                    <p>Do You Want To Know About Future?</p>
                    <h1>Predict waste Usage</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- prediction form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Want to know about future wastage?</h2>

                </div>
                <div id="form_status"></div>
                <div class="contact-form">

                    <form method="POST">

                        <p>Enter Date</p>
                        <input type="date" name="first" class="form-control" required>
                        <br>
                        <p>Select waste type</p>

                        <select name="second" class="form-control" required>
                            <option value="1">Plastic</option>
                            <option value="2">Rubber</option>
                            <option value="3">Polythene</option>
                            <option value="4">Wood</option>
                            <option value="5">Glass</option>
                            <option value="6">Paper</option>
                        </select>
                        <br>
                        <input type="submit" name="add" class="button" value="Predict"></input>


                    </form>


                </div>
            </div>


            <?php
            if (isset($_POST['add'])) {
                $first = $_POST['first'];
                $first = date("m/d/Y", strtotime($first));

                $second = $_POST['second'];


                $output = shell_exec("C:/Python310/python.exe C:/xampp\htdocs/ecom/Php_Integrated.py \"$first\" \"$second\" ");
                echo "<pre>";
                echo "</br>";
// print_r($output);
                echo "</pre>";

            } ?>


            <!--prediction result-->
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h5>Date: <?php echo "$first"; ?> </h5>
                    </div>
                    <div class="contact-form-box">
                        <h5>Waste Type: <?php
                            if ($second == 1)
                                $Load_Type = "Plastic";

                            elseif ($second == 2)
                                $Load_Type = "Rubber";

                            elseif ($second == 3)
                                $Load_Type = "Polythene";

                            elseif ($second == 4)
                                $Load_Type = "Wood";

                            elseif ($second == 5)
                                $Load_Type = "Glass";

                            elseif ($second == 6)
                                $Load_Type = "Paper";

                            echo "$Load_Type"; ?>   </h5>
                    </div>
                    <div class="contact-form-box">
                        <?php
                        $rounded = round($output / 12);
                        ?>
                        <h5>Amount: <?php echo "$rounded" . " Tons"; ?> </h5>
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
<!-- form validation js -->
<script src="assets/js/form-validate.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>
</html>
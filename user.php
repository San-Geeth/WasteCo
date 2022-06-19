<?php
session_start();
error_reporting(0);
if (empty($_SESSION['email'])) {
    header('Location:login.php');
} else {
    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    $email = $_SESSION['email'];
    $sql = $sql = "SELECT * FROM `user` WHERE `email`='" . $email . "'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($result);
    $fullname = $row[1];
    $strarray = explode(" ", $row[1]);
    $firstname = $strarray[0];
    $secondname = $strarray[1];
    $location = ucfirst($row[3]);
    $contact = $row[4];

    $sql2 = "SELECT COUNT(sellID) FROM `sellp` WHERE `email`='" . $email . "'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $size = $row2['COUNT(sellID)'];

    $sql3 = "SELECT * FROM sellp WHERE `email`='" . $email . "'";
    $result3 = mysqli_query($con, $sql3);

    $sql4 = "SELECT * FROM bidp WHERE `email`='" . $email . "'";
    $result4 = mysqli_query($con, $sql4);
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
    <title>WasteCo</title>

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
    <!-- user profile-->
    <link rel="stylesheet" href="assets/css/user.css">


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
                    <h1><?php echo $fullname ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<div class="main-content pt-100">
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First
                                                name</label>
                                            <input type="text" id="input-first-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="First name" value="<?php echo $firstname ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last
                                                name</label>
                                            <input type="text" id="input-last-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Last name"
                                                   value="<?php echo $secondname ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-email">Email
                                                Address</label>
                                            <input type="email" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Email" value="<?php echo $email ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-location">Location</label>
                                            <input type="text" id="input-loaction"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Location"
                                                   value="<?php echo $location ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label"
                                                   for="input-contact">Contact</label>
                                            <input type="text" id="input-contact"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Contact" value="<?php echo $contact ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content pt-100">
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Listed Items (Sale)</h3>
                            </div>
                            <div class="col-4 text-right">
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Item ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php
                                                if (mysqli_num_rows($result3) > 0) {
                                                foreach ($result3

                                                as $row3) {
                                                ?>
                                            <tr>
                                                <td><?php echo $row3['sellID']; ?></td>
                                                <td><?php echo ucfirst($row3['type']); ?></td>
                                                <td><?php echo $row3['title']; ?></td>
                                                <td><?php echo $row3['qty']; ?></td>
                                                <td><?php echo $row3['price']; ?></td>
                                                <td>
                                                    <form action="ActionRemoveSale.php" method="post">
                                                        <?php if ($row3['status'] == 'open') { ?>
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo $row3['sellID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                    name="close"
                                                                    onclick="return confirm('Are you sure you want to close this listing?');">
                                                                Close
                                                            </button><?php } else { ?>
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo $row3['sellID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                    name="open"
                                                                    onclick="return confirm('Are you sure you want to reopen this listing?');">
                                                                Open
                                                            </button> <?php } ?>

                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="ActionItemDelete.php" method="post">
                                                        <input type="hidden" name="id"
                                                               value="<?php echo $row3['sellID']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                                name="deleteList"
                                                                onclick="return confirm('Are you sure you want to delete this listing?');">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                                <!--                                                    <td><a href="#!" class="btn btn-sm btn-primary">Remove</a></td>-->

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
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-content pt-100">
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Listed Items (Bid)</h3>
                            </div>
                            <div class="col-4 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Item ID</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Start Price</th>
                                                <th scope="col">Highest Bid</th>
                                                <th scope="col">Bid Placed By</th>
                                                <th scope="col">Bidder Contact</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php
                                                if (mysqli_num_rows($result4) > 0) {
                                                foreach ($result4

                                                as $row4) {
                                                ?>
                                            <tr>
                                                <td><?php echo $row4['bidID']; ?></td>
                                                <td><?php echo ucfirst($row4['type']); ?></td>
                                                <td><?php echo $row4['title']; ?></td>
                                                <td><?php echo $row4['qty']; ?></td>
                                                <td><?php echo $row4['startP']; ?></td>
                                                <td><?php echo $row4['currentBid']; ?></td>
                                                <td><?php echo $row4['bidderName']; ?></td>
                                                <td><?php echo $row4['bidderContact']; ?></td>
                                                <!--                                                <td>-->
                                                <?php //echo ucfirst($row4['status']); ?><!--</td>-->
                                                <td>
                                                    <form action="ActionRemoveBid.php" method="post">
                                                        <?php if ($row4['status'] == 'open') { ?>
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo $row4['bidID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                    name="close"
                                                                    onclick="return confirm('Are you sure you want to close this auction?');">
                                                                Close
                                                            </button><?php } else { ?>
                                                            <input type="hidden" name="id"
                                                                   value="<?php echo $row4['bidID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-primary"
                                                                    name="open"
                                                                    onclick="return confirm('Are you sure you want to reopen this auction?');">
                                                                Open
                                                            </button> <?php } ?>
                                                    </form>
                                                    <br>
                                                </td>
                                                <td>
                                                    <form action="ActionItemDelete.php" method="post">
                                                        <input type="hidden" name="bid"
                                                               value="<?php echo $row4['bidID']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-primary"
                                                                name="deleteBid"
                                                                onclick="return confirm('Are you sure you want to delete this listing?');">
                                                            Delete
                                                        </button>
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
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
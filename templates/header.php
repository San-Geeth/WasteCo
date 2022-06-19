<!-- header -->
<?php
session_start();
error_reporting(0);
$email = $_SESSION['email'];
$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
$sql = "SELECT name FROM `user` WHERE `email`='" . $email . "'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_row($result);
$name = $row[0];
?>


<div class=" top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="index.php">
                            <img src="assets/img/logo1.png" alt="" height="50px" width="50px">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="index.php">Home</a></li>
                            <li><a href="#">Browse</a>
                                <ul class="sub-menu">
                                    <li><a href="browseSale.php">Sale Items</a></li>
                                    <li><a href="browseBid.php">Bidding Items</a></li>
                                </ul>
                            </li>
                            <li><a href="#">List Item</a>
                                <ul class="sub-menu">
                                    <li><a href="listitem.php">For Sell</a></li>
                                    <li><a href="listbid.php">For Auction</a></li>
                                </ul>
                            </li>

                            <li><a href="about.php">About</a></li>

                            <li><a href="contact.php">Contact</a></li>

                            <li><a href="http://localhost:8501/">Go Green</a></li>

                            <li>
                                <div class="header-icons">

                                    <?php
                                    if ($_SESSION['email']){
                                    ?>
                            <li><a class="shopping-cart" href="cart.php"><i class="fas fa-heart"></i></a></li>
                            <?php }
                            ?>
                            <li><a class="shopping-cart" href="#"><i class="fas fa-user"></i>
                                    <ul class="sub-menu pt-0">
                                        <li><a href="user.php"><?php echo $name ?></a></li>
                                        <?php if (empty($_SESSION['email'])) { ?>
                                            <form action="login.php">
                                                <button type="submit" name="login"
                                                        class="btn btn-primary" id="login">
                                                    Login
                                                </button>
                                            </form>
                                        <?php } else { ?>
                                            <form action="../Actionlogout.php" method="post"
                                                  onsubmit="return confirm('Are you sure you want to logout?');">
                                                <button type="submit" name="logout"
                                                        class="btn btn-primary" id="logout">
                                                    Logout
                                                </button>
                                            </form>
                                        <?php } ?>
                                    </ul>
                                </a></li>


                </div>
                </li>

                </ul>
                </nav>
                <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                <div class="mobile-menu"></div>
                <!-- menu end -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- end header -->

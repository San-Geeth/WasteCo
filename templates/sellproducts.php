<!-- products -->
<?php
session_start();
require_once('sellComponent.php');
?>

<div class="product-section mt-80 mb-150">

    <div class="container">
        <div class="container">
            <form action="" method="post">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1"
                               class="form-control border-0 bg-light" name="itemSearch">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary" name="search"><i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".plastic">Plastic</li>
                        <li data-filter=".rubber">Rubber</li>
                        <li data-filter=".wood">Wood</li>
                        <li data-filter=".polythene">Polythene</li>
                        <li data-filter=".metal">Metal</li>
                        <li data-filter=".electronic">Electronic</li>
                        <li data-filter=".glass">Glass</li>
                        <li data-filter=".textile">Textile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php
            if (isset($_POST['search'])) {
                $name = $_POST['itemSearch'];
                $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
                $sql = "SELECT * FROM sellp WHERE title LIKE '$name%'";
                $query_run = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if ($row['status'] == 'open') {
                        $image = "productImages/" . $row['image'];
                        $_SESSION['sellID'] = $row['sellID'];
                        sellComponent($row['title'], $row['price'], $row['qty'], $image, $row['type'], $row['location'], $row['sellID']);
                    }

                }
            } else {
                $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
                $sql = "SELECT * FROM sellp ORDER BY sellID DESC ";
                $query_run = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if ($row['status'] == 'open') {
                        $image = "productImages/" . $row['image'];
                        $_SESSION['sellID'] = $row['sellID'];
                        sellComponent($row['title'], $row['price'], $row['qty'], $image, $row['type'], $row['location'], $row['sellID']);
                    }

                }
            }
            ?>
        </div>

    </div>
</div>
<!-- end products -->
<!-- product section -->
<?php
require_once('sellComponent.php');
?>
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
            $sql = "SELECT * FROM sellp ORDER BY sellID DESC LIMIT 4 ";
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
<!-- end product section -->
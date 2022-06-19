<?php

function bidComponent($productName, $productPrice, $productAmount, $productImage, $productType, $productLocation, $prodcutID)
{
    $element = "
        <div class=\"col-lg-3 col-md-6 text-center $productType\">
                <form action=\"productDescBid.php\" method=\"post\">
                    <div class=\"single-product-item\">
                        <div class=\"product-image\">
                            <img src=\"$productImage\" alt=\"\">
                        </div>
                        <h3>$productName</h3>
                        <p class=\"product-price\"><span>$productLocation</span></p>
                        <h4 class=\"product-price\"> $productPrice</h4>
                        <h6 class=\"product-price\"> $productAmount </h6>
                        <input type='hidden' name='bidID'  value='$prodcutID'>
                        <input class=\"button\" type=\"submit\" name=\"addBid\" value=\"View Details\">
                    </div>
                </form>
            </div>
    ";

    echo $element;
}

?>
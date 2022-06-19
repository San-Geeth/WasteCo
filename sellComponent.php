<?php

function sellComponent($productName, $productPrice, $productAmount, $productImage, $productType, $productLocation, $prodcutID)
{
    $element = "
        <div class=\"col-lg-3 col-md-6 text-center $productType\">
                <form action=\"productDescSale.php\" method=\"post\">
                    <div class=\"single-product-item\">
                        <div class=\"product-image\">
                           <img src=\"$productImage\" alt=\"\">
                        </div>
                        <h3>$productName</h3>
                        <p class=\"product-price\"><span>$productLocation</span></p>
                        <h4 class=\"product-price\"> $productPrice</h4>
                        <h6 class=\"product-price\"> $productAmount </h6>
                        <input type='hidden' name='sellID' value='$prodcutID'>              
                        <input class=\"button\" type=\"submit\" name=\"addlist\" value=\"View Details\">
                    </div>
                </form>
            </div>
    ";

    echo $element;
}

function cartElement($productImage, $productName, $productPrice, $productQty, $productID)
{
    $element = "
<tr class=\"table-body-row\">
                            <td class=\"product-remove\"><a href=\"#\"><i class=\"far fa-window-close\"></i></a></td>
<td class=\"product-image\"><img alt=\"\" src=\"$productImage\"></td>
                            <td class=\"product-name\">$productName</td>
                            <td class=\"product-price\">$productPrice</td>
                            <td class=\"product-quantity\">$productQty</td>
                            <td class=\"product-quantity\"><form action='productDescSale.php' method='post'>
                            <input type='hidden' name='sellID' value='$productID'>
                            <button type=\"submit\" class=\"btn btn-sm btn-primary\"
                                                                name=\"addlist\">View
                                                        </button>
</form><hr><form action='cart.php?action=delete&sellID=$productID' method='post'>
<input type='hidden' name='sellID' value='$productID'>
<button type=\"submit\" class=\"btn btn-sm btn-primary\"
                                                                name=\"delete\">Delete
                                                        </button>
</form></td>
                            
</tr>
                       ";


    echo $element;
}

<?php
function productComponent($productID, $productType, $productTitle, $productQuantity, $productPrice)
{
    $element = "
                 <tr>
                      <td>$productID</td>
                      <td>$productType</td>
                      <td>$productTitle</td>
                      <td>$productQuantity</td>
                      <td>$productPrice</td>
                      <td><a href=\"#!\" class=\"btn btn-sm btn-primary\">Remove</a></td></tr>
    ";

    echo $element;
}


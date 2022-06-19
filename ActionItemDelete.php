<?php
$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
if (isset($_POST['deleteList'])) {
    $itemId = $_POST['id'];
    $sql = "DELETE FROM sellp WHERE `sellID`='" . $itemId . "'";
    $query_run = mysqli_query($con, $sql);
    if ($query_run) {
        echo "<script>alert('Item Deleted Successfully!')</script>";
        header('Location: user.php');
    }

}
if (isset($_POST['deleteBid'])) {
    $itemId = $_POST['bid'];
    $sql = "DELETE FROM bidp WHERE `bidID`='" . $itemId . "'";
    $query_run = mysqli_query($con, $sql);
    if ($query_run) {
        echo "<script>alert('Item Deleted Successfully!')</script>";
        header('Location: user.php');
    }
}

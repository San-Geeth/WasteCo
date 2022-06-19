<?php
session_start();
$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
error_reporting(0);
if (empty($_SESSION['email'])) {
    header('Location:login.php');
} else {
    if (isset($_POST['bidValue'])) {
        $bidid = $_POST['bidProductID'];
        $bidVal = $_POST['bidAmount'];
        $email = $_SESSION['email'];
        $sql1 = "SELECT userID,name,location,contact FROM user WHERE `email`='" . $email . "'";
        $result1 = mysqli_query($con, $sql1);
        $row = mysqli_fetch_row($result1);

        $sql2 = "UPDATE bidp SET `currentBid`='" . $bidVal . "',`bidderID`='" . $row[0] . "',`bidderName`='" . $row[1] . "',`bidderContact`='" . $row[3] . "',`bidderLocation`='" . $row[2] . "' WHERE `bidID`='" . $bidid . "' ";
        $result1 = mysqli_query($con, $sql2);
        header('Location:browseBid.php');
    }


}
<?php
if (isset($_POST['close'])) {
    $id = $_POST['id'];
    $status = 'closed';
    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    $sql = "UPDATE sellp SET `status`='" . $status . "' WHERE `sellID`='" . $id . "' ";
    $query_run = mysqli_query($con, $sql);
    header('Location: user.php');
}

if (isset($_POST['open'])) {
    $id = $_POST['id'];
    $status = 'open';
    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    $sql = "UPDATE sellp SET `status`='" . $status . "' WHERE `sellID`='" . $id . "' ";
    $query_run = mysqli_query($con, $sql);
    header('Location: user.php');

}
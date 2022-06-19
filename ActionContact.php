<?php

if (isset($_POST['submitMessage'])) {
    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `subject`, `message`) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $subject . "', '" . $message . "' )";
    $query_run = mysqli_query($con, $sql);
}

?>

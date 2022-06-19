<?php
session_start();

if (isset($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $valid = false;

    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    if (!$con) {
        die("Cannot connect to DB server");
    }
    $sql = "SELECT username,password FROM `admin` WHERE `username`='" . $username . "' and `password`='" . $password . "'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($result);

    if (mysqli_num_rows($result) > 0) {
        $valid = true;
    }
    mysqli_close($con);

    if ($valid) {
        $_SESSION["username"] = $username;
        header('Location:index.php');
    } else {
        echo "<script>alert('Please enter a correct username and password!')</script> ";
    }
}

if (isset($_POST['logoutAdmin'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location:signin.php');
}

<?php
session_start();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $valid = false;

    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    if (!$con) {
        die("Cannot connect to DB server");
    }
    $sql = "SELECT email,password FROM `user` WHERE `email`='" . $email . "' and `password`='" . $password . "'";
    $sql2 = "SELECT uid,name FROM `user` WHERE `email`='" . $email . "'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($result);
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_num_rows($result) > 0) {
        $valid = true;
    }
    mysqli_close($con);

    if ($valid) {
        $_SESSION["email"] = $email;
        header('Location:index.php');
    } else {
        echo "<script>alert('Please enter a correct username and password!')</script> ";
        echo "<script>window.location = 'login.php'</script> ";
    }
}

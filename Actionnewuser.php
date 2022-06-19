<?php


if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $name = ucfirst($firstname) . ' ' . ucfirst($lastname);

    $con = mysqli_connect("localhost:3306", "root", "", "wasteco");
    if (!$con) {
        die("Cannot connect to DB server");
    }
    if ($pwd == $cpwd) {
        $sql = "INSERT INTO `USER` (`name`, `password`, `location`, `contact`, `email`) VALUES ('" . $name . "', '" . $pwd . "', '" . $location . "', '" . $contact . "', '" . $email . "');";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header('Location:login.php');
    } else {
        echo "<script>alert('Please Check Passowrds!')</script>";
        echo "<script>window.location='login.php'</script>";
    }

}




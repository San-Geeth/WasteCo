<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "wasteco";

$conn = mysqli_connect($server, $username, $password, $database);


if (!$conn) {
    echo "<script>('Connection Failed!')</script>";
}

?>


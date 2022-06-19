<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('Location:index.php');
}
?>

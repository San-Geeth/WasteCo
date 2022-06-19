<?php

session_start();

$con = mysqli_connect("localhost:3306", "root", "", "wasteco");
if (!$con) {
    die("Cannot connect to DB server");
}

if (isset($_POST['addBid'])) {
    $email = $_SESSION['email'];
    $title = ucwords($_POST['title']);
    $type = $_POST['type'];
    $qty = $_POST['qty'] . ' ' . $_POST['qtyType'];
    $price = $_POST['bidStart'];
    $detail = $_POST['details'];
    $image = $_FILES['image']['name'];
    $status = 'open';
    date_default_timezone_get();
    $date = date('Y-m-d');

    $exts = array('png', 'jpg', 'jpeg');
    $filename = $_FILES['image']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($file_ext, $exts)) {
        echo "<script type='text/javascript'>alert('Upload only file types with JPG, PNG, and JPEG');</script>";;
    } else {
        if (file_exists("biddingImages/" . $_FILES['image']['name'])) {
            $filename = $_FILES['image']['name'];
            header('Location:listitem.php');
            echo "<script type='text/javascript'>alert('Image Already exists!');</script>";

        } else {
            $sql2 = "SELECT userID,name,location, contact FROM user WHERE `email`='" . $email . "'";
            $result2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_row($result2);
            $sql = "INSERT INTO `bidp` (`date`,`title`, `type`, `qty` , `image`, `detail`, `email`, `location`,`sellerID`, `sellerName`, `startP`, `contact` , `status`) VALUES ('" . $date . "','" . $title . "', '" . $type . "', '" . $qty . "' , '" . $image . "', '" . $detail . "', '" . $email . "' , '" . ucfirst($row[2]) . "', '" . $row[0] . "', '" . $row[1] . "' , '" . $price . "', '" . $row[3] . "', '" . $status . "')";
            $query_run = mysqli_query($con, $sql);
            if ($query_run) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "biddingImages/" . $_FILES["image"]["name"]);
                echo "<script>alert('Uploaded succesfully');</script>";
                echo "<script>location.href='browseBid.php'</script>";
//                header('Location:browseBid.php');
            }

        }

    }

}
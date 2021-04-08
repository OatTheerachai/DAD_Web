<?php
include "../../../config/connect.php";

if (isset($_POST['liveURL'])) {
    $liveurl = $_POST['liveURL'];
    $sql = "UPDATE ip_address SET liveURL = '$liveurl'";
    mysqli_query($conn, $sql);
}

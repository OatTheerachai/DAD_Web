<?php
include("../../config/connect.php");

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];

    if (isset($_POST['actid'])) {
        $actid = $_POST['actid'];
        $sql = "INSERT INTO admin_log (user_id, activity_id) VALUES ($uid, $actid)";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            mysqli_close($conn);
        }
    }
}

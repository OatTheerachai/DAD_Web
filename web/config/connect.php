<?php

// $servername = "127.0.0.1";
// $username = "2021_dad";
// $password = "uvqtBPf33Gg6SCJQ";
// $dbname = "2021_dad";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


// $urlheader = "http://localhost:8080/Github/Webconfig/New_project/frontend/";
// $urlheader = "http://localhost/frontend/";
$urlheader = "https://cloud.tabsoft.co.th/pj/dad/web/";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

// Check connection
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

<?php

//$dbServername = "studentmysql.miun.se";
//$dbUsername = "mete2000";
//$dbPassword = "m8w2c0ni";
//$dbname = "mete2000";



$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "sca";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

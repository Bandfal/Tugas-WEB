<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass= "";
$dbname = "tugas_web";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully!";

?>
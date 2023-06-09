<?php
include "connect.php";

$id = $_GET['id'];

$data = mysqli_query($connect, "DELETE FROM siswa WHERE id='$id'");

header("Location: lihat_data.php")

?>
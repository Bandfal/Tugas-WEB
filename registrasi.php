<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_login.css">
    <title>Registrasi</title>
</head>
<body>
    <div class="login-container">
        <h2>Registrasi</h2>
        <form action="registrasi.php" method="post">
            <label for="email">Masukkan Email :</label>
            <input type="text" name="email" placeholder="Email">
            <br>
            <label for="username">Masukkan Username :</label>
            <input type="text" name="username" placeholder="Username">
            <br>
            <label for="password">Masukkan Password :</label>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Sudah punya akun? Yuk <a href="login.php">Login</a></p>
    </div>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    include 'connect.php';

    // $data = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id_user'");

    // while ($data_siswa = mysqli_fetch_array($data)){
    //     $id_user = $data_siswa['id_user'];
    //     $email = $data_siswa['email'];
    //     $username = $data_siswa['username'];
    //     $password = $data_siswa['password'];

    // }

    $data = mysqli_query($connect, "INSERT INTO user VALUES('', '$email', '$username', '$password')");
    header("Location: lihat_data.php"); 
  
    if (!isset($_POST['email']) && !isset($_POST['username']) && !isset($_POST['password'])) {
        echo "Silahkan isi data terlebih dahulu";
    }
} 

?>
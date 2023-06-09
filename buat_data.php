<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <title>Buat Data</title>
</head>
<body>
    <form class="form-input" action="buat_data.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nama_siswa">Masukkan Nama Siswa: </label>
        </div>
        <div>
            <input type="text" name="nama_siswa">
        </div>
        <div>
            <label for="foto">Masukkan Foto Siswa: </label>
        </div>
        <div>
            <input type="file" name="foto">
        </div>
        <div>
            <label for="kelas_siswa">Masukkan Kelas Siswa: </label>
        </div>
        <div>
            <select name="kelas_siswa">
                <option value="1">XI RPL 1</option>
                <option value="2">XI RPL 2</option>
                <option value="3">XI MM 1</option>
                <option value="4">XI MM 2</option>
                <option value="5">XI TKJ 1</option>
                <option value="6">XI TKJ 2</option>
            </select>
        </div>
        <div>
            <label for="jurusan_siswa">Masukkan Jurusan Siswa: </label>
        </div>
        <div>
            <select name="jurusan_siswa">
                <option value="1">Rekayasa Perangkat Lunak</option>
                <option value="2">Multimedia</option>
                <option value="3">Teknik Komputer dan Jaringan</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $folder = "./asset/";
    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp_foto, $folder.  $nama_foto);


    $nama_siswa = $_POST['nama_siswa'];
    // $foto = $_POST['foto'];
    $kelas_siswa = $_POST['kelas_siswa'];
    $jurusan_siswa = $_POST['jurusan_siswa'];
    $submit = $_POST['submit'];
    
    include "connect.php";
    
    // $data = mysqli_query($connect, "SELECT * FROM siswa WHERE id = '$id'");

    // while ($data_siswa = mysqli_fetch_array($data)){
    //     $id = $data_siswa['id'];
    //     $nama_siswa = $data_siswa['nama_siswa'];
    //     $foto = $data_siswa['foto'];
    //     $kelas_siswa = $data_siswa['kelas_siswa'];
    //     $jurusan_siswa = $data_siswa['jurusan_siswa'];
    // }

    // var_dump($_POST['foto']);
    
    $data = mysqli_query($connect, 
                        "INSERT INTO siswa VALUES
                        ('', '$nama_siswa', '$nama_foto', 
                        '$kelas_siswa', '$jurusan_siswa', '$submit')");

    // var_dump($_POST);
    // var_dump($_FILES);
    header("Location: lihat_data.php");
}

// function upload_file() {
//     $namafile = ['foto'];

// }
?>
<?php
include "connect.php";

$id = $_GET['id']; 

$data = mysqli_query($connect, "SELECT * FROM siswa a 
                                INNER JOIN kelas b ON a.kelas_siswa = b.id_kelas 
                                INNER JOIN jurusan c ON a.jurusan_siswa = c.id_jurusan 
                                WHERE id='$id'");
// $data = mysqli_query($connect, "SELECT * FROM siswa WHERE id='$id'");

while ($data_siswa = mysqli_fetch_array($data)) {
    $id = $data_siswa['id'];
    $nama_siswa = $data_siswa['nama_siswa'];
    $foto = $data_siswa['foto'];
    $kelas_siswa = $data_siswa['nama_kelas'];
    $jurusan_siswa = $data_siswa['nama_jurusan'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style_detail.css">
</head>
<body>
    <div class="container">
        <div>
            <label for="nama_siswa">Masukkan Nama Siswa: </label>
            <p><?php echo $nama_siswa ?></p>
        </div>
        <div>
            <label for="foto">Masukkan Foto Siswa: </label>
            <img src="asset/<?php echo $foto; ?>" alt="" width="1000px">
            
        </div>
        <div>
            <label for="kelas_siswa">Masukkan Kelas Siswa: </label>
            <p><?php echo $kelas_siswa ?></p>
        </div>
        <div>
            <label for="jurusan_siswa">Masukkan Jurusan Siswa: </label>
            <p><?php echo $jurusan_siswa ?></p>
        </div>
        <div>
            <a href="lihat_data.php" class="tombol-kembali">Kembali</a>
        </div>
        <td><input type="hidden" name="id" value=<?php echo $id;?>></td>
    </div>
</body>
</html>
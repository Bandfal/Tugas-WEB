<?php
include 'connect.php';

$data = mysqli_query($connect, "SELECT * FROM siswa a 
                                INNER JOIN kelas b ON a.kelas_siswa = b.id_kelas 
                                INNER JOIN jurusan c ON a.jurusan_siswa = c.id_jurusan 
                                ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS WEB</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <a href="buat_data.php" class="tombol-buat">Buat Data Baru</a>
        <a href="login.php" class="tombol-out">Log Out</a>
    </div>
    <div>
        <table border="0">
            <tr class="">
                <th>Nama Siswa</th>
                <th>Foto Siswa</th>
                <th>Kelas Siswa</th>
                <th>Jurusan Siswa</th>
                <th colspan="3">Aksi</th>
            </tr>
            <?php
            while($data_siswa = mysqli_fetch_array($data)) {
                echo "<tr>";
                echo "<td>".$data_siswa['nama_siswa']."</td>";
                echo "<td><img src='asset/".$data_siswa['foto']."' width='200px' height='200px'></td>";
                echo "<td>".$data_siswa['nama_kelas']."</td>";
                echo "<td>".$data_siswa['nama_jurusan']."</td>";
                echo "<td class='tombol'><a href='detail_data.php?id=$data_siswa[id],' class='tombol-detail'>Detail</td>";
                echo "<td class='tombol'><a href='edit_data.php?id=$data_siswa[id]' class='tombol-edit'>Edit</td>";
                echo "<td class='tombol'><a href='hapus_data.php?id=$data_siswa[id]' class='tombol-hapus'>Hapus</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
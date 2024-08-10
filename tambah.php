<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mhs (nama, npm, email, jurusan, alamat) VALUES ('$nama', '$npm', '$email', '$jurusan', '$alamat')";
    
    if ($conn->query($sql) === TRUE) {
        echo "data baru berhasil di tambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form method="post" action="tambah.php">
        Nama: <input type="text" name="nama" required><br><br>
        NPM: <input type="text" name="npm" required><br><br>
        Email: <input type="text" name="email" required><br><br>
        Jurusan: <input type="text" name="jurusan" required><br><br>
        Alamat: <input type="text" name="alamat" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>

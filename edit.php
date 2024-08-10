<?php
include 'koneksi.php';

// Periksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE mhs SET nama='$nama', npm='$npm', email='$email', jurusan='$jurusan', alamat='$alamat' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "data berhasil di perbaharui";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Ambil data mahasiswa berdasarkan ID
    $sql = "SELECT * FROM mhs WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found with ID = $id";
        exit();
    }
} else {
    echo "ID not provided";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>
        NPM: <input type="text" name="npm" value="<?php echo $row['npm']; ?>" required><br><br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="index.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>

<?php
    include "koneksi.php";
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $sql = "SELECT * FROM mhs WHERE nama LIKE '%$search%' OR npm LIKE '%$search%' OR email LIKE '%$search%' OR jurusan LIKE '%$search%' OR alamat LIKE '%$search%'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <a href="tambah.php">Tambah Mahasiswa</a>
    <br><br>
    
    <!-- Form Pencarian -->
    <form method="post" action="">
        <input type="text" name="search" placeholder="Cari Mahasiswa..." value="<?php echo $search; ?>">
        <input type="submit" value="Cari">
    </form>
    <br>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["npm"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["jurusan"] . "</td>
                        <td>" . $row["alamat"] . "</td>
                        <td>
                            <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | 
                            <a href='hapus.php?id=" . $row["id"] . "'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

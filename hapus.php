<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM mhs WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "data berhasil di hapus";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: index.php");
exit();
?>

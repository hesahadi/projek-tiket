<?php
$id = $_GET['id'];

include '../koneksi.php';

$sql = "DELETE FROM pemesanan WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location:data_pemesanan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php

include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$b_tamu = $_POST['b_tamu'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$festival = $_POST['festival'];
$vip = $_POST['vip'];



$sql = "UPDATE konser SET nama='$nama', b_tamu='$b_tamu', tempat='$tempat', tanggal='$tanggal', waktu='$waktu', jumlah_tiket='$jumlah_tiket', festival='$festival', vip='$vip' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location:data_konser.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
$id = $_GET['id'];

include '../koneksi.php';

// Ambil nama file foto dari database
$sql = "SELECT foto FROM konser WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $foto = $row['foto'];

    // Hapus file foto dari direktori server
    if (file_exists($foto)) {
        unlink($foto);
    }
    
    // Hapus data konser dari database
    $sql = "DELETE FROM konser WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location:data_konser.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No such concert found";
}

$conn->close();
?>

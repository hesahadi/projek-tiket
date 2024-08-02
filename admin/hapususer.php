<?php
$id = $_GET['id'];

include '../koneksi.php';

$sql = "DELETE FROM user WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location:user.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php
include '../koneksi.php';


$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "UPDATE user set username='$username', email='$email', password='$password' where id=$id";

if ($conn->query($sql) === TRUE) {
    header("location:user.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

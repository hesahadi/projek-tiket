<?php
include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query_check = "SELECT * FROM user WHERE email = '$email'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    header("location: register.html");
} else {
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password') ";

    if (mysqli_query($conn,$sql)) {
        header("location: login.php");
    }
}
?>

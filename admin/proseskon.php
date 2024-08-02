<?php

include '../koneksi.php';

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["foto"]["tmp_name"]);
if ($check !== false) {
  $uploadOk = 1;
} else {
  echo "File is not an image.";
  $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["foto"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
    // Here you would save the file path to your database along with other form data
    // Add your database connection and insert logic here
    $nama = $_POST['nama'];
    $b_tamu = $_POST['b_tamu'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $festival = $_POST['festival'];
    $vip = $_POST['vip'];
    $foto = $target_file;

    $sql = "INSERT INTO konser (nama, b_tamu, tempat, tanggal, waktu, jumlah_tiket, festival, vip, foto) VALUES ('$nama', '$b_tamu', '$tempat', '$tanggal', '$waktu', '$jumlah_tiket', '$festival', '$vip', '$foto')";

    if ($conn->query($sql) === TRUE) {
      header("location:data_konser.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

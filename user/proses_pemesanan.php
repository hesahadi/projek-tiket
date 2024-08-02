<?php
session_start();
include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username']; // Ambil username dari data POST

    $sql = "SELECT * FROM konser WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Get form data
        $nama = isset($_POST["nama"]) ? $_POST["nama"] : '';
        $beli_tiket = isset($_POST["beli_tiket"]) ? $_POST["beli_tiket"] : 0;
        $posisi = isset($_POST["posisi"]) ? $_POST["posisi"] : '';
        $bayar = isset($_POST["bayar"]) ? $_POST["bayar"] : '';
        $jumlah_tiket = $row["jumlah_tiket"];

        // Calculate total harga
        switch ($posisi) {
            case "Festival":
                $harga = $row["festival"];
                break;
            case "VIP":
                $harga = $row["vip"];
                break;
            default:
                $harga = 0;
        }
        $total_harga = $harga * $beli_tiket;

        $jumlah_tiket = $jumlah_tiket - $beli_tiket;

        // Insert data into database
        $sql_insert = "INSERT INTO pemesanan (username, nama, beli_tiket, posisi, bayar, total_harga) VALUES ('$username', '$nama', '$beli_tiket', '$posisi', '$bayar', '$total_harga')";
        if (mysqli_query($conn, $sql_insert)) {
            // Update jumlah tiket di konser
            $sql_update = "UPDATE konser SET jumlah_tiket = $jumlah_tiket WHERE id = $id";
            mysqli_query($conn, $sql_update);

            header("Location: invoice.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Konser tidak ditemukan.";
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}

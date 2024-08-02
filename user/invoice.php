<?php
session_start();
include("../koneksi.php");

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch the latest booking for the user
$sql = "SELECT * FROM pemesanan WHERE username = '$username' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No recent bookings found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .invoice-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
        }

        td {
            text-align: left;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <h2>Invoice</h2>
        <table>
            <tr>
                <th>Attribute</th>
                <th>Details</th>
            </tr>
            <tr>
                <td>Id Pemesanan</td>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
            </tr>
            <tr>
                <td>Nama Konser</td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
            </tr>
            <tr>
                <td>Jumlah Tiket</td>
                <td><?php echo htmlspecialchars($row['beli_tiket']); ?></td>
            </tr>
            <tr>
                <td>Posisi</td>
                <td><?php echo htmlspecialchars($row['posisi']); ?></td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td><?php echo htmlspecialchars($row['bayar']); ?></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>Rp <?php echo number_format($row['total_harga'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td><?php echo htmlspecialchars($row['tanggal_pemesanan']); ?></td>
            </tr>
        </table>
        <div class="btn-container">
            <a href="home.php" class="btn">Kembali ke Beranda</a>
            <a href="cetakpdf.php?id=<?php echo $row['id']; ?>" class="btn">Cetak PDF</a>
        </div>
    </div>
</body>

</html>

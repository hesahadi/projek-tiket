<?php
session_start();
include("../koneksi.php");

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch all bookings for the user
$sql = "SELECT * FROM pemesanan WHERE username = '$username' ORDER BY id DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .riwayat-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
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
    </style>
</head>

<body>
    <div class="riwayat-box">
        <h2>Riwayat Pemesanan</h2>
        <table>
            <tr>
                <th>Id Pemesanan</th>
                <th>Nama Konser</th>
                <th>Jumlah Tiket</th>
                <th>Posisi</th>
                <th>Metode Pembayaran</th>
                <th>Total Harga</th>
                <th>Tanggal Pemesanan</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['beli_tiket']); ?></td>
                        <td><?php echo htmlspecialchars($row['posisi']); ?></td>
                        <td><?php echo htmlspecialchars($row['bayar']); ?></td>
                        <td>Rp <?php echo number_format($row['total_harga'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['tanggal_pemesanan']); ?></td>
                        <td><a href="cetakpdf.php?id=<?php echo $row['id']; ?>" class="btn">Cetak PDF</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada riwayat pemesanan.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>
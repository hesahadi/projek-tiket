<?php
session_start();
include '../koneksi.php';

// Determine the current page and set the limit of records per page
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch orders with limit and offset
$sql = "SELECT id, username, nama, beli_tiket, posisi, bayar, total_harga, tanggal_pemesanan FROM pemesanan LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Calculate total pages
$total_sql = "SELECT COUNT(*) FROM pemesanan";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_array()[0];
$total_pages = ceil($total_rows / $limit);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css.css">
    <style>
        .pagination {
            margin: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination a {
            margin: 0 5px;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        .pagination a.active {
            font-weight: bold;
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Data Pemesanan</h1>
    </header>
    <nav>
        <a href="user.php">Data User</a> |
        <a href="data_pemesanan.php">Data Pemesanan</a> |
        <a href="data_konser.php">Data Konser</a> |
        <a href="tambah_konser.html">Tambah Konser</a>
    </nav>
    <div class="container">
        <div class="table-wrapper">
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Username</th><th>Nama</th><th>Tiket dibeli</th><th>Posisi</th><th>Bayar</th><th>Total</th><th>Tanggal Pemesanan</th><th>Actions</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["beli_tiket"] . "</td>";
                    echo "<td>" . $row["posisi"] . "</td>";
                    echo "<td>" . $row["bayar"] . "</td>";
                    echo "<td>" . $row["total_harga"] . "</td>";
                    echo "<td>" . $row["tanggal_pemesanan"] . "</td>";
                    echo "<td><a href='hapuspemesanan.php?id=" . $row["id"] . "' class='btn' onclick='return confirm(\"Yakin ingin menghapus pemesanan ini?\")'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <div class="pagination">
            <?php
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo "<a href='?page=$i' class='active'>$i</a>";
                } else {
                    echo "<a href='?page=$i'>$i</a>";
                }
            }
            ?>
        </div>
    </div>
    <footer>&copy; 2023 Admin Dashboard</footer>
</body>
</html>

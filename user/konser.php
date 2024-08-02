<?php
session_start();
include("../koneksi.php");

// Menentukan halaman dan batas data per halaman
$limit = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Ambil data konser dengan batas dan offset
$sql = "SELECT id, nama, b_tamu, tempat, tanggal, waktu, jumlah_tiket, festival, vip, foto FROM konser LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Menghitung total halaman
$total_sql = "SELECT COUNT(*) FROM konser";
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
    <title>List Konser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .concert {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .concert:hover {
            transform: scale(1.05);
        }

        .concert img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .concert h2 {
            margin: 10px 0;
        }

        .concert p {
            margin: 5px 0;
        }

        .concert .date,
        .concert .venue,
        .concert .time,
        .concert .tickets {
            font-weight: bold;
        }

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

        .back-button {
            margin: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form action="proses_pemesanan.php" method="post">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
    </form>
    <h1>Pilih Konser</h1>
    <button class="back-button" onclick="history.back()">Kembali</button>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<a href='pesan.php?id=" . $row["id"] . "' class='concert'>";
                if (!empty($row["foto"])) {
                    echo "<img src='" . $row["foto"] . "' alt='" . $row["nama"] . "'>";
                }
                echo "<h2>" . $row["nama"] . "</h2>";
                echo "<h2>" . $row["b_tamu"] . "</h2>";
                echo "<p class='venue'>Tempat: " . $row["tempat"] . "</p>";
                echo "<p class='date'>Tanggal: " . $row["tanggal"] . "</p>";
                echo "<p class='time'>Waktu: " . $row["waktu"] . "</p>";
                echo "<p class='tickets'>Tiket Tersedia: " . $row["jumlah_tiket"] . "</p>";
                echo "</a>";
            }
        } else {
            echo "<p>Tidak Ada konser.</p>";
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
</body>

</html>

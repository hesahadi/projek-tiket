<?php
// Fetch existing data for the form
$id = $_GET['id'];

include '../koneksi.php';

$sql = "SELECT * FROM konser WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <header>
        <h1>Edit Konser</h1>
    </header>
    <nav>
        <a href="data_konser.php">Kembali</a>
    </nav>
    <div class="form-container">
        <form action="updatekon.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama">Nama Konser:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

            <label for="b_tamu">Bintang Tamu:</label>
            <input type="text" id="b_tamu" name="b_tamu" value="<?php echo $row['b_tamu']; ?>" required>

            <label for="tempat">Tempat:</label>
            <input type="text" id="tempat" name="tempat" value="<?php echo $row['tempat']; ?>" required>

            <div class="date-time-wrapper">
                <div>
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                </div>
                <div>
                    <label for="waktu">Waktu:</label>
                    <input type="time" id="waktu" name="waktu" value="<?php echo $row['waktu']; ?>" required>
                </div>
            </div>

            <label for="jumlah_tiket">Jumlah Tiket:</label>
            <input type="number" id="jumlah_tiket" name="jumlah_tiket" value="<?php echo $row['jumlah_tiket']; ?>" required>

            <label for="festival">Harga Festival:</label>
            <input type="number" id="festival" name="festival" value="<?php echo $row['festival']; ?>" required>

            <label for="vip">Harga VIP:</label>
            <input type="number" id="vip" name="vip" value="<?php echo $row['vip']; ?>" required>

            <input type="submit" value="UPDATE">
        </form>
    </div>
    <footer>&copy; 2023 Admin Dashboard</footer>

    <script>
        // Set minimum date for input[type="date"] to today's date
        const today = new Date();
        document.getElementById('tanggal').min = today.toISOString().split('T')[0];
    </script>
</body>

</html>
<?php
session_start();
include("../koneksi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM konser WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
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
            display: flex;
            flex-direction: column;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        table td {
            padding: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .venue-image {
            text-align: center;
            margin-top: 20px;
        }

        .venue-image img {
            width: 100%;
            height: auto;
            max-width: 600px;
            border-radius: 10px;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #007BFF;
            padding: 10px 20px;
            border: 1px solid #007BFF;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link a:hover {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pemesanan Tiket</h2>
        <form action="proses_pemesanan.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
            <table>
                <tr>
                    <td><label>Jumlah tiket yang tersedia</label></td>
                    <td><?php echo $row["jumlah_tiket"]; ?></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama:</label></td>
                    <td><input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label for="beli_tiket">Jumlah Tiket:</label></td>
                    <td><input type="number" id="beli_tiket" name="beli_tiket" required></td>
                </tr>
                <tr>
                    <td><label for="posisi">Pilih Venue:</label></td>
                    <td>
                        <select id="posisi" name="posisi">
                            <option value="" disabled selected>Pilih</option>
                            <option value="Festival">Festival</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="total_harga">Harga :</label></td>
                    <td><label id="total">Rp 0</label></td>
                </tr>
                <tr>
                    <td><label for="bayar">Pilih Metode Pembayaran :</label></td>
                    <td>
                        <select id="bayar" name="bayar">
                            <option value="" disabled selected>Pilih</option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="E-wallet">E-Wallet</option>
                            <option value="Indomart">Indomart</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><input type="submit" value="Pesan Tiket"></td>
                </tr>
            </table>
        </form>
        <div class="back-link">
            <a href="home.php">Kembali</a>
        </div>
        <br>
        <div class="venue-image">
            <img src="https://loket-production-sg.s3.ap-southeast-1.amazonaws.com/images/temporary/20230909/1694273875_XpiYHc.png" alt="Ini adalah layout venue konser.">
        </div>
    </div>
    <script>
        const formatRupiah = (angka) => {
            let reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            return ribuan.join('.').split('').reverse().join('');
        }

        const hitungHarga = () => {
            const venue = document.getElementById("posisi").value;
            const jumlahTiket = document.getElementById("beli_tiket").value;
            let harga = 0;

            switch (venue) {
                case "Festival":
                    harga = <?php echo $row["festival"]; ?>;
                    break;
                case "VIP":
                    harga = <?php echo $row["vip"]; ?>;
                    break;
            }

            const totalHarga = harga * jumlahTiket;
            document.getElementById("total").innerHTML = `Rp ${formatRupiah(totalHarga)}`;
        };

        document.getElementById("beli_tiket").addEventListener("change", hitungHarga);
        document.getElementById("posisi").addEventListener("change", hitungHarga);
    </script>
</body>

</html>

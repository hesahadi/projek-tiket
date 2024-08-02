<?php
session_start();
include("../koneksi.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - TiketKita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #17a2b8 0%, #ffffff 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #top {
            background-color: #17a2b8 50%;
            color: white;
            padding: 1rem 0;
        }

        #top .nama-website h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        #top .nama-website p {
            margin: 0;
            font-size: 1.2rem;
        }

        #main {
            padding: 2rem;
        }

        #main h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        #main p {
            font-size: 1.2rem;
            text-align: center;
            font-weight: 500;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
        }

        .text-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .text-box .text-content {
            max-width: 70%;
        }

        .text-box h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .text-box p {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .text-box a {
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
        }

        .text-box a:hover {
            text-decoration: underline;
        }

        #bottom {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 1rem 0;
            position: relative;
            bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid wrapper">
        <div id="top" class="text-white d-flex justify-content-between align-items-center">
            <div class="nama-website ml-3">
                <h1>TIKET KITA</h1>
                <p>Beli tiket konser online</p>
            </div>
            <ul class="nav mr-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php" onclick="return confirm('Yakin ingin LOGOUT?')">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="konser.php">Pesan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="riwayat.php">Riwayat</a>
                </li>
            </ul>

        </div>

        <main>
            <form action="proses_pemesanan.php" method="post">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
            </form>
            <div id="main" class="text-center">
                <div class="text-box">
                    <div class="text-content">
                        <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                        <p>Temukan pengalaman konser terbaik bersama kami. Nikmati layanan pembelian tiket yang mudah, cepat, dan terpercaya. Pesan tiket konser favorit Anda sekarang!</p>
                        <a href="konser.php" class="btn btn-primary mt-3">Pesan sekarang</a>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-4">
                        <img class="img-fluid rounded" src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/192/2024/04/20/IMG_20240420_052303-1754189321.jpg" alt="Konser SatuFest Vol.2">
                    </div>
                </div>
            </div>
        </main>

        <div id="bottom" class="text-center bg-light p-3 mt-4">
            &copy; 2024 TiketKita.com
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
session_start();
include("../koneksi.php");

if (!isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>HOME</title>
</head>

<body>

  <div class="container-fluid wrapper">
    <div id="top" class="bg-info text-white p-3 rounded d-flex justify-content-between align-items-center">
      <div class="nama-website">
        <h1>TIKET KITA</h1>
        <p>Beli tiket konser online</p>
      </div>

      <ul class="nav">
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
          <a class="nav-link text-white" href="tentang.html">Tentang</a>
        </li>
      </ul>
    </div>

    <main>
      <div id="main" class="text-center my-4">
        <form action="proses_pemesanan.php" method="post">
          <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        </form>
        <h1>Selamat datang,<?php echo $_SESSION['username']; ?></h1>
        <p>Percayakan Kami untuk Layanan Terbaik Anda<br>
          Kami Menjamin Tiket Anda Sesuai Dengan Permintaan <br></p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 mb-4">
          <img class="img-fluid rounded" src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/882/2023/11/25/WhatsApp-Image-2023-11-25-at-055022-3973137915.jpeg" alt="Konser SatuFest Vol.2">
        </div>
        <div class="col-lg-5 col-md-6 text-box">
          <h2>Metamorphosis Festival Vol.1</h2>
          <p> Guest Star : Tiara Andini, Hivi, Happy Asmara, dan masih banyak lagi</p>
          <p> Waktu: Sabtu, 9 Desember 2023</p>
          <p>Tempat: Sevendream City Jember, Jalan Slamet Riyadi No. 168, Kabupaten Jember</p>
          <a href="konser.php">Pesan sekarang </a>
        </div>
      </div>
    </main>

    <div id="bottom" class="text-center bg-light p-3 mt-4">
      &copy; TiketKita.com
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
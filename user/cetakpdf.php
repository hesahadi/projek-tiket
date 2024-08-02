<?php
session_start();
include("../koneksi.php");
require('fpdf.php');

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$username = $_SESSION['username'];

// Fetch the booking details
$sql = "SELECT * FROM pemesanan WHERE id = '$id' AND username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Booking not found.";
    exit();
}

$conn->close();

class PDF extends FPDF
{
    function Header()
    {
        // Select Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, 'Invoice', 0, 1, 'C');
        // Line break
        $this->Ln(10);
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial', 'B', 12);
        // Background color
        $this->SetFillColor(200, 220, 255);
        // Title
        $this->Cell(0, 10, "Attribute $num : $label", 0, 1, 'L', true);
        // Line break
        $this->Ln(4);
    }

    function ChapterBody($body)
    {
        // Read text file
        $txt = $body;
        // Times 12
        $this->SetFont('Times', '', 12);
        // Output justified text
        $this->MultiCell(0, 10, $txt);
        // Line break
        $this->Ln();
    }

    function PrintChapter($num, $title, $body)
    {
        $this->AddPage();
        $this->ChapterTitle($num, $title);
        $this->ChapterBody($body);
    }
}

// Instantiate PDF object
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Table with booking details
$pdf->Cell(0, 10, 'Invoice Details', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);

$data = [
    'Id Pemesanan' => $row['id'],
    'Username' => $row['username'],
    'Nama Konser' => $row['nama'],
    'Jumlah Tiket' => $row['beli_tiket'],
    'Posisi' => $row['posisi'],
    'Metode Pembayaran' => $row['bayar'],
    'Total Harga' => 'Rp ' . number_format($row['total_harga'], 2, ',', '.'),
    'Tanggal Pemesanan' => $row['tanggal_pemesanan']
];

foreach ($data as $attribute => $value) {
    $pdf->Cell(50, 10, $attribute, 1);
    $pdf->Cell(0, 10, $value, 1, 1);
}

$pdf->Output('I', 'invoice.pdf');
?>

<?php
// ✅ Commit 5 – Dashboard Penjualan
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Data produk (menggunakan array)
$kode_barang = ["AKD01", "AKD02", "AKD03", "AKD04", "AKD05"];
$nama_barang = ["Keyboard Wireless","Mouse Bluetooth","Headset Bluetooth","Webcam HD 1080p","USB Hub 4 Port"];
$harga_barang = [550000, 350000, 750000, 600000, 250000];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Penjualan | POLGAN MART</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0d47a1, #42a5f5);
      color: #fff;
      display: flex;
      flex-direction: column;
    }

    header {
      text-align: center;
      padding: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.2);
      font-weight: 700;
      letter-spacing: 2px;
      font-size: 20px;
      color: #e3f2fd;
      text-shadow: 0 0 6px rgba(255,255,255,0.3);
    }

    table {
      width: 70%;
      margin: 40px auto;
      border-collapse: collapse;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 20px rgba(0,0,0,0.3);
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
    }

    th, td {
      padding: 14px;
      text-align: center;
      color: #fff;
    }

    th {
      background: rgba(255, 255, 255, 0.25);
      font-weight: 600;
      letter-spacing: 1px;
    }

    tr:nth-child(even) {
      background: rgba(255, 255, 255, 0.1);
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.25);
      transition: 0.3s;
    }

    .back-btn {
      display: block;
      width: fit-content;
      margin: 20px auto;
      background: linear-gradient(135deg, #ef4444, #dc2626);
      color: white;
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 500;
      box-shadow: 0 4px 10px rgba(239,68,68,0.4);
      transition: 0.3s;
    }

    .back-btn:hover {
      background: linear-gradient(135deg, #b91c1c, #dc2626);
      transform: translateY(-2px);
    }

    footer {
      text-align: center;
      padding: 12px;
      font-size: 13px;
      color: #bbdefb;
      border-top: 1px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.05);
      margin-top: auto;
    }
  </style>
</head>
<body>
  <header>-- POLGAN MART --</header>

  <table>
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga (Rp)</th>
    </tr>

    <?php
    for ($i = 0; $i < count($kode_barang); $i++) {
        echo "<tr>";
        echo "<td>{$kode_barang[$i]}</td>";
        echo "<td>{$nama_barang[$i]}</td>";
        echo "<td>" . number_format($harga_barang[$i], 0, ',', '.') . "</td>";
        echo "</tr>";
    }
    ?>
  </table>

  <a href="dashboard.php" class="back-btn">⬅ Kembali ke Dashboard</a>

  <footer>© 2025 POLGAN MART | Sistem Penjualan Sederhana</footer>
</body>
</html>

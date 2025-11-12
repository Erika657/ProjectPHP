<?php
// ✅ Commit 8 – Struk Belanja (Versi Kertas Putih)
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Data barang simulasi
$kode_barang = ["AKD01", "AKD02", "AKD03", "AKD04", "AKD05"];
$nama_barang = ["Keyboard Wireless", "Mouse Bluetooth", "Headset Bluetooth", "Webcam HD 1080p", "USB Hub 4 Port"];
$harga_barang = [550000, 350000, 750000, 600000, 250000];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

foreach ($kode_barang as $i => $kode) {
    $beli[$i] = rand(0, 1);
    $jumlah[$i] = $beli[$i] ? rand(1, 3) : 0;
    $total[$i] = $jumlah[$i] * $harga_barang[$i];
    $grandtotal += $total[$i];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Belanja | POLGAN MART</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap');

    body {
      font-family: 'Roboto Mono', monospace;
      background: #f1f1f1;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .receipt {
      background: #fff;
      width: 340px;
      padding: 20px;
      border-radius: 6px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      border: 1px solid #ccc;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo {
      text-align: center;
      font-weight: 700;
      font-size: 22px;
      margin-bottom: 5px;
      color: #0d47a1;
    }

    h3 {
      text-align: center;
      margin: 5px 0;
      font-size: 16px;
      color: #222;
    }

    small {
      display: block;
      text-align: center;
      color: #666;
      margin-bottom: 10px;
    }

    hr {
      border: none;
      border-top: 1px dashed #999;
      margin: 8px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
      margin-top: 10px;
    }

    th, td {
      padding: 4px 0;
    }

    th {
      border-bottom: 1px dashed #aaa;
      text-align: left;
    }

    td {
      text-align: left;
    }

    td:last-child {
      text-align: right;
    }

    .total {
      border-top: 1px dashed #000;
      font-weight: 700;
      padding-top: 6px;
    }

    .thanks {
      text-align: center;
      font-size: 12px;
      margin-top: 15px;
      color: #444;
    }

    .btn-area {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    a, button {
      border: none;
      border-radius: 5px;
      padding: 8px 14px;
      font-weight: 600;
      font-size: 13px;
      cursor: pointer;
      text-decoration: none;
      color: #fff;
      transition: 0.3s;
    }

    a {
      background: #dc2626;
    }
    a:hover { background: #b91c1c; }

    button {
      background: #0d47a1;
    }
    button:hover { background: #1565c0; }

    /* 🖨 Cetak khusus */
    @media print {
      body {
        background: #fff;
      }
      .btn-area {
        display: none;
      }
      .receipt {
        box-shadow: none;
        border: none;
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <div class="receipt">
    <div class="logo">🧾 POLGAN MART</div>
    <h3>Struk Pembelian</h3>
    <small>Tanggal: <?= date("d/m/Y H:i") ?></small>
    <hr>

    <table>
      <tr>
        <th>Barang</th>
        <th>Qty</th>
        <th>Total</th>
      </tr>

      <?php foreach ($kode_barang as $i => $kode): ?>
        <?php if ($jumlah[$i] > 0): ?>
          <tr>
            <td><?= $nama_barang[$i] ?></td>
            <td><?= $jumlah[$i] ?></td>
            <td><?= number_format($total[$i], 0, ',', '.') ?></td>
          </tr>
        <?php endif; ?>
      <?php endforeach; ?>

      <tr class="total">
        <td colspan="2">Total Belanja</td>
        <td>Rp <?= number_format($grandtotal, 0, ',', '.') ?></td>
      </tr>
    </table>

    <div class="thanks">
      --- Terima Kasih Telah Berbelanja ---
    </div>

    <div class="btn-area">
      <a href="dashboard.php">⬅ Kembali</a>
      <button onclick="window.print()">🖨 Cetak Struk</button>
    </div>
  </div>
</body>
</html>

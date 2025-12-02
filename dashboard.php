<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}


if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $harga = intval($_POST['harga'] ?? 0);
    $jumlah = intval($_POST['jumlah'] ?? 0);

    if ($kode && $nama && $harga > 0 && $jumlah > 0) {
    $_SESSION['keranjang'][] = [
        "kode" => $kode,
        "nama" => $nama,
        "harga" => $harga,
        "jumlah" => $jumlah,
        "total" => $harga * $jumlah
    ];


    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

}


if (isset($_POST['clear'])) {
    $_SESSION['keranjang'] = [];
}


$totalBelanja = array_sum(array_column($_SESSION['keranjang'], 'total'));


if ($totalBelanja < 50000) {
    $diskonPersen = 5;
} elseif ($totalBelanja <= 100000) {
    $diskonPersen = 10;
} else {
    $diskonPersen = 15;
}

$diskon = $totalBelanja * ($diskonPersen / 100);
$totalBayar = $totalBelanja - $diskon;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>POLGAN MART — Dashboard Biru</title>

<style>
    body {
        font-family: "Poppins", sans-serif;
        margin: 0;
        background: linear-gradient(to bottom, #0d47a1, #1976d2, #42a5f5);
        color: white;
    }

    .header {
        display: flex;
        justify-content: space-between;
        padding: 20px 40px;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(6px);
    }

    .header h2 {
        font-size: 26px;
        letter-spacing: 2px;
    }

    .container {
        width: 85%;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        color: #000;
        box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 8px;
    border: 1px solid #64b5f6;
    font-size: 15px;
    box-sizing: border-box;
}
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 8px;
    border: 1px solid #64b5f6;
    font-size: 15px;
    background: white;
    color: black;
}



    label {
        margin-top: 15px;
        font-weight: bold;
        color: #0d47a1;
        display: block;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 15px;
        border: none;
        cursor: pointer;
        margin-top: 15px;
    }

    .tambah {
        background-color: #1e88e5;
        color: white;
    }

    .batal {
        background-color: #90caf9;
        color: black;
        margin-left: 10px;
    }

    table {
        width: 100%;
        margin-top: 30px;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background: #1976d2;
        color: white;
        padding: 10px;
    }

    td {
        background: #e3f2fd;
        padding: 10px;
        text-align: center;
        color: #000;
    }

    .summary td {
        border: none;
        background: none;
        font-size: 16px;
    }

    .highlight {
        color: #0d47a1;
        font-weight: bold;
    }

    .clear-btn {
        background: #d32f2f;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        margin-top: 25px;
        cursor: pointer;
        border: none;
    }
    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 40px;
    background: linear-gradient(to right, #3a6ccf, #4d8bf5);
    color: white;
}


.circle {
    width: 55px;
    height: 55px;
    background: radial-gradient(circle, #d7e8ff, #8eb7ff, #3d7bdc);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 20px;
    color: #003b8a;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
}



.title {
    font-size: 26px;
    font-weight: bold;
    text-align: center;
    flex: 1;
}


.userinfo {
    text-align: right;
    font-size: 15px;
}

.logout {
    display: inline-block;
    margin-top: 5px;
    padding: 6px 18px;
    background: rgba(255,255,255,0.4);
    border-radius: 8px;
    color: #003f8c;
    text-decoration: none;
    font-weight: bold;
}

</style>
</head>

<body>

<div class="header">
    <div class="logo">
        <div class="circle">PM</div>
    </div>

    <div class="title">
        -- POLGAN MART --
    </div>

    <div class="userinfo">
        Selamat datang, <b><?= $_SESSION['username']; ?></b> 💙
        <br>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</div>


<div class="container">

    <h3 style="text-align:center; color:#0d47a1;">Form Input Barang</h3>

    <form method="POST">

<label>Kode Barang</label>
<select id="kode_barang" name="kode" onchange="isiOtomatis()" required>
    <option value=""disable selected>Pilih Kode Barang</option>
    <option value="AKD01" data-nama="Keyboard Wireless" data-harga="550.000">AKD01 -Keyboard wireless - 550.000</option>
    <option value="AKD02" data-nama="Mouse Bluetooth" data-harga="350.000">AKD02 - Mouse Bluetooth - 350.000</option>
    <option value="AKD03" data-nama="Headset Bluetooth" data-harga="400.000">BRG03 - Headset Bluetooth - 400.000</option>
</select>

<label>Nama Barang</label>
<input type="text" id="nama_barang" name="nama" readonly>

<label>Harga</label>
<input type="number" id="harga" name="harga" readonly>

<label>Jumlah</label>
<input type="number" id="jumlah" name="jumlah" required>

<button type="submit" name="tambah" class="btn tambah">Tambahkan</button>
<button type="reset" class="btn batal">Batal</button>

</form>



<h3>Daftar Pembelian</h3>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($_SESSION['keranjang'] as $b): ?>
        <tr>
            <td><?= $b['kode']; ?></td>
            <td><?= $b['nama']; ?></td>
            <td>Rp <?= number_format($b['harga'],0,',','.'); ?></td>
            <td><?= $b['jumlah']; ?></td>
            <td>Rp <?= number_format($b['total'],0,',','.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <table class="summary">
    <tr>
        <td>Total Belanja</td>
        <td class="highlight">Rp <?= number_format($totalBelanja,0,',','.'); ?></td>
    </tr>
    <tr>
        <td>Diskon (<?= $diskonPersen ?>%)</td>
        <td>Rp <?= number_format($diskon,0,',','.'); ?></td>
    </tr>
    <tr>
        <td>Total Bayar</td>
        <td class="highlight">Rp <?= number_format($totalBayar,0,',','.'); ?></td>
    </tr>
</table>


    <form method="POST">
        <button name="clear" class="clear-btn">Kosongkan Keranjang</button>
    </form>

</div>

<script>
    let totalSemua = 0;

function isiOtomatis() {
    let select = document.getElementById("kode_barang");
    let option = select.options[select.selectedIndex];
    document.getElementById("nama_barang").value = option.getAttribute("data-nama") || "";
    document.getElementById("harga").value = option.getAttribute("data-harga") || "";
}

function tambahBarang() {
    let kode = document.getElementById("kode_barang").value;
    let nama = document.getElementById("nama_barang").value;
    let harga = document.getElementById("harga").value;
    let jumlah = document.getElementById("jumlah").value;

    if (kode === "" || nama === "" || harga === "" || jumlah === "") {
        alert("Lengkapi semua data terlebih dahulu!");
        return;
    }
    let total = harga * jumlah;

    let tabel = document.getElementById("tabel_pembelian");

    tabel.innerHTML += `
        <tr>
            <td>${kode}</td>
            <td>${nama}</td>
            <td>${harga}</td>
            <td>${jumlah}</td>
            <td>${total}</td>
        </tr>
    `;

    totalSemua += total;
    document.getElementById("total_belanja").value = totalSemua;
    hitungTotal();
    document.getElementById("jumlah").value = "";
}
function hitungTotal() {
    let diskon = parseInt(document.getElementById("diskon").value) || 0;

    let potongan = (diskon / 100) * totalSemua;
    let totalBayar = totalSemua - potongan;

    document.getElementById("total_bayar").value = totalBayar;
}
</script>


</body>
</html>

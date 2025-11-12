<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | POLGAN MART</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0d47a1, #42a5f5);
      display: flex;
      flex-direction: column;
    }

    header {
      background: rgba(255, 255, 255, 0.15);
      border-bottom: 1px solid rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(12px);
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      animation: fadeDown 0.6s ease;
    }

    @keyframes fadeDown {
      from { transform: translateY(-20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
      font-weight: 500;
    }

    .user-info i {
      font-size: 20px;
    }

    .logout-btn {
  background: linear-gradient(135deg, #ef4444, #dc2626); /* Merah elegan */
  color: #fff;
  border: none;
  border-radius: 25px;
  padding: 8px 18px;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(239, 68, 68, 0.4);
  transition: all 0.3s ease;
}

.logout-btn:hover {
  background: linear-gradient(135deg, #b91c1c, #dc2626);
  transform: translateY(-2px) scale(1.05);
  box-shadow: 0 6px 15px rgba(239, 68, 68, 0.5);
}


    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(12px);
      padding: 40px 50px;
      border-radius: 20px;
      text-align: center;
      color: #fff;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    h1 {
      font-size: 24px;
      margin-bottom: 12px;
      font-weight: 700;
      text-shadow: 0 0 10px rgba(255,255,255,0.2);
    }

    p {
      font-size: 15px;
      margin-bottom: 5px;
      color: #e3f2fd;
    }

    footer {
      text-align: center;
      color: #bbdefb;
      font-size: 13px;
      padding: 10px 0;
      border-top: 1px solid rgba(255,255,255,0.2);
      background: rgba(255, 255, 255, 0.05);
    }
  </style>
</head>
<body>
  <header>
    <div class="user-info">
      <i>👤</i> <?= htmlspecialchars($username); ?>
    </div>
    <form method="post" action="logout.php">
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </header>

  <main>
    <div class="card">
      <h1>Selamat Datang di Dashboard<br>POLGAN MART 🎉</h1>
      <p>Hai <b><?= htmlspecialchars($username); ?></b>, senang bertemu kembali.</p>
      <p>Gunakan menu di atas untuk melanjutkan aktivitas Anda.</p>
          <a href="penjualan.php" class="btn-link">📦 Lihat Daftar Produk</a>
    </div>
  </main>

  <footer>© 2025 POLGAN MART | Modern Retail System</footer>
</body>
</html>

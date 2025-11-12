<?php
// Commit 2 – Mendesain Halaman Login (Royal Blue & Silver Theme)
// Tampilan elegan dan profesional ala corporate modern.
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | POLGAN MART</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    * { box-sizing: border-box; }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0d47a1, #1e88e5);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #e3f2fd;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 16px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      padding: 40px 35px;
      width: 340px;
      text-align: center;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .logo {
      background: linear-gradient(135deg, #90caf9, #e3f2fd);
      color: #0d47a1;
      width: 70px;
      height: 70px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 700;
      font-size: 20px;
      margin: 0 auto 18px;
      box-shadow: 0 4px 12px rgba(187, 222, 251, 0.6);
    }

    h2 {
      color: #bbdefb;
      font-weight: 700;
      margin-bottom: 30px;
      letter-spacing: 1px;
      text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
    }

    .input-group {
      text-align: left;
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      font-size: 13px;
      color: #e3f2fd;
      margin-bottom: 5px;
      font-weight: 500;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      background-color: rgba(255, 255, 255, 0.15);
      color: #fff;
      font-size: 14px;
      outline: none;
      transition: all 0.3s ease;
    }

    .input-group input::placeholder {
      color: #cfd8dc;
    }

    .input-group input:focus {
      border-color: #90caf9;
      box-shadow: 0 0 8px rgba(144, 202, 249, 0.4);
    }

    .btn {
      width: 100%;
      border: none;
      border-radius: 10px;
      padding: 10px 0;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .btn-login {
      background: linear-gradient(135deg, #90caf9, #42a5f5);
      color: #0d47a1;
      box-shadow: 0 4px 12px rgba(144, 202, 249, 0.3);
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(144, 202, 249, 0.4);
    }

    .btn-cancel {
      background-color: rgba(255, 255, 255, 0.15);
      color: #e3f2fd;
      margin-top: 10px;
      border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .btn-cancel:hover {
      background-color: rgba(255, 255, 255, 0.3);
    }

    footer {
      margin-top: 25px;
      font-size: 12px;
      color: #cfd8dc;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="logo">PM</div>
    <h2>POLGAN MART</h2>

    <form method="post" action="">
      <div class="input-group">
        <label for="username">👤 Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username..." required>
      </div>

      <div class="input-group">
        <label for="password">🔒 Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password..." required>
      </div>

      <button type="submit" class="btn btn-login">Masuk</button>
      <button type="reset" class="btn btn-cancel">Batal</button>
    </form>

    <footer>© 2025 POLGAN MART</footer>
  </div>
</body>
</html>

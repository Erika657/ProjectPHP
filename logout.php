<?php
// ✅ Commit 4 – Logout
session_start();
session_unset(); // hapus semua variabel session
session_destroy(); // hapus session dari server

// Arahkan kembali ke halaman login
header("Location: index.php");
exit;
?>

<?php
// Lakukan proses logout di sini, seperti menghapus sesi atau data login

// Contoh:
session_start();
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: home.php");
exit();
?>

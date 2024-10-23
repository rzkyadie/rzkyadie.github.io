<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Data Pemesanan</title>
</head>
<body>
    <div class="container">
        <h2>Data Pemesanan</h2>
        <form action="search.php" method="GET">
            <input type="text" name="search" placeholder="Cari pesanan...">
            <button type="submit">Cari</button>
        </form>
        <table>
            <!-- Tampilkan data dari database pemesanan -->
        </table>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
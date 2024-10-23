<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
include 'koneksi.php';

$search = $_GET['search'];
$sql = "SELECT * FROM pemesanan WHERE nama LIKE ?";
$stmt = $conn->prepare($sql);
$search_param = "%$search%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Hasil Pencarian</title>
</head>
<body>
    <div class="container">
        <h2>Hasil Pencarian</h2>
        <table>
            <!-- Tampilkan hasil pencarian -->
        </table>
        <a href="data.php">Kembali</a>
    </div>
</body>
</html>
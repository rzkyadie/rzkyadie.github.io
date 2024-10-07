<?php
// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $password = htmlspecialchars($_POST['password']);
    // Format data yang akan disimpan
    $data = "$nama|$jumlah|$password\n";
    // Simpan data ke file
    file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
    // Redirect ke halaman data.php setelah menyimpan
    header("Location: data.php");
    exit;
}
?>
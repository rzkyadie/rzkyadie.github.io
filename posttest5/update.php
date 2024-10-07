<?php
// Cek buat apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $password = htmlspecialchars($_POST['password']);

    // Format ulang data yang akan disimpan
    $newData = "$nama|$jumlah|$password\n";

    // Baca semua data dari file
    $file = file('data.txt');

    // Ubah data di baris yang sesuai dengan ID
    $file[$id] = $newData;

    // Tulis ulang file dengan data yang diperbarui
    file_put_contents('data.txt', implode('', $file));

    // Redirect kembali ke halaman data.php
    header("Location: data.php");
    exit;
}
?>
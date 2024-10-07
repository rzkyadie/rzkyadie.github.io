<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $file = file('data.txt');

    // Hapus baris yang sesuai
    unset($file[$id]);

    // Tulis ulang file tanpa baris yang dihapus
    file_put_contents('data.txt', implode('', $file));

    // Redirect ke halaman data.php
    header("Location: data.php");
    exit;
}
?>
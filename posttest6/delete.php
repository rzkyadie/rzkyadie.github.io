<?php
include 'koneksi.php';

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil nama file dari database sebelum dihapus
    $stmt = $conn->prepare("SELECT file FROM pemesanan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $fileToDelete = $row['file'];

    // Menghapus data dari database
    $stmt = $conn->prepare("DELETE FROM pemesanan WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();

// Kembali ke halaman data
header("Location: data.php");
exit;
?>
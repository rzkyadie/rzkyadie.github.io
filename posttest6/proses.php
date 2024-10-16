<?php
include 'koneksi.php';

function encryptPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Cek apakah data di-post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $password = encryptPassword($_POST['password']);

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $fileSizeLimit = 1 * 1024 * 1024; // 1MB

    if ($_FILES["file"]["size"] > $fileSizeLimit) {
        echo "File terlalu besar, maksimal 1MB.";
        exit;
    }

    // Memindah file ke direktori tujuan
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        // Menyimpan data ke database
        $stmt = $conn->prepare("INSERT INTO pemesanan (nama, jumlah, password, file) VALUES (?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("siss", $nama, $jumlah, $password, $targetFile);
        
        if ($stmt->execute()) {
            echo "Data berhasil disimpan.";
            header("Location: data.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Terjadi kesalahan saat mengupload file.";
    }
}

$conn->close();
?>
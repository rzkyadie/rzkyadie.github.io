<?php
include 'koneksi.php';

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data lama
    $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Memproses form jika data di-post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Cek apakah ada file yang diupload
        if (!empty($_FILES["file"]["name"])) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["file"]["name"]);
            $fileSizeLimit = 1 * 1024 * 1024;

            if ($_FILES["file"]["size"] > $fileSizeLimit) {
                echo "File terlalu besar, maksimal 1MB.";
                exit;
            }

            // Memindahkan file ke direktori tujuan
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                // Memperbarui data ke database
                $stmt = $conn->prepare("UPDATE pemesanan SET nama = ?, jumlah = ?, password = ?, file = ? WHERE id = ?");
                $stmt->bind_param("sissi", $nama, $jumlah, $password, $targetFile, $id);
            } else {
                echo "Terjadi kesalahan saat mengupload file.";
                exit;
            }
        } else {
            $stmt = $conn->prepare("UPDATE pemesanan SET nama = ?, jumlah = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sisi", $nama, $jumlah, $password, $id);
        }

        if ($stmt->execute()) {
            echo "Data berhasil diperbarui.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

$conn->close();
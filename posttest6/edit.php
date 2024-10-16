<?php
include 'koneksi.php';

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM pemesanan WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pemesanan Customwear</h2>
        <form action="update.php?id=<?= $id ?>" method="POST">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required />

            <label for="jumlah">Jumlah Kaos:</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= htmlspecialchars($row['jumlah']) ?>" required />

            <label for="password">Kata Sandi:</label>
            <input type="password" class="form-control" id="password" name="password" required />

            <label for="file">Upload File (max 1MB):</label>
            <input type="file" class="form-control" id="file" name="file" accept=".jpg, .jpeg, .png" />

            <button type="submit" class="btn">Perbarui</button>
            <a href="data.php" class="btn">Batal</a>
        </form>
    </div>
</body>
</html>
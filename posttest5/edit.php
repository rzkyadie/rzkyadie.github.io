<?php
// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $file = file('data.txt');

    // Ambil data berdasarkan ID
    list($nama, $jumlah, $password) = explode('|', trim($file[$id]));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .text-center {
            text-align: center;
        }
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .banner-img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pemesanan Customwear</h2>
        <form action="update.php?id=<?= $id ?>" method="POST">

            <!-- banner -->
            <div class="px-4 mb-4 text-center">
                <img src="banner-baju.jpeg" class="banner-img" alt="Banner Customwear"/>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required/>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Kaos:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $jumlah ?>" required/>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>" required/>
            </div>

            <!-- Tombol submit -->
            <button type="submit" class="btn">Perbarui</button>
            <a href="data.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
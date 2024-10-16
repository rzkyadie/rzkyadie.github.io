<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Customwear</title>
    <link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <h2>Formulir Pemesanan Customwear</h2>
        <!-- banner -->
        <img src="banner-baju.jpeg" alt="Banner Kaos" class="banner">
        
        <form action="proses.php" method="POST" enctype="multipart/form-data">
            <!-- Input nama -->
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <!-- Input jumlah kaos -->
            <label for="jumlah">Jumlah Kaos:</label>
            <input type="number" id="jumlah" name="jumlah" required>

            <!-- Input password -->
            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" required>

            <!-- Input file -->
            <label for="file">Upload Foto Kaos:</label>
            <input type="file" id="file" name="file" accept="image/*" required>

            <!-- Tombol submit -->
            <button type="submit">Kirim</button>
        </form>
    </div>
</body>
</html>
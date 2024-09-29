<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Hasil Pemesanan</h2>
        <?php
        $nama = htmlspecialchars($_POST['nama']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $password = htmlspecialchars($_POST['password']);

        // Menampilkan hasil input
        echo "<p><strong>Nama Lengkap:</strong> $nama</p>";
        echo "<p><strong>Jumlah Kaos:</strong> $jumlah</p>";
        echo "<p><strong>Kata Sandi (disembunyikan):</strong> " . str_repeat('*', strlen($password)) . "</p>";
        ?>
        <a href="index.html" class="btn btn-primary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
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
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pemesanan</h2>

        <!-- Tombol kembali ke form -->
        <a href="index.html" class="btn mb-4">Tambah Pesanan</a>

        <!-- Menampilkan Data -->
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Kaos</th>
                    <th>Kata Sandi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = file('data.txt');
                // Menampilkan data dari file
                foreach ($file as $key => $line) {
                    list($nama, $jumlah, $password) = explode('|', trim($line));
                    echo "<tr>
                            <td>$nama</td>
                            <td>$jumlah</td>
                            <td>" . str_repeat('*', strlen($password)) . "</td>
                            <td>
                                <a href='edit.php?id=$key' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id=$key' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
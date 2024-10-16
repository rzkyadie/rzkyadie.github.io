<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid #ccc;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pemesanan</h2>
        <a href="index.php" class="btn">Tambah Pesanan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Kaos</th>
                    <th>Kata Sandi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                // Mengambil data dari database
                $sql = "SELECT * FROM pemesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['nama']) . "</td>
                                <td>" . htmlspecialchars($row['jumlah']) . "</td>
                                <td>" . str_repeat('*', strlen($row['password'])) . "</td>
                                <td><a href='" . htmlspecialchars($row['file']) . "'>File</a></td>
                                <td>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                                    <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data yang ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
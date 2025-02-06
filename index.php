<?php
require 'function.php';


$siswa = query("SELECT * FROM ekskul");


if(isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];

    $siswa = query("SELECT * FROM ekskul WHERE 
            nama LIKE '%$keyword%' OR 
            nisn LIKE '%$keyword%' OR 
            jurusan LIKE '%$keyword%' OR 
            ekskul LIKE '%$keyword%' OR 
            email LIKE '%$keyword%'");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ekstrakulikuler SIswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .search-box {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
        }
        .btn-add {
            background-color: #4CAF50;
        }
        .btn-edit {
            background-color: #2196F3;
        }
        .btn-delete {
            background-color: #f44336;
        }
        img {
            width: 90px;
            height: 55px;
           margin-left: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Ekstrakulikuler Siswa</h1>
        
        <a href="tambah.php" class="btn btn-add">Tambah Data Siswa</a>
        
        <div class="search-box">
            <form action="" method="post">
                <input type="text" name="keyword" size="40" autofocus 
                    placeholder="Masukkan kata kunci pencarian..." 
                    autocomplete="off">
                <button type="submit" name="cari">Cari</button>
            </form>
        </div>

        <table>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jurusan</th>
                <th>Ekstrakurikuler</th>
                <th>Gambar</th>
                <th>Email</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($siswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="mengedit.php?id=<?= $row["id"]; ?>" class="btn btn-edit">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-delete" 
                        onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                </td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nisn"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
                <td><?= $row["ekskul"]; ?></td>
                <td><img src="uploads/<?= $row["gambar"]; ?>"></td>
                <td><?= $row["email"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
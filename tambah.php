<?php

require "function.php";

if(isset($_POST['submit'])) {
    $result = tambahSiswa($_POST);
    
    if($result === "success") {
     
    } else {
        echo "<script>
                alert('$result');
              </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Data Siswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>
            </div>

            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" name="nisn" id="nisn" required>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </div>

            <div class="form-group">
                <label for="test">Ekstrakurikuler:</label>
                <input type="text" name="test" id="test" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>



            <button type="submit" name="submit">Tambah Data</button>
        </form>

        <a href="index.php" class="back-link">Kembali ke Daftar Siswa</a>
    </div>
</body>

</html>
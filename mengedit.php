<?php
require 'function.php';


$id = $_GET["id"];


$siswa = query("SELECT * FROM ekskul WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (ubahSiswa($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'index.php';
        </script>
    ";
    }
}

// if(isset($_POST["submit"])) {

//     // Cek apakah data berhasil diubah
//     if(ubahSiswa($_POST) > 0) {

//     } else {

//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah Data Siswa</title>
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
			background-color: #2196F3;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #1976D2;
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
		<h1>Ubah Data Siswa</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id"
				value="<?= $siswa["id"]; ?>">

			<div class="form-group">
				<label for="nama">Nama:</label>
				<input type="text" name="nama" id="nama" required
					value="<?= $siswa["nama"]; ?>">
			</div>

			<div class="form-group">
				<label for="nisn">NISN:</label>
				<input type="text" name="nisn" id="nisn" required
					value="<?= $siswa["nisn"]; ?>">
			</div>

			<div class="form-group">
				<label for="jurusan">Jurusan:</label>
				<input type="text" name="jurusan" id="jurusan" required
					value="<?= $siswa["jurusan"]; ?>">
			</div>

			<div class="form-group">
				<label for="test">Ekstrakurikuler:</label>
				<input type="text" name="test" id="test" required
					value="<?= $siswa["ekskul"]; ?>">
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" name="email" id="email" required
					value="<?= $siswa["email"]; ?>">
			</div>

            <div class="form-group">
            <label for="gambar">Gambar:</label><br>
                <?php if (!empty($siswa["gambar"])) : ?>
                    <img id="previewImg" src="uploads/<?= $siswa["gambar"]; ?>" alt="Gambar Siswa" width="100">
                    <?php else : ?>
                    <img id="previewImg" src="#" alt="Pratinjau Gambar" width="100" style="display: none;">
                    <?php endif; ?>
                <input type="hidden" name="gambarbien" value="<?= $siswa["gambar"]; ?>">
                <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewImage(event)">
				<img src="uploads/<?= $siswa["gambar"]; ?>" alt="">
            </div>
			<button type="submit" name="submit">Ubah Data</button>
		</form>
		<a href="index.php" class="back-link">Kembali ke Daftar Siswa</a>
	</div>
    <script>
       const previewImage = (event) => {
            let preview = document.getElementById('previewImg');
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; 
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
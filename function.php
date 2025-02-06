<?php

$db = mysqli_connect("localhost", "root", "", "db_siswa");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahSiswa($data)
{
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nisn"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $test = htmlspecialchars($data["test"]);
    $email = htmlspecialchars($data["email"]);

    $cek_nama = mysqli_query($db, "SELECT * FROM ekskul WHERE nisn = '$nis'");
    if (mysqli_num_rows($cek_nama) > 0) {
        echo "<script>
                alert('NISN sudah terdaftar, data gagal diinput!');
                document.location.href = 'index.php';
              </script>";
        return false;
    }


    $cek_email = mysqli_query($db, "SELECT * FROM ekskul WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>
                alert('Email sudah terdaftar, data gagal diinput!');
                document.location.href = 'index.php';
              </script>";
        return false;
    }


    if ($_FILES['fileToUpload']['error'] !== 4) {
        $gambar = uploadGambar();
        if (!$gambar) {
            echo "<script>
                    alert('Gambar gagal diunggah, data gagal diinput!');
                    document.location.href = 'index.php';
                  </script>";
            return false;
        }
    } else {
        $gambar = null;
    }

    $query = "INSERT INTO ekskul (nama, nisn, jurusan, ekskul, email, gambar) 
              VALUES ('$nama', '$nis', '$jurusan', '$test', '$email', '$gambar')";

    mysqli_query($db, $query);
    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
              </script>";

        return false;
    }
}

function ubahSiswa($data)
{
    global $db;

    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nisn"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $test = htmlspecialchars($data["test"]);
    $email = htmlspecialchars($data["email"]);
    $gambarbien = htmlspecialchars($data["gambarbien"]);

    if ($_FILES["fileToUpload"]["error"] === 4) {
        $gambar = $gambarbien;
    } else {
        $gambar = uploadGambar();
        if ($gambar) {

            if (!empty($gambarbien)) {
                $gambarLama = "uploads/" . $gambarbien;
                if (file_exists($gambarLama)) {
                    unlink($gambarLama);
                }
            }
        } else {
            $gambar = $gambarbien;
        }
    }

    $query = "UPDATE ekskul SET 
                nama = '$nama', 
                nisn = '$nis', 
                jurusan = '$jurusan', 
                ekskul = '$test', 
                email = '$email', 
                gambar = '$gambar' 
              WHERE id = '$id'";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapusSiswa($id)
{
    global $db;


    $result = mysqli_query($db, "SELECT gambar FROM ekskul WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    if ($row && !empty($row['gambar'])) {
        $filePath = "uploads/" . $row['gambar'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    mysqli_query($db, "DELETE FROM ekskul WHERE id = '$id'");
    return mysqli_affected_rows($db);
}

function cariSiswa($kata)
{
    global $db;
    $query = "SELECT * FROM ekskul WHERE 
              nama LIKE '%$kata%' OR 
              nisn LIKE '%$kata%' OR 
              jurusan LIKE '%$kata%' OR 
              ekskul LIKE '%$kata%' OR 
              email LIKE '%$kata%'";
    return query($query);
}

function uploadGambar()
{
    $target_dir = "uploads/";
    $file_extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

    $random_number = rand(100000, 999999); //angka bebas 100000, 9999999
    $new_filename = $random_number . "." . $file_extension;
    $target_file = $target_dir . $new_filename;

    $cek = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($cek === false) {
        echo "<script>alert('File bukan gambar.');</script>";
        return false;
    }

    if (!in_array($file_extension, ["jpg", "jpeg", "png", "gif"])) {
        echo "<script>alert('Maaf, hanya gambar JPG, JPEG, PNG, dan GIF yang diizinkan.');</script>";
        return false;
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        return $new_filename;
    } else {
        return false;
    }
}

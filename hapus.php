<?php

include "function.php";

$id = $_GET["id"];

if (hapusSiswa($id) > 0) {
    echo  " 
    <script>
  alert('Data Berhasil Dihapus');
  window.location.href = 'index.php';
  </script>
  ";
} else {
    echo  "
          <script>
        alert('Data Gagal Dihapus');
        window.location.href = 'index.php';
        </script>
        ";
}

?>
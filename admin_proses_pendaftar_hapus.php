<?php

include("inc_koneksi.php");

if (isset($_GET['id']) && !empty($_GET['id'])) { // Cek apakah id sudah ada di url
  $id = $_GET['id']; // mengambil data id melalui ur

  // Query hapus berdasarkan id tertentu
  $sql = "DELETE FROM pendaftar WHERE id_pendaftar = '$id'";
  if (mysqli_query($koneksi, $sql)) {
      echo "<script>
              alert('Data berhasil dihapus!');
              window.location.href='admin_pendaftar.php'
            </script>";
  } else {
    echo "<script>
              alert('Terjadi kesalahan pada server!');
              window.location.href='admin_pendaftar.php'
            </script>";
  }
}
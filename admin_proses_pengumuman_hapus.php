<?php

include("inc_koneksi.php");

if (isset($_GET['id']) && !empty($_GET['id'])) { // Cek apakah id sudah ada di url
  $id = $_GET['id']; // mengambil data id melalui ur

  // Query hapus berdasarkan id tertentu
  $sql = "DELETE FROM pengumuman WHERE id_pengumuman = '$id'";
  if (mysqli_query($koneksi, $sql)) {
      echo "<script>
              alert('Data berhasil dihapus!');
              window.location.href='admin_pengumuman.php'
            </script>";
  } else {
    echo "<script>
              alert('Terjadi kesalahan pada server!');
              window.location.href='admin_pengumuman.php'
            </script>";
  }
}
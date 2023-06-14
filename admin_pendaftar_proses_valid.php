<?php

include("inc_koneksi.php");

if (isset($_GET['id']) && !empty($_GET['id'])) { // Cek apakah id sudah ada di url
  $id = $_GET['id']; // mengambil data id melalui url

  // Query tambah berdasarkan id tertentu
  $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM validasi WHERE id_pendaftar = $id"));
  if($cek < 1 ) {
    $sql = "INSERT INTO validasi (id_pendaftar,status) VALUES ($id,'sudah')";
  }else{
    $sql = "UPDATE validasi SET status='sudah',catatan='' WHERE id_pendaftar = $id";
  }
  
  if (mysqli_query($koneksi, $sql)) {
      echo "<script>
              alert('Data berhasil ditambahkan!');
              window.location.href='admin_lihat_pendaftar.php?id=". $id ."'
            </script>";
  } else {
    echo "<script>
              alert('Terjadi kesalahan pada server!');
              window.location.href='admin_lihat_pendaftar.php?id=". $id ."'
            </script>";
  }
}
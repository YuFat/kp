<?php

include("inc_header.php");

$id = $_GET['id'];
$sql1 = "SELECT * FROM pendaftar WHERE id_pendaftar = $id"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query
$data = mysqli_fetch_assoc($q1); // mengubah data bentuk query menjadi array

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nilai = $_POST['nilai'];

  // Query hapus berdasarkan id tertentu
  $sql = "UPDATE pendaftar SET nilai = $nilai WHERE id_pendaftar = '$id'";
  if (mysqli_query($koneksi, $sql)) {
      echo "<script>
              alert('Data berhasil diedit!');
              window.location.href='admin_pendaftar.php'
            </script>";
  } else {
    echo "<script>
              alert('Terjadi kesalahan pada server!');
              window.location.href='admin_pendaftar.php'
            </script>";
  }
}
?>

<h1 class="mt-4">Daftar Pendaftar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pendaftar</li>
    <li class="breadcrumb-item active">Edit nilai</li>
</ol>

<div class="card p-3">
<form method="post" action="">
    <input type="hidden" name="id" value="<?= $data['id_pendaftar'] ?>">
    <input type="number" class="form-control mb-3" name="nilai" value="<?= $data['nilai'] ?>">
    <button name="submit" type="submit" class="btn btn-warning">Edit</button>
</form>
</div>

<?php
include("inc_footer.php");
?>
<?php

include("inc_header.php");

$err = "";

if (isset($_POST['submit'])) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $id_user = $_SESSION['user']['id_user'];

  if (empty($err)) {
    $now = date('Y-m-d');
    $sql = "INSERT INTO artikel (judul, isi, tanggal, id_user) VALUES ('$judul', '$isi', '$now', $id_user)";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data berhasil ditambah!');
                window.location.href='admin_artikel.php'
              </script>";
    } else {
      if(mysqli_errno($koneksi) == 1062) {
        echo "<script>
                  alert('Pendaftar yang dimasukan sudah ada!');
                  window.location.href='admin_artikel_tambah.php'
                </script>";
      }else{
        echo "<script>
                  alert('Terjadi kesalahan pada server!');
                  window.location.href='admin_artikel.php'
                </script>";
      }
    }
  }
}
?>

<h1 class="mt-4">Tambah Artikel</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Artikel</li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card p-3">
<form method="post" action="">
    <?php if(!empty($err)) : ?>
      <div class="alert alert-danger" role="alert"><?= $err ?></div>
    <?php endif; ?>
    <input type="text" name="judul" class="form-control mb-3" placeholder="Masukan judul">
    <textarea name="isi" cols="3" rows="3" class="form-control" placeholder="Masukan isi"></textarea>
    <button name="submit" type="submit" class="btn btn-primary mt-3">Tambah</button>
</form>
</div>

<?php
include("inc_footer.php");
?>
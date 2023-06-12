<?php

include("inc_header.php");

$err = "";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel = $id"));

if (isset($_POST['submit'])) {  
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $id_user = $_SESSION['user']['id_user'];

  if (empty($err)) {
    $now = date('Y-m-d');
    $sql = "UPDATE artikel SET judul='$judul', isi='$isi', tanggal='$now', id_user=$id_user";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data berhasil diedit!');
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

<h1 class="mt-4">Edit Artikel</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Artikel</li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card p-3">
<form method="post" action="">
    <?php if(!empty($err)) : ?>
      <div class="alert alert-danger" role="alert"><?= $err ?></div>
    <?php endif; ?>
    <input type="text" name="judul" class="form-control mb-3" placeholder="Masukan judul" value="<?= $data['judul'] ?>">
    <textarea name="isi" cols="3" rows="3" class="form-control" placeholder="Masukan isi"><?= $data['isi'] ?></textarea>
    <button name="submit" type="submit" class="btn btn-warning mt-3">Edit</button>
</form>
</div>

<?php
include("inc_footer.php");
?>
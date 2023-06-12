<?php

include("inc_header.php");

$sql1 = "SELECT * FROM pendaftar"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query
$err = "";

if (isset($_POST['submit'])) {
  $pendaftar = $_POST['pendaftar'];
  $keterangan = $_POST['keterangan'];
  $id_user = $_SESSION['user']['id_user'];

  if ($keterangan == '') {
      $err .= "Keterangan harus diisi";
  }

  if (empty($err)) {
    $sql = "INSERT INTO pengumuman (id_pendaftar, id_user, keterangan) VALUES ($pendaftar, $id_user, '$keterangan')";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data berhasil ditambah!');
                window.location.href='admin_pengumuman.php'
              </script>";
    } else {
      if(mysqli_errno($koneksi) == 1062) {
        echo "<script>
                  alert('Pendaftar yang dimasukan sudah ada!');
                  window.location.href='admin_pengumuman_tambah.php'
                </script>";
      }else{
        echo "<script>
                  alert('Terjadi kesalahan pada server!');
                  window.location.href='admin_pengumuman.php'
                </script>";
      }
    }
  }
}
?>

<h1 class="mt-4">Tambah Pengumuman</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pengumuman</li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card p-3">
<form method="post" action="">
    <?php if(!empty($err)) : ?>
      <div class="alert alert-danger" role="alert"><?= $err ?></div>
    <?php endif; ?>
    <select name="pendaftar" id="pilih-pendaftar" class="form-control">
      <?php while($row = mysqli_fetch_assoc($q1)) : ?>
        <option value="<?= $row['id_pendaftar'] ?>"><?= $row['nisn'] . ' - ' . $row['nama'] ?></option>
      <?php endwhile; ?>
    </select>
    
    <select name="keterangan" class="form-control mt-3">
      <option value="Lulus">Lulus</option>
      <option value="Tidak lulus">Tidak Lulus</option>
    </select>
    <button name="submit" type="submit" class="btn btn-primary mt-3">Tambah</button>
</form>
</div>

<?php
include("inc_footer.php");
?>
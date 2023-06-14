<?php

include("inc_header.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $catatan = $_POST['catatan'];

    $sql = "INSERT INTO validasi (id_pendaftar,status,catatan) VALUES ($id,'masalah','$catatan')";
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
?>

<h1 class="mt-4">Tambah Catatan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pendaftar</li>
    <li class="breadcrumb-item">Detail pendaftar</li>
    <li class="breadcrumb-item active">Tambah catatan</li>
</ol>

<div class="card p-3">
    <form method="post" action="">
        <textarea name="catatan" cols="3" rows="3" class="form-control" placeholder="Masukan catatan"></textarea>
        <button name="submit" type="submit" class="btn btn-danger mt-3">Tambah</button>
    </form>
</div>

<?php
include("inc_footer.php");
?>
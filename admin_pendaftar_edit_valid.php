<?php

include("inc_header.php");

$id = $_GET['id'];
$sql1 = "SELECT * FROM validasi WHERE id_pendaftar = $id";
$q1 = mysqli_query($koneksi, $sql1);
$data = mysqli_fetch_assoc($q1);

if (isset($_POST['submit'])) {
    $catatan = $_POST['catatan'];

    $sql = "UPDATE validasi SET catatan='$catatan' WHERE id_pendaftar = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Data berhasil diedit!');
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

<h1 class="mt-4">Edit Catatan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pendaftar</li>
    <li class="breadcrumb-item">Detail pendaftar</li>
    <li class="breadcrumb-item active">Edit catatan</li>
</ol>

<div class="card p-3">
    <form method="post" action="">
        <textarea name="catatan" cols="3" rows="3" class="form-control" placeholder="Masukan catatan"><?= $data['catatan'] ?></textarea>
        <button name="submit" type="submit" class="btn btn-danger mt-3">Edit</button>
    </form>
</div>

<?php
include("inc_footer.php");
?>
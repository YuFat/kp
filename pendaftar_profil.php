<?php
include("inc_header.php");

$id_user = $_SESSION['user']['id_user'];
$q = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id_user"));

$id_pendaftar = $q['id_pendaftar'] ?? 0;
$sql = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id_pendaftar = $id_pendaftar");
$num = mysqli_num_rows($sql);

$sql1 = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE id_pendaftar = $id_pendaftar");
$data = mysqli_fetch_assoc($sql1);
?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<?php if($num < 1) : ?>
    <div class="h-100 p-4 bg-body-tertiary border rounded-3">
        <h2>Lengkapi Profilmu</h2>
        <p>Silahkan lengkapi profilmu untuk mendaftar.</p>
        <a href="pendaftar_profil_tambah.php" class="btn btn-outline-secondary">Lengkapi profil</a>
    </div>
<?php else : ?>
    <?php if(is_null($data)) : ?>
        <div class="h-100 p-4 bg-body-tertiary border rounded-3 mb-3">
            <h2>Pengumuman belum tersedia</h2>
        </div>

        <div class="h-100 p-4 bg-body-tertiary border rounded-3">
            <h2>Profilmu Telah Diisi</h2>
            <p>Silahkan edit profilmu jika ada kesalahan input sebelum pengumuman.</p>
            <a href="pendaftar_profil_edit.php?id_pendaftar=<?= $id_pendaftar ?>" class="btn btn-outline-secondary">Edit profil</a>
        </div>
    <?php else : ?>
        <div class="h-100 p-4 bg-body-tertiary border rounded-3">
            <h2>Hasil Pengumuman <?= $data['keterangan'] ?></h2>
        </div>
    <?php endif ?>
<?php endif ?>

<?php
include("inc_footer.php");
?>


<?php
include("inc_header.php");

$sql1 = "SELECT COUNT(id_pendaftar) AS total FROM pendaftar";
$q1 = mysqli_query($koneksi, $sql1);
$data1 = mysqli_fetch_assoc($q1);

$sql2 = "SELECT COUNT(id_pengumuman) AS total FROM pengumuman WHERE keterangan = 'Lulus'";
$q2 = mysqli_query($koneksi, $sql2);
$data2 = mysqli_fetch_assoc($q2);

$sql3 = "SELECT COUNT(id_pengumuman) AS total FROM pengumuman WHERE keterangan = 'Tidak lulus'";
$q3 = mysqli_query($koneksi, $sql3);
$data3 = mysqli_fetch_assoc($q3);

?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>


<div class="row">
    <div class="col-xl-4 col-md-4">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Calon siswa yang mendaftar <?= date('Y') ?></div>
            <div class="card-footer">
                <p class="small text-white mb-0"><?= $data1['total'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Calon siswa yang lulus <?= date('Y') ?></div>
            <div class="card-footer">
                <p class="small text-white mb-0"><?= $data2['total'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Calon siswa yang tidak lulus <?= date('Y') ?></div>
            <div class="card-footer">
                <p class="small text-white mb-0"><?= $data3['total'] ?></p>
            </div>
        </div>
    </div>
</div>
<?php
include("inc_footer.php");
?>


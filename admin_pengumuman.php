<?php
include("inc_header.php");

$sql1 = "SELECT * FROM pengumuman JOIN pendaftar USING(id_pendaftar)";
$q1 = mysqli_query($koneksi, $sql1);

?>

<style>
    .table tr td:nth-child(1) {
        width: 5%;
        text-align: center;
    }
    .table tr td:nth-child(6) {
        width: 30%;
    }
</style>

<h1 class="mt-4">Pengumuman Pendaftar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pengumuman</li>
</ol>

<div class="card p-3">
    <a href="admin_pengumuman_tambah.php" class="btn btn-primary mb-3">Tambah Pendaftar</a>
    <table id="tabel-pendaftar" class="table table-striped" style="width:100%">
        <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <!-- Perulangan -->
            <?php while($row = mysqli_fetch_assoc($q1)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nisn'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nilai'] ?? '-' ?></td>
                    <td><?= $row['keterangan'] ?></td>
                    <td>
                        <a href="admin_proses_pengumuman_hapus.php?id=<?= $row['id_pengumuman'] ?>" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include("inc_footer.php");
?>
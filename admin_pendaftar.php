<?php
include("inc_header.php");

$sql1 = "SELECT * FROM pendaftar LEFT JOIN validasi USING(id_pendaftar)"; // query menampilkan relasi data pendaftar dan validasi. Tetap tampilkan data pendaftar walau validasi kosong
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query

?>

<style>
    .table tr td:nth-child(1) {
        width: 5%;
        text-align: center;
    }
    .table tr td:nth-child(7) {
        width: 30%;
    }
</style>

<h1 class="mt-4">Daftar Pendaftar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pendaftar</li>
</ol>

<div class="card p-3">
    <table id="tabel-pendaftar" class="table table-striped" style="width:100%">
        <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jenis kelamin</th>
            <th>Nilai</th>
            <th>Status validasi</th>
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
                    <td><?= $row['jns_kelamin'] ?></td>
                    <td><?= $row['nilai'] ?? '-' ?></td>
                    <td><?= $row['status'] ?? '-' ?></td>
                    <td>
                        <a href="admin_pendaftar_edit.php?id=<?= $row['id_pendaftar'] ?>" class="btn btn-warning">Edit Nilai</a>
                        <span class="mx-1"></span>
                        <a href="admin_lihat_pendaftar.php?id=<?= $row['id_pendaftar'] ?>" class="btn btn-success">Lihat</a>
                        <span class="mx-1"></span>
                        <a href="admin_proses_pendaftar_hapus.php?id=<?= $row['id_pendaftar'] ?>" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include("inc_footer.php");
?>
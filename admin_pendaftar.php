<?php
include("inc_header.php");

$sql1 = "SELECT * FROM pendaftar"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query

?>

<h1 class="mt-4">Daftar Pendaftar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pendaftar</li>
</ol>

<table id="tabel-pendaftar" class="table table-striped" style="width:100%">
    <thead>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Jenis kelamin</th>
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
                <td>
                    <a href="admin_lihat_pendaftar.php?id=<?= $row['id_pendaftar'] ?>" class="btn btn-success mb-2">Lihat</a>
                    <div class="mx-2"></div>
                    <a href="admin_proses_hapus.php?id=<?= $row['id_pendaftar'] ?>" class="btn btn-danger" onclick="return confirm('Kamu yakin?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include("inc_footer.php");
?>


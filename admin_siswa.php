<?php
include("inc_header.php");

$sql1 = "SELECT * FROM siswa"; // query menampilkan semua data dari tabel siswa
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query

?>

<h1 class="mt-4">Daftar Siswa</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Siswa</li>
</ol>

<table id="tabel-siswa" class="table table-striped" style="width:100%">
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
                    <button class="btn btn-warning mb-2">Lihat</button>
                    <div class="mx-2"></div>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
include("inc_footer.php");
?>


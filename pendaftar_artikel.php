<?php
include("inc_header.php");

$sql1 = "SELECT * FROM artikel"; // query menampilkan semua data dari tabel artikel
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query

?>

<style>
    .table tr td:nth-child(1) {
        width: 5%;
        text-align: center;
    }
    .table tr td:nth-child(2) {
        width: 25%;
    }
    .table tr td:nth-child(3) {
        width: 60%;
    }
    .table tr td:nth-child(5) {
        width: 10%;
    }
</style>

<h1 class="mt-4">Daftar Artikel</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Artikel</li>
</ol>

<div class="card p-3">
    <table id="tabel-artikel-user" class="table table-striped" style="width:100%">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <!-- Perulangan -->
            <?php while($row = mysqli_fetch_assoc($q1)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['isi'] ?></td>
                    <td><?= date('d-m-Y',strtotime($row['tanggal'])) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include("inc_footer.php");
?>
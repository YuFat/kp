<?php
include("inc_header.php");

$id = $_GET['id'];
$sql1 = "SELECT * FROM pendaftar WHERE id_pendaftar = $id"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query
$data = mysqli_fetch_assoc($q1);

?>

<style>
    .table tr td:nth-child(1) {
        width: 10%;
    }
    .table tr td:nth-child(2) {
        width: 10px;
        text-align: center;
    }
</style>

<h1 class="mt-4">Detail Pendaftar</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pendaftar</li>
    <li class="breadcrumb-item active">Detail pendaftar</li>
</ol>

<table class="table">
    <tr>
        <td>Nisn</td>
        <td>:</td>
        <td><?= $data['nisn'] ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $data['nama'] ?></td>
    </tr>
</table>

<?php
include("inc_footer.php");
?>


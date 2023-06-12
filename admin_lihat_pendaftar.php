<?php
include("inc_header.php");

$id = $_GET['id'];
$sql1 = "SELECT * FROM pendaftar WHERE id_pendaftar = $id"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query
$data = mysqli_fetch_assoc($q1);

?>

<style>
    .table tr td:nth-child(1) {
        width: 16%;
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
        <td>Nilai rata-rata</td>
        <td>:</td>
        <td><?= $data['nilai'] ?? '-' ?></td>
    </tr>
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
    <tr>
        <td>Jenis kelamin</td>
        <td>:</td>
        <td><?= $data['jns_kelamin'] ?></td>
    </tr>
    <tr>
        <td>Tempat, tanggal lahir</td>
        <td>:</td>
        <td><?= date('d-m-Y', strtotime($data['ttl'])) ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?= $data['agama'] ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $data['alamat'] ?></td>
    </tr>
    <tr>
        <td>Nomor Hp</td>
        <td>:</td>
        <td><?= $data['no_hp'] ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td><?= $data['email'] ?></td>
    </tr>
    <tr>
        <td>SKHU</td>
        <td>:</td>
        <td><a href="<?= $data['skhu'] ?>" target="__BLANK">Lihat SKHU</a></td>
    </tr>
    <tr>
        <td>Kartu keluarga</td>
        <td>:</td>
        <td><a href="<?= $data['krtu_keluarga'] ?>" target="__BLANK">Lihat kartu keluarga</a></td>
    </tr>
    <tr>
        <td>Raport</td>
        <td>:</td>
        <td><a href="<?= $data['raport'] ?>" target="__BLANK">Lihat raport</a></td>
    </tr>
    <tr>
        <td>Akta kelahiran</td>
        <td>:</td>
        <td><a href="<?= $data['akta_kelahiran'] ?>" target="__BLANK">Lihat akta kelahiran</a></td>
    </tr>
</table>

<?php
include("inc_footer.php");
?>


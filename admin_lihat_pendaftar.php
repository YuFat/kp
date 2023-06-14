<?php
include("inc_header.php");

$id = $_GET['id'];
$sql1 = "SELECT * FROM pendaftar WHERE id_pendaftar = $id"; // query menampilkan semua data dari tabel pendaftar
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query
$data = mysqli_fetch_assoc($q1);

$data2 = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM ortu WHERE id_pendaftar = $id"));

$cek = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM validasi WHERE id_pendaftar = $id"));

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

<h1 class="mt-4 d-flex justify-content-between">
    <span>Detail Pendaftar</span>
    <div>
        <?php if(is_null($cek)) : ?>
            <a href="admin_pendaftar_proses_valid.php?id=<?= $id?>" class="btn btn-success">Valid</a>
            <a href="admin_pendaftar_tambah_valid.php?id=<?= $id?>" class="btn btn-danger">Tambah catatan</a>
        <?php else : ?>
            <?php if($cek['status'] == 'sudah') : ?>
                <button type="button" class="btn btn-success">Valid</button>
            <?php elseif($cek['status'] == 'masalah') : ?>
                <a href="admin_pendaftar_proses_valid.php?id=<?= $id?>" class="btn btn-success">Valid</a>
                <a href="admin_pendaftar_edit_valid.php?id=<?= $id?>" class="btn btn-danger">Edit catatan</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Pendaftar</li>
    <li class="breadcrumb-item active">Detail pendaftar</li>
</ol>

<table class="table">
    <tr>
        <td>Catatan validasi</td>
        <td>:</td>
        <td><?= $cek['catatan'] ?? '-' ?></td>
    </tr>
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
        <td>Tanggal lahir</td>
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
    <tr>
        <td>Nama ayah</td>
        <td>:</td>
        <td><?= $data2['nama_ayah'] ?></td>
    </tr>
    <tr>
        <td>Nama ibu</td>
        <td>:</td>
        <td><?= $data2['nama_ibu'] ?></td>
    </tr>
    <tr>
        <td>Pekerjaan ayah</td>
        <td>:</td>
        <td><?= $data2['pekerjaan_ayah'] ?></td>
    </tr>
    <tr>
        <td>Pendidikan ayah</td>
        <td>:</td>
        <td><?= $data2['pendidikan_ayah'] ?></td>
    </tr>
    <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td><?= $data2['telp'] ?></td>
    </tr>
</table>

<?php
include("inc_footer.php");
?>


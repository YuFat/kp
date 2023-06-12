<?php

include("inc_header.php");

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $nisn = $_POST['nisn'];
  $ttl = date('Y-m-d', strtotime($_POST['ttl']));
  $agama = $_POST['agama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $jns_kelamin = $_POST['jns_kelamin'];
  $skhu = $_FILES['skhu'];
  $krtu_keluarga = $_FILES['krtu_keluarga'];
  $raport = $_FILES['raport'];
  $akta_kelahiran = $_FILES['akta_kelahiran'];
  $nama_ayah = $_POST['nama_ayah'];
  $nama_ibu = $_POST['nama_ibu'];
  $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
  $pendidikan_ayah = $_POST['pendidikan_ayah'];
  $telp = $_POST['telp'];

  $fileName1 = $skhu['name'];
  $fileTmpName1 = $skhu['tmp_name'];
  $fileSize1 = $skhu['size'];
  $fileError1 = $skhu['error'];
  $uniqueFileName1 = 'skhu/' . uniqid() . '_' . $fileName1;

  $fileName2 = $krtu_keluarga['name'];
  $fileTmpName2 = $krtu_keluarga['tmp_name'];
  $fileSize2 = $krtu_keluarga['size'];
  $fileError2 = $krtu_keluarga['error'];
  $uniqueFileName2 = 'kk/' . uniqid() . '_' . $fileName2;

  $fileName3 = $raport['name'];
  $fileTmpName3 = $raport['tmp_name'];
  $fileSize3 = $raport['size'];
  $fileError3 = $raport['error'];
  $uniqueFileName3 = 'raport/' . uniqid() . '_' . $fileName3;

  $fileName4 = $akta_kelahiran['name'];
  $fileTmpName4 = $akta_kelahiran['tmp_name'];
  $fileSize4 = $akta_kelahiran['size'];
  $fileError4 = $akta_kelahiran['error'];
  $uniqueFileName4 = 'akta/' . uniqid() . '_' . $fileName4;

  // Query hapus berdasarkan id tertentu
  $sql = "INSERT INTO pendaftar (nama,nisn,ttl,agama,alamat,no_hp,email,jns_kelamin,skhu,krtu_keluarga,raport,akta_kelahiran) VALUES ('$nama','$nisn','$ttl','$agama','$alamat','$no_hp','$email','$jns_kelamin','$uniqueFileName1','$uniqueFileName2','$uniqueFileName3','$uniqueFileName4')";

  if (mysqli_query($koneksi, $sql)) {
      $data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pendaftar ORDER BY id_pendaftar DESC"));
      $id = $data['id_pendaftar'];
      $id_user = $_SESSION['user']['id_user'];
      mysqli_query($koneksi, "INSERT INTO ortu (id_pendaftar,nama_ayah,nama_ibu,pekerjaan_ayah,pendidikan_ayah,telp) VALUES ($id,'$nama_ayah','$nama_ibu','$pekerjaan_ayah','$pendidikan_ayah','$telp')");
      mysqli_query($koneksi, "UPDATE user SET id_pendaftar = $id WHERE id_user = $id_user");
      move_uploaded_file($fileTmpName1, $uniqueFileName1);
      move_uploaded_file($fileTmpName2, $uniqueFileName2);
      move_uploaded_file($fileTmpName3, $uniqueFileName3);
      move_uploaded_file($fileTmpName4, $uniqueFileName4);

      echo "<script>
              alert('Data berhasil ditambahkan!');
              window.location.href='pendaftar_profil.php'
            </script>";
  } else {
    echo "<script>
              alert('Terjadi kesalahan pada server!');
              window.location.href='pendaftar_profil_tambah.php'
            </script>";
  }
}
?>

<h1 class="mt-4">Isi Profil</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Profil</li>
    <li class="breadcrumb-item active">Tambah profil</li>
</ol>

<div class="card p-3">
<form method="post" action="" enctype="multipart/form-data">
  <div class="form-group mb-3">
    <label class="mb-1">Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Masukan nama" value="a">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">NISN</label>
    <input type="number" name="nisn" class="form-control" placeholder="Masukan nisn" value="1">
  </div>
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="form-group">
        <label class="mb-1">Tanggal lahir</label>
        <input type="date" name="ttl" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="mb-1">Agama</label>
        <select name="agama" class="form-control">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Alamat</label>
    <textarea name="alamat" class="form-control mb-3" cols="2" rows="2" placeholder="Masukan alamat">b</textarea>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="mb-1">Nomor HP</label>
        <input type="number" name="no_hp" class="form-control" value="2">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="mb-1">Email</label>
        <input type="email" name="email" class="form-control" value="s@gmail.com">
      </div>
    </div>
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Jenis kelamin</label>
    <select name="jns_kelamin" class="form-control">
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">SKHU</label>
    <input type="file" name="skhu" class="form-control">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Kartu keluarga</label>
    <input type="file" name="krtu_keluarga" class="form-control">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Raport</label>
    <input type="file" name="raport" class="form-control">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Akta kelahiran</label>
    <input type="file" name="akta_kelahiran" class="form-control">
  </div>
  <hr>
  <div class="form-group mb-3">
    <label class="mb-1">Nama ayah</label>
    <input type="text" name="nama_ayah" class="form-control" placeholder="Masukan nama ayah" value="4">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Nama ibu</label>
    <input type="text" name="nama_ibu" class="form-control" placeholder="Masukan nama ibu" value="5">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Pekerjaan ayah</label>
    <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Masukan pekerjaan ayah" value="6">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">Pendidikan ayah</label>
    <input type="text" name="pendidikan_ayah" class="form-control" placeholder="Masukan pendidikan ayah" value="7">
  </div>
  <div class="form-group mb-3">
    <label class="mb-1">No HP</label>
    <input type="text" name="telp" class="form-control" placeholder="Masukan no hp" value="8">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
</form>
</div>

<?php
include("inc_footer.php");
?>
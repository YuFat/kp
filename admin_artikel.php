<?php
include("inc_header.php");

$sql1 = "SELECT * FROM artikel"; // query menampilkan semua data dari tabel artikel
$q1 = mysqli_query($koneksi, $sql1); // mengeksekusi syntax query

?>

<h1 class="mt-4">Daftar Artikel</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Artikel</li>
</ol>



<?php
include("inc_footer.php");
?>
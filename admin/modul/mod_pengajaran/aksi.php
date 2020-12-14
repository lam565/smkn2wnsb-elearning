<?php 
include "../../../system/koneksi.php";

$kd_mapel=$_POST['kd_mapel'];
$kd_jrs=$_POST['kd_jurusan'];
$kd_kelas=$_POST['kd_kls'];
$kd_guru=$_POST['kd_guru'];

foreach ($kd_kelas as $kd) {
	$qins=mysqli_query($connect,"INSERT INTO pengajaran (kd_mapel,kd_kelas,kd_guru) VALUES ('$kd_mapel','$kd','$kd_guru')");
}

if ($qins){
	echo "<script>alert('Berhasil menambah pengajar matapelajaran'); location='../../media.php?module=pengajaran'</script>";
} else {
	echo "<script>alert('GAGAL'); location='../../media.php?module=pengajaran'</script>";
}

?>
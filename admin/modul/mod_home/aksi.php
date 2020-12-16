<?php 
include "../../../system/koneksi.php";

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		$kd_mapel=$_POST['kd_mapel'];
		$kd_jrs=$_POST['kd_jurusan'];
		$kd_kelas=$_POST['kd_kls'];
		$kd_guru=$_POST['kd_guru'];

		foreach ($kd_kelas as $kd) {
			$qins=mysqli_query($connect,"INSERT INTO pengajaran (kd_mapel,kd_kelas,kd_guru) VALUES ('$kd_mapel','$kd','$kd_guru')");
		}

		if ($qins){
			echo "<script>alert('Berhasil menambah pengajar matapelajaran'); location='../../media.php?module=home'</script>";
		} else {
			echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
		}
		break;

		case 'del':
		$kd=$_GET['kd'];

		$qdel="DELETE FROM pengajaran WHERE kd_pengajaran='$kd'";
		$del=mysqli_query($connect,$qdel);
		if ($del){
			echo "<script>alert('Berhasil menghapus'); location='../../media.php?module=home'</script>";
		} else {
			echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
		}
		break;
		
		default:
		echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
		break;
	}
}

?>
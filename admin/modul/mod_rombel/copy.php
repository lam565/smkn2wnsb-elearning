<?php 

include "../../../system/koneksi.php";

if (isset($_GET['action']) AND $_GET['action'] == 'salindata') {

	$kd_tajar = $_POST['tahun_ajar'];
	$kd_kelas = $_POST['kelas'];
	$kd_kelasnow = $_POST['kelasnow'];
	$kd_tajarnow = $_POST['tajarnow'];

	$daftsiswa = "";
	$qnis = mysqli_query($connect,"SELECT nis FROM rombel WHERE kd_kelas='$kd_kelas' AND kd_tajar='$kd_tajar'");

	while ($nis = mysqli_fetch_array($qnis)) {
		$daftsiswa = $daftsiswa.",".$nis['nis'];
	}
	
	if ($daftsiswa!=""){
		$daftsiswa=substr($daftsiswa, 1);
		$siswa = explode(",", $daftsiswa);

		$sql = "";
		$h = 0;
		foreach ($siswa as $id) {
			$sql .= "INSERT INTO rombel VALUES ('$id', '$kd_kelasnow', '$kd_tajarnow');";
			$h++;
		}
		if (mysqli_multi_query($connect, $sql)){
			echo "<script>alert('Berhasil menyalin $h data siswa'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
		} else {
			echo "<script>alert('Gagal'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
		}

	} else {
		echo "<script>alert('Gagal, tidak ada data disalin'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
	}
	
} else if (isset($_GET['action']) AND $_GET['action'] == 'salindata2') {

	$data = explode(",", $_POST['kelas']);
	$kd_kelas = $data[0];
	$kd_tajar = $data[1];
	$kd_kelasnow = $_POST['kelasnow'];
	$kd_tajarnow = $_POST['tajarnow'];

	$daftsiswa = "";
	$qnis = mysqli_query($connect,"SELECT nis FROM rombel WHERE kd_kelas='$kd_kelas' AND kd_tajar='$kd_tajar'");

	while ($nis = mysqli_fetch_array($qnis)) {
		$daftsiswa = $daftsiswa.",".$nis['nis'];
	}
	
	if ($daftsiswa!=""){
		$daftsiswa=substr($daftsiswa, 1);
		$siswa = explode(",", $daftsiswa);

		$sql = "";
		$h = 0;
		foreach ($siswa as $id) {
			$sql .= "INSERT INTO rombel VALUES ('$id', '$kd_kelasnow', '$kd_tajarnow');";
			$h++;
		}
		if (mysqli_multi_query($connect, $sql)){
			echo "<script>alert('Berhasil menyalin $h data siswa'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
		} else {
			echo "<script>alert('Gagal'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
		}

	} else {
		echo "<script>alert('Gagal, tidak ada data disalin'); window.location = '../../media.php?module=rombel&kls=$kd_kelasnow'</script>";
	}

}

?>
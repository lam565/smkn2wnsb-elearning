<?php 
include "../../../system/koneksi.php";

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'rename':
		$kds=$_POST['nis'];
		$newname=$_POST['nama_baru'];
		$qupd=mysqli_query($connect,"UPDATE siswa SET nama='$newname' WHERE nis='$kds'");
		if ($qupd) {
			echo "<script>alert('Berhasil mengubah nama'); location='../../media.php?module=home'</script>";
		} else {
			echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
		}
		break;

		case 'updpass':
		$kds=$_POST['nis'];
		$username=$_POST['username'];
		$oldpass=md5($_POST['passlama']);
		$newpass1=md5($_POST['passbaru1']);
		$newpass2=md5($_POST['passbaru2']);

		$cekpasslama=mysqli_query($connect,"SELECT login.password FROM login,siswa WHERE login.username=siswa.username AND siswa.nis='$kds' AND login.password='$oldpass'");
		$cek=mysqli_num_rows($cekpasslama);
		if ($cek<1) {
			echo "<script>alert('GAGAL, password lama salah'); location='../../media.php?module=home'</script>";
		} else {
			if ($newpass1 != $newpass2) {
				echo "<script>alert('GAGAL, Verifikasi password baru tidak cocok'); location='../../media.php?module=home'</script>";
			} else {
				$qupd=mysqli_query($connect,"UPDATE login SET password='$newpass1' WHERE username='$username'");
				if ($qupd) {
					echo "<script>alert('Berhasil mengubah password'); location='../../media.php?module=home'</script>";
				} else {
					echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
				}
			}	
		}

		break;

		case 'absen':
			$nis = $_GET['nis'];
			$kelas = $_GET['kls'];
			$mapel = $_GET['mp'];
			date_default_timezone_set("Asia/Bangkok");
			$tgl = date('Y-m-d H:i:s');

			$absensi = mysqli_query($connect,"INSERT INTO absensi (nis,tgl_absensi,kd_kelas,kd_mapel) VALUES ('$nis','$tgl','$kelas','$mapel')");
			if ($absensi) {
				echo "<script>alert('Berhasil absensi'); location='../../media.php?module=home'</script>";
			} else {
				echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
			}
		break;
	}
} else {
	echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
}
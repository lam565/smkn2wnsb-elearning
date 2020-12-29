<?php 
include "../../../system/koneksi.php";

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		if (!isset($_POST['kd_kls']) OR empty($_POST['kd_kls'])) {
			echo "<script>alert('Gagal karena Tidak memilih kelas '); location='../../media.php?module=home'</script>";
		}
		$kd_mapel=$_POST['kd_mapel'];
		$kd_jrs=$_POST['kd_jurusan'];
		$kd_kelas=$_POST['kd_kls'];
		$kd_guru=$_POST['kd_guru'];

		function cek_pengajar($con,$mp,$kls){
			$query=mysqli_query($con,"SELECT kd_guru FROM pengajaran WHERE kd_mapel='$mp' AND kd_kelas='$kls'");
			if (mysqli_num_rows($query)) {
				$pengajar=mysqli_fetch_array($query);
				$cekjumpengajar=explode(",", $pengajar['kd_guru']);
				$jpengajar = count($cekjumpengajar);
				if ($jpengajar==1) {
					return 1;
				} else {
					return 2;
				}
			} else {
				return 0;
			}
		}
		foreach ($kd_kelas as $kd) {
		//cek kd_guru
			$cek=cek_pengajar($connect,$kd_mapel,$kd);
			switch ($cek) {
				case '1':
				$query=mysqli_query($connect,"SELECT kd_pengajaran,kd_guru FROM pengajaran WHERE kd_mapel='$kd_mapel' AND kd_kelas='$kd'");
				$guru1=mysqli_fetch_array($query);
				$kd_insert=$guru1['kd_guru'].','.$kd_guru;

				$qins=mysqli_query($connect,"UPDATE pengajaran SET kd_guru='$kd_insert' WHERE kd_pengajaran='$guru1[kd_pengajaran]'");

				if ($qins){
					echo "<script>alert('Berhasil menambah pengajar matapelajaran'); location='../../media.php?module=home'</script>";
				} else {
					echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
				}
				break;
				case '2':
				echo "<script>alert('GAGAL karena sudah penuh'); location='../../media.php?module=home'</script>";
				break;
				case '0':
				$kd_insert=$kd_guru;
				$qins=mysqli_query($connect,"INSERT INTO pengajaran (kd_mapel,kd_kelas,kd_guru) VALUES ('$kd_mapel','$kd','$kd_insert')");
				if ($qins){
					echo "<script>alert('Berhasil menambah pengajar matapelajaran'); location='../../media.php?module=home'</script>";
				} else {
					echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
				}
				break;

				default:
				echo "<script>alert('GAGAL karena sudah penuh'); location='../../media.php?module=home'</script>";
				break;
			}
		}
		break;

		case 'del':
		$kd=$_GET['kd'];
		$kdg=$_GET['kdg'];

		$query = mysqli_query($connect,"SELECT kd_guru FROM pengajaran WHERE kd_pengajaran='$kd'");
		$jum = mysqli_num_rows($query);
		$pengajar = mysqli_fetch_array($query);
		if ($jum>0){
			$cekjumpengajar=explode(",", $pengajar['kd_guru']);
			$jpengajar = count($cekjumpengajar);
			if ($jpengajar==2){
				if (($key = array_search($kdg, $cekjumpengajar)) !== false) {
					unset($cekjumpengajar[$key]);
					$newkdgp=implode(",",$cekjumpengajar);
				}
				$qup="UPDATE pengajaran SET kd_guru='$newkdgp' WHERE kd_pengajaran='$kd'";
				$updt=mysqli_query($connect,$qup);
				if ($updt){
					echo "<script>alert('Berhasil menghapus'); location='../../media.php?module=home'</script>";
				} else {
					echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
				}
			} else {
				$qdel="DELETE FROM pengajaran WHERE kd_pengajaran='$kd'";
				$del=mysqli_query($connect,$qdel);
				if ($del){
					echo "<script>alert('Berhasil menghapus'); location='../../media.php?module=home'</script>";
				} else {
					echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
				}
			}
		} else {
			echo "<script>alert('GAGAL data tidak ditemukan'); location='../../media.php?module=home'</script>";
		}
		break;

		case 'rename':
		$kdg=$_POST['kd_guru'];
		$newname=$_POST['nama_baru'];
		$qupd=mysqli_query($connect,"UPDATE guru SET nama='$newname' WHERE kd_guru='$kdg'");
		if ($qupd) {
			echo "<script>alert('Berhasil mengubah nama'); location='../../media.php?module=home'</script>";
		} else {
			echo "<script>alert('GAGAL'); location='../../media.php?module=home'</script>";
		}
		break;

		case 'updpass':
		$kdg=$_POST['kd_guru'];
		$username=$_POST['username'];
		$oldpass=md5($_POST['passlama']);
		$newpass1=md5($_POST['passbaru1']);
		$newpass2=md5($_POST['passbaru2']);

		$cekpasslama=mysqli_query($connect,"SELECT password FROM login,guru WHERE login.username=guru.username AND guru.kd_guru='$kdg' AND login.password='$oldpass'");
		if (mysqli_num_rows($cekpasslama)<1) {
			echo "<script>alert('GAGAL, password lama salah'); location='../../media.php?module=home'</script>";
		}

		if ($newpass1 != $newpass2) {
			echo "<script>alert('GAGAL, Verifikasi password baru tidak cocok'); location='../../media.php?module=home'</script>";
		}

		$qupd=mysqli_query($connect,"UPDATE login SET password='$newpass1' WHERE username='$username'");
		if ($qupd) {
			echo "<script>alert('Berhasil mengubah password'); location='../../media.php?module=home'</script>";
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
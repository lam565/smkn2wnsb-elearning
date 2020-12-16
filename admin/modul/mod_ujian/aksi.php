<?php 
include "../../../system/koneksi.php";
date_default_timezone_set("Asia/Bangkok");

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		$nama_ujian=$_POST['nama_ujian'];
		$deskripsi=$_POST['deskripsi'];
		$tgl_ujian=$_POST['tgl_mulai']." ".$_POST['jam_mulai'].":00";
		$jam=$_POST['jam'];
		$menit=$_POST['menit'];
		$detik=$_POST['detik'];
		$kd_soal=$_POST['kd_soal'];
		$kd_kelas=$_POST['kd_kls'];
		$kd_mapel=$_POST['mapel'];
		$kd_guru=$_POST['kd_guru'];
		$tglup=date("Y-m-d H:i:s");

		foreach ($kd_kelas as $kd) {
			//buat kode ujian 07
			$thn=date("Y");
			$k="07".$thn.$kd_guru;
			$qcek="SELECT MAX(kd_ujian) AS kode FROM ujian WHERE kd_ujian LIKE '$k%'";
			$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
			$kodeurut=substr($max['kode'],strlen($k),3)+1;
			if ($kodeurut<10) {
				$kodeurut="00".$kodeurut;
			} else if ($kodeurut<100){
				$kodeurut="0".$kodeurut;
			}
			$kd_ujian=$k.$kodeurut;

			$query="INSERT INTO ujian VALUES ('$kd_ujian','$nama_ujian','$deskripsi','$tgl_ujian','$jam','$menit','$detik','$kd_soal','$kd','$kd_mapel','$kd_guru')";
			$qins=mysqli_query($connect,$query);
			if ($qins) {
				$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel,kd_guru) 
				VALUES ('ujian','$kd_ujian','$tglup','$kd','$kd_mapel','$kd_guru')";
				mysqli_query($connect,$qt);
				$s="scs";
				echo "<script>alert('Berhasil membuat ujian'); location='../../media.php?module=ujian'</script>";
			} else {
				echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
			}
		}

		break;

		case 'edit':
		$kd_ujian=$_POST['kd_ujian'];
		$nama_ujian=$_POST['nama_ujian'];
		$deskripsi=$_POST['deskripsi'];
		$tgl_ujian=$_POST['tgl_mulai']." ".$_POST['jam_mulai'].":00";
		$jam=$_POST['jam'];
		$menit=$_POST['menit'];
		$detik=$_POST['detik'];
		$kd_soal=$_POST['kd_soal'];
		$kd_kelas=$_POST['kd_kelas'];
		$kd_mapel=$_POST['mapel'];
		$kd_guru=$_POST['kd_guru'];
		$tglup=date("Y-m-d H:i:s");

		$qupdate="UPDATE ujian SET nama_ujian='$nama_ujian',deskripsi='$deskripsi',tgl_ujian='$tgl_ujian',jam='$jam',menit='$menit',detik='$detik',kd_soal='$kd_soal',kd_kelas='$kd_kelas',kd_mapel='$kd_mapel',kd_guru='$kd_guru' WHERE kd_ujian='$kd_ujian'";
		$updt=mysqli_query($connect,$qupdate);
		if ($updt){
			echo "<script>alert('Berhasil mengubah data ujian'); location='../../media.php?module=ujian'</script>";
		} else {
			echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
		}
		break;

		case 'del':
		if (isset($_GET['kdu'])){
			$kd_ujian=$_GET['kdu'];
			$query="DELETE FROM ujian WHERE kd_ujian='$kd_ujian'";
			$del=mysqli_query($connect,$query);
			if ($del) {
				$del_nilai=mysqli_query($connect,"DELETE FROM nilai_ujian WHERE kd_ujian='$kd_ujian'");
				$del_timeline=mysqli_query($connect,"DELETE FROM timeline WHERE jenis='ujian' AND id_jenis='$kd_ujian'");
				echo "<script>alert('Berhasil menghapus ujian'); location='../../media.php?module=ujian'</script>";
			} else {
				echo "<script>alert('Gagal menghapus'); location='../../media.php?module=ujian'</script>";
			}
		} else {
			echo "<script>alert('Gagal menghapus'); location='../../media.php?module=ujian'</script>";
		}
		break;
		
		default:
		echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
		break;
	}

} else {
	echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
}


?>
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
					echo "<script>alert('Berhasil membuat ujian'); location='../../media.php?module=ujian'</script>";
				} else {
					echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
				}
		}

		break;

		case 'edit':
			
		break;

		case 'del':
			
		break;
		
		default:
		echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
		break;
	}

} else {
	echo "<script>alert('Gagal'); location='../../media.php?module=ujian'</script>";
}


?>
<?php
include "../../../system/koneksi.php";

$kelas=$_POST['kd_kls'];
$nama_materi=$_POST['nama_materi'];
$desc=$_POST['deskripsi'];
$forl=$_POST['ForL'];
$pertemuan=$_POST['pertemuan'];
$mapel=$_POST['mapel'];
date_default_timezone_set("Asia/Bangkok");
$tglup=date('Y-m-d H:i:s');
$kd_guru=$_POST['kd_guru'];

if ($forl=='file') {
	$temp = "../../files/materi/";
	if (!file_exists($temp)){
		mkdir($temp);
	}
	$fileupload      = $_FILES['filemateri']['tmp_name'];
	$filename       = $_FILES['filemateri']['name'];
	$filetype       = $_FILES['filemateri']['type'];

	if (!empty($fileupload)){
		$acak = rand(00000000, 99999999);

		$filext       = substr($filename, strrpos($filename, '.'));
		$filext       = str_replace('.','',$filext);
		$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
		$newfilename   = $nama_materi."_".$acak.'.'.$filext;

		foreach ($kelas as $kd) {
			//buat kode materi 01
			$thn=date("Y");
			$k="01".$thn.$kd_guru;
			$qmat="SELECT MAX(kd_materi) AS kode FROM materi WHERE kd_materi LIKE '$k%'";
			$max=mysqli_fetch_array(mysqli_query($connect,$qmat));
			$kodeurut=substr($max['kode'],strlen($k),3)+1;
			if ($kodeurut<10) {
				$kodeurut="00".$kodeurut;
			} else if ($kodeurut<100){
				$kodeurut="0".$kodeurut;
			} else {

			}
			$kd_materi=$k.$kodeurut;
			$q="INSERT INTO materi (kd_materi,nama_materi,deskripsi,ForL,file,tgl_up,pertemuan,kd_mapel,kd_kelas,kd_guru)
			VALUES ('$kd_materi','$nama_materi','$desc','$forl','$newfilename','$tglup','$pertemuan','$mapel','$kd','$kd_guru')";
			$insmateri=mysqli_query($connect,$q);
			if ($insmateri) {

				$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel,kd_guru) 
				VALUES ('materi','$kd_materi','$tglup','$kd','$mapel','$kd_guru')";
				mysqli_query($connect,$qt);
				$s="scs";
			} else {
				$s="err";
				echo "Terjadi Kesalahan!";
			}
		}
		if ($s=='scs') {
			move_uploaded_file($_FILES["filemateri"]["tmp_name"], $temp.$newfilename);
			echo "<script>alert('Berhasil diupload Materi'); location='../../media.php?module=materi'</script>";
		} else {
			echo "Terjadi Kesalahan!";
		}

	}
} else {
	$file=$_POST['linkmateri'];

	foreach ($kelas as $kd) {
		//buat kode materi 01
			$thn=date("Y");
			$k="01".$thn.$kd_guru;
			$qmat="SELECT MAX(kd_materi) AS kode FROM materi WHERE kd_materi LIKE '$k%'";
			$max=mysqli_fetch_array(mysqli_query($connect,$qmat));
			$kodeurut=substr($max['kode'],strlen($k),3)+1;
			if ($kodeurut<10) {
				$kodeurut="00".$kodeurut;
			} else if ($kodeurut<100){
				$kodeurut="0".$kodeurut;
			} else {

			}
			$kd_materi=$k.$kodeurut;
		$q="INSERT INTO materi (kd_materi,nama_materi,deskripsi,ForL,file,tgl_up,pertemuan,kd_mapel,kd_kelas,kd_guru)
		VALUES ('$kd_materi','$nama_materi','$desc','$forl','$file','$tglup','$pertemuan','$mapel','$kd','$kd_guru')";
		$insmateri=mysqli_query($connect,$q);
		if ($insmateri) {

			$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel,kd_guru) 
			VALUES ('materi','$kd_materi','$tglup','$kd','$mapel','$kd_guru')";
			mysqli_query($connect,$qt);
			echo "<script>alert('Berhasil membuat materi'); location='../../media.php?module=materi'</script>";
		} else {
			echo "Terjadi Kesalahan!";
		}
	}
}

?>
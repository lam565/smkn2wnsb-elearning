<?php
include "../../../system/koneksi.php";

$kelas=$_POST['kd_kls'];
$nama_materi=$_POST['nama_materi'];
$pertemuan=$_POST['pertemuan'];
$desc=$_POST['deskripsi'];
$mapel=$_POST['mapel'];
$tglup=date('Y-m-d H:i:s');

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
	$newfilename   = $filename."_".$acak.'.'.$filext;

	foreach ($kelas as $kd) {
		$q="INSERT INTO materi (nama_materi,deskripsi,file,tgl_up,pertemuan,kd_mapel,kd_kelas)
		VALUES ('$nama_materi','$desc','$newfilename','$tglup','$pertemuan','$mapel','$kd')";
		$insmateri=mysqli_query($connect,$q);
		if ($insmateri) {
			$hmat=mysqli_query($connect,"SELECT MAX(kd_materi) AS kode FROM materi");
			$kode=mysqli_fetch_array($hmat);

			$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel) 
			VALUES ('materi','$kode[kode]','$tglup','$kd','$mapel')";
			mysqli_query($connect,$qt);
			$s="scs";
		} else {
			$s="err";
			echo "Terjadi Kesalahan!";
		}
	}
	if ($s=='scs') {
		move_uploaded_file($_FILES["filemateri"]["tmp_name"], $temp.$newfilename);
		header("location:../../media.php?module=materi");
	} else {
		echo "Terjadi Kesalahan!";
	}

}

?>
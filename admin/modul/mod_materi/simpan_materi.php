<?php
include "../../../system/koneksi.php";

$id_detail=$_POST['kdetail'];
$nama_materi=$_POST['nama_materi'];
$pertemuan=$_POST['pertemuan'];
$desc=$_POST['deskripsi'];
$tglup=date('Y-m-d');

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

	$q="INSERT INTO materi (id_detail,nama_materi,deskripsi,file,tgl_up,pertemuan)
	VALUES ('$id_detail','$nama_materi','$desc','$newfilename','$tglup','$pertemuan')";
	$insmateri=mysqli_query($connect,$q);
	if ($insmateri) {
		move_uploaded_file($_FILES["filemateri"]["tmp_name"], $temp.$newfilename);
		header("location:../../media.php?module=materi");
	} else {
		echo "Terjadi Kesalahan!";
	}
}

?>
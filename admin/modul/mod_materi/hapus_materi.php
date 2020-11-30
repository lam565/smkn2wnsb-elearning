<?php 
	include "../../../system/koneksi.php";

	$kd=$_GET['id'];
	$qh="SELECT file FROM materi WHERE kd_materi='$kd'";
	$qfile=mysqli_query($connect,$qh);
	$rfile=mysqli_fetch_array($qfile);
	$file="../../files/materi/".$rfile['file'];

	$q="DELETE FROM materi WHERE kd_materi='$kd'";

	if (mysqli_query($connect,$q)){
		$delt="DELETE FROM timeline WHERE jenis='materi' AND id_jenis='$kd'";
		unlink($file);
		header("location:../../media.php?module=materi");
		
	}
 ?>
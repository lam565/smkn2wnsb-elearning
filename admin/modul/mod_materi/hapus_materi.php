<?php 
	include "../../../system/koneksi.php";

	$kd=$_GET['id'];
	$qh="SELECT file FROM materi WHERE kd_materi='$kd'";
	$qfile=mysqli_query($connect,$qh);
	$rfile=mysqli_fetch_array($qfile);
	$file="../../files/materi/".$rfile['file'];

	$q="DELETE FROM materi WHERE kd_materi='$kd'";

	if (mysqli_query($connect,$q)){
		$delt="DELETE FROM timeline WHERE timeline.jenis='materi' AND timeline.id_jenis='$kd'";
		mysqli_query($connect,$delt);
		unlink($file);
		echo "<script>alert('Berhasil hapus Materi'); location='../../media.php?module=materi'</script>";
		
	}
 ?>
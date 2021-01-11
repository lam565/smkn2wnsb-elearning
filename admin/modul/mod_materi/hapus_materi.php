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
	$qwr=mysqli_query($connect,"SELECT kd_materi FROM materi WHERE file='$rfile[file]'");
	if ( mysqli_num_rows($qwr)<1 ){
		unlink($file);
	}
	echo "<script>alert('Berhasil hapus Materi'); location='../../media.php?module=materi'</script>";
	
}
?>
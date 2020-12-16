<?php 
include "../../../system/koneksi.php";
date_default_timezone_set("Asia/Bangkok");

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'tbjawab':
		$kd=$_POST['kd_kerja'];
		$kdt=$_POST['kd_tugas'];
		$temp = "../../files/kerja_tugas/";
		if (!file_exists($temp)){
			mkdir($temp);
		}
		$fileupload      = $_FILES['ftugas']['tmp_name'];
		$filename       = $_FILES['ftugas']['name'];
		$filetype       = $_FILES['ftugas']['type'];

		if (!empty($fileupload)){

			$filext       = substr($filename, strrpos($filename, '.'));
			$filext       = str_replace('.','',$filext);
			$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
			$newfilename   = $kd.'.'.$filext;

			$cs=mysqli_query($connect,"SELECT file_kerja FROM kerja_tugas WHERE kd_kerja='$kd'");
			$rcs=mysqli_fetch_array($cs);
			if ($rcs['file_kerja']!='T'){
				unlink($temp.$rcs['file_kerja']);
			}
			$qup="UPDATE kerja_tugas SET file_kerja='$newfilename', status_kerja='K' WHERE kd_kerja='$kd'";

			if (mysqli_query($connect,$qup)) {
				move_uploaded_file($_FILES["ftugas"]["tmp_name"], $temp.$newfilename);
				echo "<script>alert('Berhasil menambah tugas'); location='../../media.php?module=detailtugas&kd=$kdt'</script>";
			} else {
				echo "<script>alert('Terjadi Kesalahan'); location='location:../../media.php?module=detailtugas&kd=$kd';</script>";
			}
		}
		break;

		default:
				echo "error";
		break;
	}
}
?>
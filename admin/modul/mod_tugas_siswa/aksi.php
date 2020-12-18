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
		$namafile = array();
		$jfile=$_POST['jfile'];
		for ($i=1; $i <= $jfile ; $i++) { 
			$fileupload      = $_FILES['ftugas'.$i]['tmp_name'];
			$filename       = $_FILES['ftugas'.$i]['name'];
			$filetype       = $_FILES['ftugas'.$i]['type'];

			if (!empty($fileupload)){

				$filext       = substr($filename, strrpos($filename, '.'));
				$filext       = str_replace('.','',$filext);
				$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
				$namafile[]   = $kd.'_'.$i.'.'.$filext;
			}
		}
		$newfilename = implode(",", $namafile);

		//$fileupload      = $_FILES['ftugas']['tmp_name'];
		//$filename       = $_FILES['ftugas']['name'];
		//$filetype       = $_FILES['ftugas']['type'];

		if (!empty($fileupload)){

			//$filext       = substr($filename, strrpos($filename, '.'));
			//$filext       = str_replace('.','',$filext);
			//$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
			//$newfilename   = $kd.'.'.$filext;

			$cs=mysqli_query($connect,"SELECT file_kerja FROM kerja_tugas WHERE kd_kerja='$kd'");
			$rcs=mysqli_fetch_array($cs);
			if ($rcs['file_kerja']!='T'){
				$filenya=explode(",", $rcs['file_kerja']);
				foreach ($filenya as $fhps) {
					unlink($temp.$fhps);
				}
				
			}
			$qup="UPDATE kerja_tugas SET file_kerja='$newfilename', status_kerja='K' WHERE kd_kerja='$kd'";

			if (mysqli_query($connect,$qup)) {
				$n=1;
				foreach ($namafile as $gbr) {
					move_uploaded_file($_FILES["ftugas".$n]["tmp_name"], $temp.$gbr);
					$n++;
				}
				
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
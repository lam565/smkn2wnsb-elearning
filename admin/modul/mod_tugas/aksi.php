<?php 
include "../../../system/koneksi.php";

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		
		$judul=$_POST['judul_tugas'];
		$desc=$_POST['deskripsi'];
		$batas=$_POST['batas'];
		$tglup=date('Y-m-d H:i:s');
		$kelas=$_POST['kd_kls'];
		$mapel=$_POST['mapel'];
		$kd_guru=$_POST['kd_guru'];

		$temp = "../../files/tugas/";
		if (!file_exists($temp)){
			mkdir($temp);
		}
		$fileupload      = $_FILES['fuptugas']['tmp_name'];
		$filename       = $_FILES['fuptugas']['name'];
		$filetype       = $_FILES['fuptugas']['type'];

		if (!empty($fileupload)){
			$acak = rand(00000000, 99999999);

			$filext       = substr($filename, strrpos($filename, '.'));
			$filext       = str_replace('.','',$filext);
			$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
			$newfilename   = $filename."_".$acak.'.'.$filext;

			foreach ($kelas as $kd) {
				$q="INSERT INTO tugas (judul_tugas,deskripsi,batas_kumpul,file,tgl_up,kd_kelas,kd_mapel,kd_guru)
				VALUES ('$judul','$desc','$batas','$newfilename','$tglup','$kd','$mapel','$kd_guru')";
				$instugas=mysqli_query($connect,$q);
				if ($instugas) {
					$htgs=mysqli_query($connect,"SELECT MAX(kd_tugas) AS kode FROM tugas");
					$kode=mysqli_fetch_array($htgs);

					$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel,kd_guru) 
					VALUES ('tugas','$kode[kode]','$tglup','$kd','$mapel','$kd_guru')";
					mysqli_query($connect,$qt);
					$s="scs";
				} else {
					$s="err";
					echo "Terjadi Kesalahan!";
				}
			}
			if ($s=='scs') {
				move_uploaded_file($_FILES["fuptugas"]["tmp_name"], $temp.$newfilename);
				header("location:../../media.php?module=tugas");
			} else {
				echo "Terjadi Kesalahan!";
			}

		}

		break;

		case 'hapus':
		$kd=$_GET['id'];
		$qh="SELECT file FROM tugas WHERE kd_tugas='$kd'";
		$qfile=mysqli_query($connect,$qh);
		$rfile=mysqli_fetch_array($qfile);
		$file="../../files/tugas/".$rfile['file'];

		$q="DELETE FROM tugas WHERE kd_tugas='$kd'";

		if (mysqli_query($connect,$q)){
			$delt="DELETE FROM timeline WHERE timeline.jenis='tugas' AND timeline.id_jenis='$kd'";
			mysqli_query($connect,$delt);
			unlink($file);
			header("location:../../media.php?module=tugas");

		}
		break;

		default:
		echo "Aksi tidak ditemukan!";
		break;
	}
}
?>
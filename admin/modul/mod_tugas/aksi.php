<?php 
include "../../../system/koneksi.php";
date_default_timezone_set("Asia/Bangkok");

if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		
		$judul=$_POST['judul_tugas'];
		$desc=$_POST['deskripsi'];
		$tglup=date('Y-m-d H:i:s');
		$awal=$_POST['awaltgl']." ".$_POST['awaljam'].":00";
		$ahir=$_POST['ahirtgl']." ".$_POST['ahirjam'].":00";
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
			$newfilename   = $judul.'_'.$acak.'.'.$filext;

			foreach ($kelas as $kd) {
				//buat kode tugas 02
				$thn=date("Y");
				$k="02".$thn.$kd_guru;
				$qcek="SELECT MAX(kd_tugas) AS kode FROM tugas WHERE kd_tugas LIKE '$k%'";
				$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
				$kodeurut=substr($max['kode'],strlen($k),3)+1;
				if ($kodeurut<10) {
					$kodeurut="00".$kodeurut;
				} else if ($kodeurut<100){
					$kodeurut="0".$kodeurut;
				} else {

				}
				$kd_tugas=$k.$kodeurut;

				$q="INSERT INTO tugas (kd_tugas,nama_tugas,deskripsi,batas_awal,batas_ahir,file,tgl_up,kd_kelas,kd_mapel,kd_guru)
				VALUES ('$kd_tugas','$judul','$desc','$awal','$ahir','$newfilename','$tglup','$kd','$mapel','$kd_guru')";
				$instugas=mysqli_query($connect,$q);
				if ($instugas) {
					$t="SELECT siswa.nis FROM siswa, tahun_ajar, rombel WHERE rombel.nis=siswa.nis AND rombel.kd_tajar=tahun_ajar.kd_tajar AND tahun_ajar.aktif='Y' AND rombel.kd_kelas='$kd'";
					$tj=mysqli_query($connect,$t);
					$jnis=mysqli_num_rows($tj);
					if ($jnis>0){
						while ($jt=mysqli_fetch_array($tj)) {
						//buat kode kerja tugas 12
							$thn=date("Y");
							$ks="12".$thn.$jt['nis'];
							$qscek="SELECT MAX(kd_kerja) AS kode FROM kerja_tugas WHERE kd_kerja LIKE '$ks%'";
							$maxs=mysqli_fetch_array(mysqli_query($connect,$qscek));
							$kodeuruts=substr($maxs['kode'],strlen($ks),3)+1;
							if ($kodeuruts<10) {
								$kodeuruts="00".$kodeuruts;
							} else if ($kodeuruts<100){
								$kodeuruts="0".$kodeuruts;
							} else {

							}
							$kd_kerja=$ks.$kodeuruts;

							mysqli_query($connect,"INSERT INTO kerja_tugas (kd_kerja,kd_tugas,nis,file_kerja,nilai,status_kerja) VALUES ('$kd_kerja','$kd_tugas','$jt[nis]','T','0','T')");
						}
					}
					$qt="INSERT INTO timeline (jenis,id_jenis,waktu,kd_kelas,kd_mapel,kd_guru) 
					VALUES ('tugas','$kd_tugas','$tglup','$kd','$mapel','$kd_guru')";
					mysqli_query($connect,$qt);
					$s="scs";
				} 
			}
			if ($s=='scs') {
				move_uploaded_file($_FILES["fuptugas"]["tmp_name"], $temp.$newfilename);
				echo "<script>alert('Berhasil membuat tugas'); location='../../media.php?module=tugas'</script>";
			} else {
				echo "Terjadi Kesalahan!";
			}

		}

		break;

		case 'del':
		$kd=$_GET['id'];
		$qh="SELECT file FROM tugas WHERE kd_tugas='$kd'";
		$qfile=mysqli_query($connect,$qh);
		$rfile=mysqli_fetch_array($qfile);
		$file="../../files/tugas/".$rfile['file'];

		$q="DELETE FROM tugas WHERE kd_tugas='$kd'";

		if (mysqli_query($connect,$q)){
			$delts="DELETE FROM kerja_tugas WHERE kd_tugas='$kd'";
			mysqli_query($connect,$delts);
			$delt="DELETE FROM timeline WHERE timeline.jenis='tugas' AND timeline.id_jenis='$kd'";
			mysqli_query($connect,$delt);
			$qc="SELECT * FROM tugas WHERE file='$rfile[file]'";
			if (mysqli_num_rows(mysqli_query($connect,$qc))<1){
				unlink($file);
			}
			echo "<script>alert('Berhasil menghapus tugas'); location='../../media.php?module=tugas'</script>";
		}
		break;

		case 'edit':
		$kd_tugas=$_POST['kd_tugas'];
		$judul=$_POST['judul_tugas'];
		$desc=$_POST['deskripsi'];
		$tglup=date('Y-m-d H:i:s');
		$awal=$_POST['awaltgl']." ".$_POST['awaljam'].":00";
		$ahir=$_POST['ahirtgl']." ".$_POST['ahirjam'].":00";
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

			$filext       = substr($filename, strrpos($filename, '.'));
			$filext       = str_replace('.','',$filext);
			$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
			$newfilename   = $kd_tugas.'.'.$filext;

			$q="UPDATE tugas SET nama_tugas='$judul',deskripsi='$desc',batas_awal='$awal',batas_ahir='$ahir',file='$newfilename',tgl_up='$tglup',kd_kelas='$kelas',kd_mapel='$mapel',kd_guru='$kd_guru'
			WHERE kd_tugas='$kd_tugas'";
			$updtugas=mysqli_query($connect,$q);
			if ($updtugas) {
				$qt="UPDATE timeline SET waktu='$tglup' 
				WHERE jenis='tugas' AND id_jenis='$kd_tugas'";
				mysqli_query($connect,$qt);
				$s="scs";
			} else {
				$s="err";
				echo "Terjadi Kesalahan!";
			}
			if ($s=='scs') {
				unlink($temp.$newfilename);
				move_uploaded_file($_FILES["fuptugas"]["tmp_name"], $temp.$newfilename);
				echo "<script>alert('Berhasil mengedit tugas'); location='../../media.php?module=tugas'</script>";
			} else {
				echo "Terjadi Kesalahan!";
			}

		} else {
			$q="UPDATE tugas SET nama_tugas='$judul',deskripsi='$desc',batas_awal='$awal',batas_ahir='$ahir',tgl_up='$tglup',kd_kelas='$kelas',kd_mapel='$mapel',kd_guru='$kd_guru'
			WHERE kd_tugas='$kd_tugas'";
			$updtugas=mysqli_query($connect,$q);
			if ($updtugas) {
				$qt="UPDATE timeline SET waktu='$tglup' 
				WHERE jenis='tugas' AND id_jenis='$kd_tugas'";
				mysqli_query($connect,$qt);
				echo "<script>alert('Berhasil mengedit tugas'); location='../../media.php?module=tugas'</script>";
			} else {
				$s="err";
				echo "Terjadi Kesalahan!";
			}
		}

		break;

		case 'berinilai':
			if (isset($_POST['draf'])){
				$nil=$_POST['nilai'];
				$kd=$_POST['kd'];
				$kdt=$_POST['kdt'];

				$qn="UPDATE kerja_tugas SET nilai='$nil' WHERE kd_kerja='$kd'";
				$ex=mysqli_query($connect,$qn);
				if ($ex){
					echo "<script>alert('Berhasil menambah nilai Sementara'); location='../../media.php?module=detailtugas&kd=$kdt&st=T&eid=$kd'</script>";
				} else {
					echo "<script>alert('Berhasil menambah nilai Sementara'); location='../../media.php?module=tugas'</script>";
				}
			} else if (isset($_POST['simpan'])){
				$nil=$_POST['nilai'];
				$kd=$_POST['kd'];
				$kdt=$_POST['kdt'];

				$qn="UPDATE kerja_tugas SET nilai='$nil',status_kerja='N' WHERE kd_kerja='$kd'";
				$ex=mysqli_query($connect,$qn);
				if ($ex){
					echo "<script>alert('Berhasil menambah nilai Sementara'); location='../../media.php?module=detailtugas&kd=$kdt&st=T&eid=$kd'</script>";
				} else {
					echo "<script>alert('Berhasil memberikan nilai'); location='../../media.php?module=tugas'</script>";
				}
			}
		break;

		default:
		echo "Aksi tidak ditemukan!";
		break;
	}
}
?>
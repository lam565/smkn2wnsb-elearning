<?php 
include "../../../system/koneksi.php";
if (isset($_GET['act'])){
	switch ($_GET['act']) {
		case 'add':
		$mp=$_POST['mapel'];
		$nama_soal=$_POST['nama_soal'];
		$kd_guru=$_POST['kd_guru'];
		$acak=$_POST['jenis_soal'];
		$thn=date("Y");
		$ks="14".$thn.$kd_guru;

		$cek=mysqli_query($connect,"SELECT max(kd_soal) as kode FROM soal WHERE kd_soal LIKE '$ks%'");
		$maxs=mysqli_fetch_array($cek);
		$nourut=substr($maxs['kode'],strlen($ks),3)+1;
		if ($nourut<10) {
			$nourut="00".$nourut;
		} else if ($nourut<100){
			$nourut="0".$nourut;
		}
		$kd_soal=$ks.$nourut;

		$qins="INSERT INTO soal VALUES ('$kd_soal','$nama_soal','$acak','$mp','$kd_guru')";
		$ins=mysqli_query($connect,$qins);
		if ($ins){
			echo "<script>alert('Berhasil membuat soal, selanjutnya buatlah daftar pertanyaan!'); location='../../media.php?module=banksoal'</script>";
		}
		break;

		case 'upd':
		$mp=$_POST['mapel'];
		$nama_soal=$_POST['nama_soal'];
		$kd_guru=$_POST['kd_guru'];
		$kd_soal=$_POST['kd_soal'];
		$acak=$_POST['jenis_soal'];

		$q="UPDATE soal SET nama_soal='$nama_soal', kd_mapel='$mp', acak='$acak' WHERE kd_soal='$kd_soal'";
		$upd=mysqli_query($connect,$q);
		if ($upd) {
			echo "<script>alert('Berhasil mengubah soal'); location='../../media.php?module=banksoal'</script>";
		}
		break;

		case 'del':
		$q="DELETE FROM soal WHERE kd_soal='$_GET[kd]'";
		$exe=mysqli_query($connect,$q);
		if ($exe){
			$qc=mysqli_query($connect,"SELECT kd_soal FROM detail_soal WHERE kd_soal='$_GET[kd]'");
			$cn=mysqli_num_rows($qc);
			if ($cn>0) {
				$qd="DELETE FROM detail_soal WHERE kd_soal='$_GET[kd]'";
				mysqli_query($connect,$qd);
			}
			echo "<script>alert('Berhasil menghapus soal'); location='../../media.php?module=banksoal'</script>";
		}
		break;

		case 'tbsoal':

		$kds=$_POST['kd_soal'];
		$kdd=$_POST['kd_detail'];
		$soal=$_POST['pertanyaan'];
		$jenis=$_POST['jenis'];
		$pila=$_POST['a'];
		$pilb=$_POST['b'];
		$pilc=$_POST['c'];
		$pild=$_POST['d'];
		$pile=$_POST['e'];
		$kunci=$_POST['kunci_jawaban'];
		if ($jenis=='Child'){
			$C="-";
			$P=$_POST['parent'];
		} else if ($jenis=='Parent'){
			$C="-";
			$P="Y";
		} else {
			$C="-";
			$P="-";
		}

		$temp = "../../files/soal/";
		if (!file_exists($temp)){
			mkdir($temp);
		}
		$fileupload      = $_FILES['gbsoal']['tmp_name'];
		$filename       = $_FILES['gbsoal']['name'];
		$filetype       = $_FILES['gbsoal']['type'];

		if (!empty($fileupload)){
			$acak = rand(00000000, 99999999);

			$filext       = substr($filename, strrpos($filename, '.'));
			$filext       = str_replace('.','',$filext);
			$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
			$gambar   = $filename."_".$acak.'.'.$filext;

		} else {
			$gambar = "T";
		}

		$qsoal="INSERT INTO detail_soal VALUES ('$kdd','$kds','$soal','$pila','$pilb','$pilc','$pild','$pile','$kunci','-','$gambar','$C','$P')";
		$ins=mysqli_query($connect,$qsoal);
		if ($ins){
			move_uploaded_file($_FILES["gbsoal"]["tmp_name"], $temp.$gambar);
			if ($_POST['lanjut']) {
				echo "<script>alert('Berhasil membuat materi'); location='../../media.php?module=buatsoal&v=add&kds=$kds'</script>";
			} else {
				echo "<script>alert('Berhasil membuat materi'); location='../../media.php?module=buatsoal&v=tampil&kds=$kds'</script>";
			}
			
		} else {
			echo "<script>alert('Gagal menambah'); location='../../media.php?module=buatsoal&v=add&kds=$kds'</script>";
		}
		break;

		default:
				# code...
		break;
	}
} else {
	echo "<script>alert('Terjadi Kesalahan'); location='../../media.php?module=error'</script>";
}
?>
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
			$C="Y";
			$P="-";
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
			if (!empty($fileupload)){
				move_uploaded_file($_FILES["gbsoal"]["tmp_name"], $temp.$gambar);
			}
			if ($_POST['lanjut']) {
				echo "<script>alert('Berhasil membuat pertanyaan'); location='../../media.php?module=buatsoal&v=add&kds=$kds'</script>";
			} else {
				echo "<script>alert('Berhasil membuat pertanyaan'); location='../../media.php?module=buatsoal&v=tampil&kds=$kds'</script>";
			}
			
		} else {
			echo "<script>alert('Gagal menambah'); location='../../media.php?module=buatsoal&v=add&kds=$kds'</script>";
		}
		break;

		case 'import':
			//koneksi ke database, username,password  dan namadatabase menyesuaikan
		require "../../../assets/excel_reader2.php";

		$target = basename($_FILES['filesoal']['name']) ;
		move_uploaded_file($_FILES['filesoal']['tmp_name'], $target);
		$data = new Spreadsheet_Excel_Reader($_FILES['filesoal']['name'],false);
//menghitung jumlah baris file xls
		$baris = $data->rowcount($sheet_index=0);
//import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
		for ($i=2; $i<=$baris; $i++)
		{
//menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah
//jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
			$barisreal = $baris-1;
			$k = $i-1;
//buat kode detail soal
			$thn=date("Y");
			$ks="44".$thn.$_POST['kd_guru'];
			$qcek="SELECT MAX(kd_detail_soal) AS kode FROM detail_soal WHERE kd_detail_soal LIKE '$ks%'";
			$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
			$kodeurut=substr($max['kode'],strlen($ks),3)+1;
			if ($kodeurut<10) {
				$kodeurut="00".$kodeurut;
			} else if ($kodeurut<100){
				$kodeurut="0".$kodeurut;
			}

//membaca data (kolom ke-1 sd terakhir)
			$id_soal        = $_POST['kd_soal'];
			$kd_detail_soal = $ks.$kodeurut;
			$soal           = $data->val($i, 2);
			$pila   = $data->val($i, 3);
			$pilb  = $data->val($i, 4);
			$pilc = $data->val($i, 5);
			$pild = $data->val($i, 6);
			$pile = $data->val($i, 7);
			$kunci = $data->val($i, 8);
			$kunci = strtolower($kunci);

//setelah data dibaca, masukkan ke tabel pegawai sql
			$qsoal="INSERT INTO detail_soal (kd_detail_soal,kd_soal,soal,pil_A,pil_B,pil_C,pil_D,pil_E,kunci) VALUES ('$kd_detail_soal','$id_soal','$soal','$pila','$pilb','$pilc','$pild','$pile','$kunci')";
			$ins=mysqli_query($connect,$qsoal);
		}
//hapus file xls yang udah dibaca
		unlink($_FILES['filesoal']['name']);
		echo "<script>alert('Berhasil menambahkan $barisreal soal'); location='../../media.php?module=buatsoal&v=tampil&kds=$id_soal'</script>";
		break;

		case 'delpert':
		$kd=$_GET['kdd'];
		$q1=mysqli_query($connect,"SELECT gambar,kd_detail_soal,kd_soal FROM detail_soal WHERE kd_detail_soal='$kd' ");
		$r1=mysqli_fetch_array($q1);
		$q="DELETE FROM detail_soal WHERE kd_detail_soal='$kd'";
		$r=mysqli_query($connect,$q);
		if ($r) {
			if ($r1['gambar']!='T') {
				unlink("../../files/soal/".$r1['gambar']);
				echo "<script>alert('Berhasil menghapus pertanyaan'); location='../../media.php?module=buatsoal&v=tampil&kds=$r1[kd_soal]'</script>";
			} else {
				echo "<script>alert('Berhasil menghapus pertanyaan'); location='../../media.php?module=buatsoal&v=tampil&kds=$r1[kd_soal]'</script>";
			}
		}

		break;

		case 'tbedit':
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
			$C="Y";
			$P="-";
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

		$qg=mysqli_query($connect,"SELECT gambar FROM detail_soal WHERE kd_detail_soal='$kdd'");
		$gbr=mysqli_fetch_array($qg);

		if (isset($_POST['hapus'])) {
			if ($gbr['gambar']!='T'){
				unlink("../../files/soal/".$gbr['gambar']);
			}
			$gambar="T";
		} else {
			if (!empty($fileupload)){
				$acak = rand(00000000, 99999999);

				$filext       = substr($filename, strrpos($filename, '.'));
				$filext       = str_replace('.','',$filext);
				$filename      = preg_replace("/\.[^.\s]{3,4}$/", "", $filename);
				$gambar   = $filename."_".$acak.'.'.$filext;

			} else {
				$gambar = "T";
			}
		}

		$qsoal="UPDATE detail_soal SET soal='$soal',pil_A='$pila',pil_B='$pilb',pil_C='$pilc',pil_D='$pild',pil_E='$pile',kunci='$kunci',gambar='$gambar',C='$C',P='$P' WHERE kd_detail_soal='$kdd'";

		$upd=mysqli_query($connect,$qsoal);

		if ($upd){
			if (!empty($fileupload)){
				if ($gbr['gambar']!='T'){
					unlink("../../files/soal/".$gbr['gambar']);
				}
				move_uploaded_file($_FILES["gbsoal"]["tmp_name"], $temp.$gambar);
			}
			
			echo "<script>alert('Berhasil mengubah soal'); location='../../media.php?module=buatsoal&v=tampil&kds=$kds'</script>";
			
		} else {
			echo "<script>alert('Gagal mengubah'); location='../../media.php?module=buatsoal&v=add&kds=$kds'</script>";

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
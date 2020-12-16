<?php
include '../system/koneksi.php'; 
if (isset($_POST['act'])) {
	switch ($_POST['act']) {
		case 'kelasmapel':
		$mapel=$_POST['mp'];
		$kd_guru=$_POST['kdg'];
		$q="SELECT kelas.kd_kelas, kelas.nama_kelas 
		FROM pengajaran as p, kelas, mapel
		WHERE p.kd_kelas=kelas.kd_kelas AND p.kd_mapel=mapel.kd_mapel AND mapel.kd_mapel='$mapel' AND p.kd_guru='$kd_guru'";

		$kelas = "<div class=\"form-group\">";
		$qkls=mysqli_query($connect, $q);
		while ($kls=mysqli_fetch_array($qkls)){
			$kelas .= "
			<input type='checkbox' value='$kls[kd_kelas]' name='kd_kls[]' checked='checked'/><label> $kls[nama_kelas] </label>
			";
		}		
		$kelas .= "</div>";

		echo $kelas;
		
		
		break;

		case 'soalmapel':

		$mapel=$_POST['mp'];
		$kd_guru=$_POST['kdg'];

		$output="<select name='kd_soal' class='form-control'>
		<option selected='selected'>Pilih Soal</option>";
		
		function jumSoal($kd,$conn){
			$q=mysqli_query($conn,"SELECT kd_detail_soal FROM detail_soal WHERE kd_soal='$kd'");
			$n=mysqli_num_rows($q);
			return $n;
		}

		$qsoal="SELECT soal.acak, soal.kd_soal,soal.nama_soal,mapel.nama_mapel
		FROM soal,mapel WHERE soal.kd_mapel=mapel.kd_mapel AND soal.kd_guru='$kd_guru' AND soal.kd_mapel='$mapel'";
		$csoal=mysqli_query($connect,$qsoal);
		while ($rsoal=mysqli_fetch_array($csoal)){
			$j=jumSoal($rsoal['kd_soal'],$connect);
			$output .= "<option value='$rsoal[kd_soal]'>$rsoal[nama_soal] - [$j]</option>";
		}

		$output .= "</select>";
		echo $output;
		
		break;

		case 'kelasajar':
		$mapel=$_POST['mp'];
		$jurusan=$_POST['jrs'];

		$query=mysqli_query($connect,"SELECT kd_kelas,nama_kelas FROM kelas WHERE kd_jurusan='$jurusan' ORDER BY tingkat");
		$output="<div class='checkbox'>";
		while ($result=mysqli_fetch_array($query)) {
			$output .= "<label>
			<input type='checkbox' name='kd_kls[]' value='$result[kd_kelas]' />$result[nama_kelas] 
			</label>";
		}
		$output .= "</div>";
		echo $output;

		break;

		default:
		echo "alert('Terjadi Kesalahan!')";
		break;
	}
}
?>

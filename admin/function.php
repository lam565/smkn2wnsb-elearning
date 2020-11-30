<?php
include '../system/koneksi.php'; 
if (isset($_POST['act'])) {
	switch ($_POST['act']) {
		case 'kelasmapel':
		$mapel=$_POST['mp'];
		$kd_guru=$_POST['kdg'];
		$q="SELECT kelas.kd_kelas, kelas.nama_kelas, detail_kurikulum.id_detail 
		FROM detail_kurikulum, kelas, mapel, kurikulum
		WHERE kurikulum.kd_kurikulum=detail_kurikulum.kd_kurikulum AND detail_kurikulum.kd_kelas=kelas.kd_kelas AND detail_kurikulum.kd_mapel=mapel.kd_mapel AND mapel.kd_mapel='$mapel' AND detail_kurikulum.kd_guru='$kd_guru' AND kurikulum.aktif='Y'";

		$kelas = "<div class=\"form-group\">";
		$qkls=mysqli_query($connect, $q);
		while ($kls=mysqli_fetch_array($qkls)){
			$kelas .= "<div class='checkbox'>
			<label>
			<input type='checkbox' value='$kls[kd_kelas]' name='kd_kls[]' checked='checked'/>$kls[nama_kelas]
			</label>
			</div>";
		}		
		$kelas .= "</div>";

		echo $kelas;
		
		
		break;

		default:
		echo "alert('Terjadi Kesalahan!')";
		break;
	}
}
?>

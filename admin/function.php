<?php 
if (isset($_POST['act'])) {
	switch ($_POST['act']) {
		case 'kelasmapel':
		$mapel=$_POST['kd'];
		$q="SELECT kelas.kd_kelas, kelas.nama_kelas 
		FROM detail_kurikulum, kelas, mapel, kurikulum
		WHERE kurikulum.kd_kurikulum=detail_kurikulum.kd_kurikulum AND detail_kurikulum.kd_kelas=kelas.kd_kelas AND detail_kurikulum.kd_mapel=mapel.kd_mapel AND mapel.kd_mapel='$mapel' AND detail_kurikulum.kd_guru='' AND kurikulum.aktif='Y'";


		break;
		
		default:
		echo "Terjadi Kesalahan!";
		break;
	}
}
?>

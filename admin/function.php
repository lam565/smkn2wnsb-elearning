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
		$kelas = "";
		$kd= "";
		$qkls=mysqli_query($connect, $q);
		if (mysqli_num_rows($qkls)>0){
			while ($kls=mysqli_fetch_array($qkls)) {
				$kelas = $kelas.$kls['nama_kelas'].", ";
				$kd = $kd.$kls['id_detail'].",";
			}
			$kelas = substr($kelas, 0, -2);
			$kd= substr($kd, 0, -1);
		} else {

		}
		
		echo "<p class=\"text-info\" >Untuk kelas: $kelas</p>
		<input type=\"hidden\" name=\"kdetail\" value='$kd'>";
		break;

		default:
		echo "alert('Terjadi Kesalahan!')";
		break;
	}
}
?>

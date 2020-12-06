<?php 

include "system/koneksi.php";

$t="SELECT siswa.nis FROM siswa, tahun_ajar, rombel WHERE rombel.nis=siswa.nis AND rombel.kd_tajar=tahun_ajar.kd_tajar AND tahun_ajar.aktif='Y' AND rombel.kd_kelas='xa1'";
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
		echo $kd_kerja;
	}
}
?>
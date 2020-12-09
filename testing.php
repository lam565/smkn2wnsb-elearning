<?php 

include "system/koneksi.php";

$k="GR";
	$qgru="SELECT MAX(kd_guru) AS kode FROM guru";
	$max=mysqli_fetch_array(mysqli_query($connect,$qgru));
	$kodeurut=substr($max['kode'],2,3)+1;
	if ($kodeurut<10) {
		$kodeurut="00".$kodeurut;
	} else if ($kodeurut<100){
		$kodeurut="0".$kodeurut;
	}
	$kd_guru=$k.$kodeurut;
	echo $kd_guru;
?>
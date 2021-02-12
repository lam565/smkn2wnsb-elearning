<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
session_start();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nilai_tugas.xls");
?>

<h3>LAPORAN NILAI TUGAS </h3>
<?php

$dbHost="localhost";
$dbUser="root";
$dbPass="";

$connection=mysqli_connect($dbHost,$dbUser,$dbPass);

mysqli_select_db($connection,'smkn2wnsb');

	$qu = $connection->query("SELECT * FROM tugas,mapel,kelas,guru
	WHERE tugas.kd_mapel=mapel.kd_mapel and tugas.kd_kelas=kelas.kd_kelas and tugas.kd_guru=guru.kd_guru and tugas.kd_tugas='$_GET[kd]'"); 
	$ro = $qu->fetch_assoc();

	$query1 = $connection->query("SELECT * FROM mapel
	WHERE kd_mapel='$ro[kd_mapel]'"); 
	$row1 = $query1->fetch_assoc();
	?>
	<?php
	$query2 = $connection->query("SELECT * FROM kelas
	WHERE kd_kelas='$ro[kd_kelas]'"); 
	$row2 = $query2->fetch_assoc();
	?>
	<?php
	$query3 = $connection->query("SELECT * FROM guru
	WHERE username='$_SESSION[username]'"); 
	$row3 = $query3->fetch_assoc();
	?>
<h4 class="text-center">Mata Pelajaran: <?=$row1["nama_mapel"]?> Tugas: <?=$ro["nama_tugas"]?> (<?=$row2["nama_kelas"]?>)<br>Guru Pengampu: <?=$row3["nama"]?><br></h4>
		
<table border="1" cellpadding="5">
	<tr>
		<th>NO</th>
										<th>NIS</th>
										
										<th>NILAI</th>
										
	</tr>
	<?php
	// Load file koneksi.php



	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($connection, "SELECT * FROM tugas,kerja_tugas
										WHERE tugas.kd_tugas=kerja_tugas.kd_tugas
										and tugas.kd_tugas='$_GET[kd]'
										");
								
								
	
	$no=1;// Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['nis']."</td>";
		
		echo "<td>".$data['nilai']."</td>";
		
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>

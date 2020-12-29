<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
session_start();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");
?>

<h3>LAPORAN UJIAN ONLINE PERPERIODE</h3>
<?php

$dbHost="localhost";
$dbUser="root";
$dbPass="";

$connection=mysqli_connect($dbHost,$dbUser,$dbPass);

mysqli_select_db($connection,'smkn2wnsb');

	$query1 = $connection->query("SELECT * FROM mapel
	WHERE kd_mapel='$_GET[kd_mapel]'"); 
	$row1 = $query1->fetch_assoc();
	?>
	<?php
	$query2 = $connection->query("SELECT * FROM kelas
	WHERE kd_kelas='$_GET[kd_kelas]'"); 
	$row2 = $query2->fetch_assoc();
	?>
	<?php
	$query3 = $connection->query("SELECT * FROM guru
	WHERE username='$_SESSION[username]'"); 
	$row3 = $query3->fetch_assoc();
	?>
<h4 class="text-center">Mata Pelajaran: <?=$row1["nama_mapel"]?> (<?=$row2["nama_kelas"]?>)<br>Guru Pengampu: <?=$row3["nama"]?><br><br><?=$_GET["from"]." s/d ".$_GET["to"]?></h4>
		
<table border="1" cellpadding="5">
	<tr>
		<th>NO</th>
		<th>NIS</th>
		
		<th>NILAI</th>		
		<th>NAMA UJIAN</th>
	</tr>
	<?php
	// Load file koneksi.php



	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($connection, "SELECT * FROM nilai_ujian,ujian,mapel,kelas,siswa,guru
								WHERE nilai_ujian.kd_ujian=ujian.kd_ujian 
								and ujian.kd_mapel=mapel.kd_mapel 
								and ujian.kd_guru=guru.kd_guru
								and kelas.kd_kelas=ujian.kd_kelas
								and nilai_ujian.nis=siswa.nis
								and ujian.kd_guru='$row3[kd_guru]'
								and ujian.kd_kelas='$_GET[kd_kelas]'
								and ujian.kd_mapel='$_GET[kd_mapel]'
								and nilai_ujian.tgl_mengerjakan BETWEEN '$_GET[from]' AND '$_GET[to]'");
	
	$no=1;// Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['nis']."</td>";
		
		echo "<td>".$data['nilai']."</td>";
		echo "<td>".$data['nama_ujian']."</td>";
		
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>

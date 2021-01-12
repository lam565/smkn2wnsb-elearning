<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
session_start();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=jurnal_guru.xls");
?>

<h3>JURNAL GURU SMKN 2 WONOSOBO</h3>
<?php

$dbHost="localhost";
$dbUser="root";
$dbPass="";

$connection=mysqli_connect($dbHost,$dbUser,$dbPass);

mysqli_select_db($connection,'smkn2wnsb');	
	?>
	
<h4 class="text-center">JURNAL GURU BULAN : <?php echo $_GET['bulan'];?> TAHUN : <?php echo $_GET['tahun'];?></h4>
		
<table border="1" cellpadding="5">
	<tr>
		<th>NO</th>
		<th>TANGGAL</th>
		
		<th>JAM KE</th>		
		<th>NAMA GURU</th>
		<th>MATA PELAJARAN</th>
		<th>KELAS</th>
		<th>JUDUL MATERI</th>
		<th>JUMLAH SISWA HADIR</th>
		<th>SISWA TIDAK HADIR</th>
	</tr>
	<?php
	// Load file koneksi.php
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($connection, "SELECT * FROM jurnal,kelas,guru,mapel 
				where jurnal.kd_guru=guru.kd_guru 
				and jurnal.kd_mapel=mapel.kd_mapel
				
				and jurnal.kd_kelas=kelas.kd_kelas
				
				and month(jurnal.tanggal)= '$_GET[bulan]'			
				order by id_jurnal DESC");
	
	$no=1;// Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['tanggal']."</td>";
		echo "<td>".$data['jam_ke']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['nama_mapel']."</td>";
		echo "<td>".$data['nama_kelas']."</td>";
		
		echo "<td>".$data['judul_materi']."</td>";
		echo "<td>".$data['jml_siswa']."</td>";
		echo "<td>".$data['nm_siswa_tdhdr']."</td>";
		
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>

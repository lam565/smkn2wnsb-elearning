<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=nama_filenya.xls");
?>

<h3>Data Nilai</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th>No</th>
		<th>kd_nilai_ujian</th>
		<th>nis</th>		
	</tr>
	<?php
	// Load file koneksi.php

$dbHost="localhost";
$dbUser="root";
$dbPass="";

$connection=mysqli_connect($dbHost,$dbUser,$dbPass);

mysqli_select_db($connection,'smkn2wnsb');

	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($connection, "SELECT * FROM nilai_ujian");
	
	$no=1;// Untuk penomoran tabel, di awal set dengan 1
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['kd_nilai_ujian']."</td>";
		echo "<td>".$data['nis']."</td>";
		
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>

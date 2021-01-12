<?php 
include "../system/koneksi.php";

if (!isset($_GET['mp']) OR !isset($_GET['kls']) OR empty($_GET['mp']) OR empty($_GET['kls'])) {
	header("location:?module=home");
} else {
	$mapel = $_GET['mp'];
	$kelas = $_GET['kls'];
	date_default_timezone_set("Asia/Bangkok");
	$now = date("Y-m-d");

	$qhdr = mysqli_query($connect,"SELECT count(nis) as jumlah FROM absensi WHERE kd_kelas='$kelas' AND kd_mapel='$mapel' AND tgl_absensi LIKE '$now%'");
	$jhdr = mysqli_fetch_array($qhdr);

	$qw="SELECT siswa.nis, siswa.nama, 'Y' AS 'kehadiran'
	FROM siswa,absensi 
	WHERE siswa.nis=absensi.nis AND absensi.kd_kelas='$kelas' AND absensi.kd_mapel='$mapel' AND tgl_absensi LIKE '$now%'
	UNION 
	SELECT siswa.nis,siswa.nama, 'N' AS 'kehadiran' 
	FROM rombel,siswa 
	WHERE rombel.nis=siswa.nis AND rombel.kd_kelas='$kelas' AND siswa.nis NOT IN (SELECT nis FROM absensi WHERE kd_kelas='$kelas' AND kd_mapel='$mapel' AND tgl_absensi LIKE '$now%' )
	";
	$query=mysqli_query($connect,$qw);
	$cekabsensi = mysqli_num_rows($query);

	?>
	<div class="content-wrapper">
		<div class="container">
			<div class="row pad-botm">
				<div class="col-md-12">
					<h4 class="header-line">ABSENSI</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Detail Absensi
						</div>
						<?php 
						$qkls=mysqli_query($connect,"SELECT nama_kelas FROM kelas WHERE kd_kelas='$kelas'");
						$klas = mysqli_fetch_array($qkls);
						$qmapel=mysqli_query($connect,"SELECT nama_mapel FROM mapel WHERE kd_mapel='$mapel'");
						$mpel = mysqli_fetch_array($qmapel);
						?>
						<div class="panel-body">
							<div class="row">
								<label class="col-sm-4 col-xs-4">Kelas </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$klas['nama_kelas']; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Matapelajaran</label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$mpel['nama_mapel']; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Tanggal </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$now; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Daftar Kehadiran Siswa
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>Hadir</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1; 
									if ($cekabsensi>0){
										while ($result=mysqli_fetch_array($query)) {
											echo "<tr>";
											echo "<td> $i </td>
											<td>$result[nis]</td>
											<td>$result[nama]</td>
											<td>$result[kehadiran]</td>";
											echo "</tr>";
											$i++;
										}
										echo "<tr>";
										echo "<td colspan=3>Jumlah Hadir</td>";
										echo "<td>$jhdr[0]</td>";
										echo "</tr>";
									} else {
										echo "<tr>";
										echo "<td colspan='4'> belum ada data </td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

}

?>
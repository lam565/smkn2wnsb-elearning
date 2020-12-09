<?php 
if (!isset($_GET['kd'])) {
	header("location:?module=ujian&mp=all");
}

$kd=$_GET['kd'];

$qwr="SELECT * FROM nilai_ujian WHERE kd_ujian='$kd' AND nis='$_SESSION[kode]'";
$qcek=mysqli_query($connect,$qwr);
$ada=mysqli_num_rows($qcek);
if ($ada>0) {
	echo "Anda Sudah Mengerjakan UJIAN ini";
} else {
	$qujian=mysqli_query($connect,"SELECT * FROM ujian,guru,mapel WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_guru=guru.kd_guru AND kd_ujian='$kd'");
	$ujian=mysqli_fetch_array($qujian);

	?>
	<div class="row pad-botm">
		<div class="col-md-12">
			<h4 class="header-line">Detail Ujian <?php echo $ujian['nama_mapel']; ?></h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<strong><?php echo "Ujian Diberikan oleh: ".$ujian['nama']; ?></strong>
				</div>
				<div class="panel-body">
					<h2><?php echo $ujian['nama_ujian']; ?></h2>
					<h5>Ujian dimulai pada: <?php echo $ujian['tgl_ujian']; ?></h5>
					<h5>Durasi pengerjaan: <?php echo $ujian['jam']." jam ".$ujian['menit']." menit ".$ujian['detik']." detik "; ?></h5>
					<hr>
					<p><?php echo $ujian['deskripsi']; ?>.</p>

					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					IKUT UJIAN
				</div>
				<div class="panel-body">
					<?php
					date_default_timezone_set('Asia/Jakarta');
					$skr=date("Y-m-d H:i:s"); 
					if (strtotime($ujian['tgl_ujian']) <= strtotime($skr)) {
						echo "<p class='alert alert-warning'> Ujian telah dimulai, silahkan klik <strong>Mulai Ujian</strong> untuk mengikuti ujian</p>";
						echo "<a href='?module=lembarujian&kd=$ujian[kd_ujian]' class='btn btn-success'> MULAI UJIAN</a>";
					} else {
						echo "<p class='alert alert-warning'> Belum bisa mengikuti ujian karena belum dimulai</p>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
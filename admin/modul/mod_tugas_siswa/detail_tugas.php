<?php 
	if (!isset($_GET['kd'])) {
		header("location:?module=tugas&mp=all");
	}

	$kd=$_GET['kd'];

	$qt="SELECT * 
	FROM tugas, kerja_tugas, mapel, guru, kelas
	WHERE tugas.kd_tugas=kerja_tugas.kd_tugas AND tugas.kd_mapel=mapel.kd_mapel AND tugas.kd_guru=guru.kd_guru AND tugas.kd_kelas=kelas.kd_kelas AND tugas.kd_kelas='$kode_kelas' AND kerja_tugas.nis='$_SESSION[kode]'";
	$qtugas=mysqli_query($connect,$qt);
	$rtugas=mysqli_fetch_array($qtugas);

 ?>
<div class="row pad-botm">
	<div class="col-md-12">
		<h4 class="header-line"><?php echo $rtugas['nama_tugas']; ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-6">
						<strong><?php echo "Diberikan oleh: ".$rtugas['nama']; ?></strong>
					</div>
					<div class="col-md-6 text-right"><?php echo "Pada: ".$rtugas['tgl_up']; ?></div>
				</div>
			</div>
			<div class="panel-body">
				<p><?php echo $rtugas['deskripsi']; ?>.</p>
				<hr>
				File : <?php echo "<a href='files/tugas/$rtugas[file]' target='_blank'>Download Tugas</a>"; ?>
			</div>
			<div class="panel-footer text-right">
				Belum Mengumpulkan
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				KUMPULKAN TUGAS
			</div>
			<div class="panel-body">
				<form method="POST" action="#">
					<h4>Upload Jawaban:</h4>
					<input type="FILE" name="tugas">
					<a href="" class="btn btn-primary">Kirim</a>
				</form>
			</div>
			<div class="panel-footer text-left">
				
			</div>
		</div>
	</div>
</div>
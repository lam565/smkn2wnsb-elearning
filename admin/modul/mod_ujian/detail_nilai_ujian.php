<!-- CSS -->

<style type="text/css">
	.well:hover {
		box-shadow: 0px 2px 10px rgb(190, 190, 190) !important;
	}
	a {
		color: #666;
	}
</style>

<!-- CSS/ -->

<?php


if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
	echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
else{

	?>

	<div class="content-wrapper">
		<div class="container">
			<div class="row pad-botm">
				<div class="col-md-12">
					<h4 class="header-line">DAFTAR NILAI UJIAN</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Detail Ujian
						</div>
						<?php 
						$kdu=$_GET['kd'];
						$qujian=mysqli_query($connect,"SELECT * FROM ujian,kelas,mapel WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_kelas=kelas.kd_kelas AND ujian.kd_ujian='$kdu'");
						$ujian = mysqli_fetch_array($qujian);
						?>
						<div class="panel-body">
							<div class="row">
								<label class="col-sm-4 col-xs-4">Judul </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$ujian['nama_ujian']; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Waktu</label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$ujian['nama_mapel']; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Waktu </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$ujian['tgl_ujian']; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Durasi </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$ujian['jam']." jam ".$ujian['menit']." menit ".$ujian['detik']." detik "; ?></p>
							</div>
							<div class="row">
								<label class="col-sm-4 col-xs-4">Kelas </label>
								<p class="col-sm-8 col-xs-8"><?php echo " : ".$ujian['nama_kelas']; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Daftar Nilai Siswa
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>Waktu Mengerjakan</th>
										<th>Nilai</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1; 
									$qget=mysqli_query($connect,"SELECT nilai_ujian.nis,siswa.nama,nilai_ujian.nilai,nilai_ujian.tgl_mengerjakan 
										FROM ujian, nilai_ujian, kelas, siswa
										WHERE ujian.kd_ujian=nilai_ujian.kd_ujian AND ujian.kd_kelas=kelas.kd_kelas AND nilai_ujian.nis=siswa.nis AND ujian.kd_ujian='$kdu'
										UNION
										SELECT siswa.nis,siswa.nama, '0' as nilai, 'Belum mengerjakan' as tgl_mengerjakan 
										FROM rombel,siswa 
										WHERE rombel.nis=siswa.nis AND rombel.kd_kelas='$ujian[kd_kelas]' AND siswa.nis NOT IN (SELECT nis FROM nilai_ujian WHERE kd_ujian='$kdu')");
									while ($ajar=mysqli_fetch_array($qget)) {
										echo "<tr>";
										echo "<td> $i </td>
										<td>$ajar[nis]</td>
										<td>$ajar[nama]</td>
										<td>$ajar[tgl_mengerjakan]</td>
										<td>$ajar[nilai]</td>";
										echo "</tr>";
										$i++;
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


	<?php } ?>
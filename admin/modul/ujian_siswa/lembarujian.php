

<?php 
$kd=$_GET['kd'];
$qujian=mysqli_query($connect,"SELECT * FROM ujian,guru,mapel WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_guru=guru.kd_guru AND kd_ujian='$kd'");
$ujian=mysqli_fetch_array($qujian);

?>
<div class="row pad-botm">
	<div class="col-md-12">
		<h4 class="header-line"><?php echo $ujian['nama_ujian']; ?></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<strong>Lembar Ujian</strong>
			</div>
			<div class="panel-body">
				<form method="POST" action="modul/ujian_siswa/aksi.php" id="flembarujian">
					<input type="hidden" id="jam" value=<?php echo $ujian['jam']; ?>>
					<input type="hidden" id="menit" value=<?php echo $ujian['menit']; ?>>
					<input type="hidden" id="detik" value=<?php echo $ujian['detik']; ?>>
					<input type="hidden" name="kd_ujian" value=<?php echo $ujian['kd_ujian']; ?>>
					<input type="hidden" name="nis" value=<?php echo $_SESSION['kode']; ?>>
					<?php
					$q="SELECT * FROM ujian,mapel,soal,detail_soal WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_soal=soal.kd_soal AND detail_soal.kd_soal=soal.kd_soal AND kd_ujian='$kd' ORDER BY detail_soal.kd_detail_soal";
					$qujian=mysqli_query($connect,$q);
					$nomor=1;
					while ($soalujian=mysqli_fetch_array($qujian)) {
						?>
						<div class="form-row">
							<?php 
							if ($soalujian['gambar']!="T") {
								echo "<div class='col-md-12 col-sm-12 col-xs-12'>";
								echo "<img src='files/soal/$soalujian[gambar]' width='300'>";
								echo "</div>";
							}
							?>
						</div>
						<div class="form-row">
							<div class="col-md-1 col-sm-1 col-xs-12">
								<?php echo $nomor; ?>
								<input type="hidden" name="id[]" value="<?php echo $soalujian['kd_detail_soal']; ?>">
							</div>
							
							<?php 
							echo "<div class='col-md-11 col-sm-11 col-xs-12'>";
							?>
							<div class="form-group">
								<p><?php echo $soalujian['soal']; ?></p>
							</div>
							<div class="form-group">
								<div class="radio">
									A. 
									<label>
										<input type="radio" name="pil[<?php echo $soalujian['kd_detail_soal']; ?>]" value="a" checked=""><?php echo $soalujian['pil_A']; ?>
									</label>
								</div>
								<div class="radio">
									B. 
									<label>
										<input type="radio" name="pil[<?php echo $soalujian['kd_detail_soal']; ?>]" value="b"><?php echo $soalujian['pil_B']; ?>
									</label>
								</div>
								<div class="radio">
									C. 
									<label>
										<input type="radio" name="pil[<?php echo $soalujian['kd_detail_soal']; ?>]" value="c"><?php echo $soalujian['pil_C']; ?>
									</label>
								</div>
								<div class="radio">
									D. 
									<label>
										<input type="radio" name="pil[<?php echo $soalujian['kd_detail_soal']; ?>]" value="d"><?php echo $soalujian['pil_D']; ?>
									</label>
								</div>
								<div class="radio">
									E. 
									<label>
										<input type="radio" name="pil[<?php echo $soalujian['kd_detail_soal']; ?>]" value="e"><?php echo $soalujian['pil_E']; ?>
									</label>
								</div>
							</div>
							<hr>

							<?php
							echo "</div>";
							
							?>
						</div>
						<?php
						$nomor++;
					}
					?>

					<input type="submit" class="btn btn-success" name="submit" value="Selesai">
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				DURASI TERSISA
			</div>
			<div class="panel-body">
				<div id='timer'></div>
			</div>
		</div>
	</div>
</div>
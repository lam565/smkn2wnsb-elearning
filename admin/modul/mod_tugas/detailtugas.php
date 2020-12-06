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
					<h4 class="header-line">MANAJEMEN NILAI TUGAS</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							DAFTAR TUGAS SISWA
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>NIS</th>
											<th>NAMA</th>
											<th>Nilai</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if (isset($_GET['kd']) AND isset($_GET['st'])){
											$kd_tugas=$_GET['kd'];
											$status=$_GET['st'];
											$qs="SELECT * FROM kerja_tugas,siswa WHERE kerja_tugas.nis=siswa.nis AND kerja_tugas.kd_tugas='$kd_tugas' AND kerja_tugas.status_kerja='$status'";
											$query=mysqli_query($connect,$qs);
											$num=mysqli_num_rows($query);
											$n=1;
											if ($num>0){
												while ($rkerja=mysqli_fetch_array($query)){
													echo "<tr>";
													echo "<td>$n</td>
													<td>$rkerja[nis]</td>
													<td>$rkerja[nama]</td>
													<td>$rkerja[nilai]</td>
													<td>$rkerja[status_kerja]</td>
													<td><a href='?module=detailtugas&kd=$kd_tugas&st=$status&eid=$rkerja[kd_kerja]'>Cek</a></td>";
													echo "</tr>";
													$n++;
												}	
											} else {
												echo "<tr><td colspan='5'>Belum ada data</td></tr>";
											}

										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							Detail
						</div>
						<div class="panel-body">
							<?php 
							if (isset($_GET['eid'])){
								$qdt=mysqli_query($connect,"SELECT * FROM kerja_tugas WHERE kd_kerja='$_GET[eid]'");
								$dt=mysqli_fetch_array($qdt);
								?>
									<div class="row">
											<img src="files/kerja_tugas/<?php echo $dt['file_kerja']; ?>" class="col-md-12 col-sm-12 col-xs-12">
											<br>
											<hr>
									</div>
								<?
							} else if (!isset($_GET['eid'])){
								?>
								
								<?php
							}
							?>
						</div>
					</div>

					<div class="panel panel-success">
						<div class="panel-heading">
							Berikan Nilai
						</div>
						<div class="panel-body">
							<?php 
							if (isset($_GET['eid'])){
								$qdt=mysqli_query($connect,"SELECT * FROM kerja_tugas WHERE kd_kerja='$_GET[eid]'");
								$dt=mysqli_fetch_array($qdt);
								?>
									<div class="row">
										<form method="POST" action="modul/mod_tugas/aksi.php?act=berinilai">
											<div class="form-goup">
												<label class="col-md-2 col-sm-2 col-xm-6">Nilai</label>
												<input type="hidden" name="kd" value="<?php echo $dt['kd_kerja']; ?>">
												<input type="hidden" name="kdt" value="<?php echo $_GET['kd']; ?>">
												<input type="number" min="0" max="100" name="nilai" class="col-md-3 col-sm-3 col-xm-6" value="<?php echo $dt['nilai']; ?>">
												<span class="col-md-1 col-sm-1 col-xm-6"></span>
												<input type="submit" name="draf" class="col-md-3 col-sm-3 col-xm-6" value="Draf">  
												<input type="submit" name="simpan" class="col-md-3 col-sm-3 col-xm-6" value="Simpan">
											</div>
										</form>
									</div>
								<?
							} else {
								?>
								
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>       

	<?php } ?>
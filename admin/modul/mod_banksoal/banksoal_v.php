<style type="text/css">
	.well:hover {
		box-shadow: 0px 2px 10px rgb(190, 190, 190) !important;
	}
	a {
		color: #666;
	}
</style>

<?php


if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
	echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
?>
<div class="content-wrapper">
	<div class="container">
		<div class="row pad-botm">
			<div class="col-md-12">
				<h4 class="header-line">BANK SOAL</h4>
			</div>
		</div>

		<?php
		if (isset($_GET['eid'])){
			$id=$_GET['eid'];
			$qw="SELECT soal.*, mapel.nama_mapel, kelas.nama_kelas, mapel.kd_mapel 
			FROM kurikulum, soal, detail_kurikulum as dk, mapel, kelas 
			WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND dk.kd_mapel=soal.kd_mapel AND soal.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=soal.kd_kelas AND dk.kd_kelas=kelas.kd_kelas AND soal.kd_guru=dk.kd_guru AND soal.kd_guru='$_SESSION[kode]' AND soal.kd_soal='$id'";
			$soal=mysqli_query($connect,$qw);
			$esoal=mysqli_fetch_array($soal);

			?>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							UBAH SOAL
						</div>
						<div class="panel-body text-center">
							<form method="post" action="modul/mdo_banksoal/aksi.php?act=add">
								<div class="form-group">

									<label>Mata Pelajaran</label>
									<select name="mapel" class="form-control">
										<option selected="selected">Pilih Mata Pelajaran</option>
										<?php
										$qmapel="SELECT m.nama_mapel,m.kd_mapel 
										FROM kurikulum as k, detail_kurikulum as dk, mapel as m 
										WHERE k.kd_kurikulum=dk.kd_kurikulum AND m.kd_mapel=dk.kd_mapel AND k.Aktif='Y' AND dk.kd_guru='$_SESSION[kode]' 
										GROUP BY dk.kd_mapel";

										$datamapel=mysqli_query($connect,$qmapel);
										while ($mapel=mysqli_fetch_array($datamapel)){
											if ($esoal['kd_mapel']==$mapel['kd_mapel']){
												echo "<option value='$mapel[kd_mapel]' selected='selected'>$mapel[nama_mapel]</option>";
											} else {
												echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
											}
										}
										?>
									</select>
								</div>

								<div class="form-group">
									<label>Nama Soal</label>
									<input class="form-control" type="text" name="nama_soal" value="<?php echo $esoal['nama_soal']; ?>" />
									<input class="form-control" type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>" />
									<input class="form-control" type="hidden" name="kd_soal" value="<?php echo $id; ?>" />
								</div>
								<button type="submit" class="btn btn-success">Update </button>
							</form>
						</div>
					</div>
				</div>

				<?php
			} else {
				?>

				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-success">
							<div class="panel-heading">
								BUAT SOAL
							</div>
							<div class="panel-body text-center">
								<form method="post" action="modul/mdo_banksoal/aksi.php?act=add">
									<div class="form-group">

										<label>Mata Pelajaran</label>
										<select name="mapel" class="form-control">
											<option selected="selected">Pilih Mata Pelajaran</option>
											<?php
											$qmapel="SELECT m.nama_mapel,m.kd_mapel 
											FROM kurikulum as k, detail_kurikulum as dk, mapel as m 
											WHERE k.kd_kurikulum=dk.kd_kurikulum AND m.kd_mapel=dk.kd_mapel AND k.Aktif='Y' AND dk.kd_guru='$_SESSION[kode]' 
											GROUP BY dk.kd_mapel";

											$datamapel=mysqli_query($connect,$qmapel);
											while ($mapel=mysqli_fetch_array($datamapel)){
												echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
											}
											?>
										</select>
									</div>

									<div class="form-group">
										<label>Nama Soal</label>
										<input class="form-control" type="text" name="nama_soal" />
										<input class="form-control" type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode'] ?>" />
									</div>
									<button type="submit" class="btn btn-success">Simpan </button>
								</form>

							</div>
						</div>
					</div>
					<?php
				}
				?>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							DAFTAR SOAL
						</div>
						<div class="panel-body text-center">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
include "../system/koneksi.php";

if (!isset($_GET['kds'])) {
	header("location:?module=banksoal");
} else {
	
	$id=$_GET['kds'];
	$qw="SELECT soal.*, mapel.nama_mapel, kelas.nama_kelas, mapel.kd_mapel 
	FROM kurikulum, soal, detail_kurikulum as dk, mapel, kelas 
	WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND dk.kd_mapel=soal.kd_mapel AND soal.kd_mapel=mapel.kd_mapel AND dk.kd_kelas=kelas.kd_kelas AND soal.kd_guru=dk.kd_guru AND soal.kd_guru='$_SESSION[kode]' AND soal.kd_soal='$id'";
	$soal=mysqli_query($connect,$qw);
	$esoal=mysqli_fetch_array($soal);

	function jumSoal($kd,$conn){
		$q=mysqli_query($conn,"SELECT kd_detail_soal FROM detail_soal WHERE kd_soal='$kd'");
		$n=mysqli_num_rows($q);
		return $n;
	}
	$jp=jumSoal($id,$connect);
	?>
	<div class="content-wrapper">
		<div class="container">
			<div class="row pad-botm">
				<div class="col-md-12">
					<h4 class="header-line">BUAT PERTANYAAN</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							SOAL
						</div>
						<div class="panel-body text-center">
							<div class="form-group">
								<label>Judul</label>
								<p><?php echo $esoal['nama_soal']; ?></p>
							</div>
							<div class="form-group">
								<label>Mata Pelajaran</label>
								<p><?php echo $esoal['nama_mapel']; ?></p>
							</div>
							<div class="form-group">
								<label>Jumlah Pertanyaan</label>
								<p><?php echo $jp; ?></p>
								<?php 
								echo $_GET['v']!="tampil" ? "<p><a href='?module=buatsoal&v=tampil&kds=$_GET[kds]'>Lihat</a></p>" : "";
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-9 col-sm-9 col-xs-12">
					<?php 
					if (isset($_GET['v'])){
						switch ($_GET['v']) {
							case 'add':
							?>
							<div class="row">
								<div class="panel panel-success">
									<div class="panel-heading">
										TAMBAH PERTANYAAN
									</div>
									<div class="panel-body text-center">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#normal" data-toggle="tab">NORMAL</a>
											</li>
											<li class=""><a href="#import" data-toggle="tab">IMPORT DARI EXCEL</a>
											</li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane fade active in" id="normal">
												<form method="post" action="modul/mod_banksoal/aksi.php?act=tbsoal" enctype="multipart/form-data">
													<div class="col-md-6">
														<?php 
														$thn=date("Y");
														$k="44".$thn.$_SESSION['kode'];
														$qcek="SELECT MAX(kd_detail_soal) AS kode FROM detail_soal WHERE kd_detail_soal LIKE '$k%'";
														$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
														$kodeurut=substr($max['kode'],strlen($k),3)+1;
														if ($kodeurut<10) {
															$kodeurut="00".$kodeurut;
														} else if ($kodeurut<100){
															$kodeurut="0".$kodeurut;
														}
														$kd_detail_soal=$k.$kodeurut;
														?>
														<div class="form-group">
															<label>No</label>
															<input type="text" class="form-control" name="no" disabled="disabled" value="<?php echo $kodeurut; ?>">
															<input type="hidden" name="kd_soal" value="<?php echo $_GET['kds']; ?>">
															<input type="hidden" name="kd_detail" value="<?php echo $kd_detail_soal; ?>">	
														</div>
														<div class="form-group">
															<label>Jenis Ketergantungan</label>
															<select class="form-control" name="jenis">
																<option value="-">Normal</option>
																<option value="Parent">Parent</option>
																<option value="Child">Child</option>
															</select>
														</div>
														<div class="form-group" id="child"></div>
														<div class="form-group">
															<label>PERTANYAAN</label>
															<textarea class="form-control" name="pertanyaan" rows="8"></textarea>	
														</div>
														<div class="form-group">
															<label>Gambar</label>
															<input class="form-control" type="file" name="gbsoal">
														</div>
													</div>
													<div class="form-group col-md-6">
														<div class="form-group">
															<label>A</label>
															<input type="text" class="form-control" name="a" placeholder="Pilihan A">	
														</div>
														<div class="form-group">
															<label>B</label>
															<input type="text" class="form-control" name="b" placeholder="Pilihan B">	
														</div>
														<div class="form-group">
															<label>C</label>
															<input type="text" class="form-control" name="c" placeholder="Pilihan C">	
														</div>
														<div class="form-group">
															<label>D</label>
															<input type="text" class="form-control" name="d" placeholder="Pilihan D">	
														</div>
														<div class="form-group">
															<label>E</label>
															<input type="text" class="form-control" name="e" placeholder="Pilihan E">	
														</div>
														<div class="form-group">
															<label>KUNCI JAWABAN</label>
															<select class="form-control" name="kunci_jawaban">
																<option value="a">A</option>
																<option value="b">B</option>
																<option value="c">C</option>
																<option value="d">D</option>
																<option value="e">E</option>
															</select>	
														</div>

														<div class="form-group">
															<input type="submit" name="lanjut" class="btn btn-success" value="Lanjut"></button>
															<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane fade" id="import">
												<form>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="form-group text-left">
															<label>IMPORT SOAL</label>
															<input class="form-control" type="file" name="impsoal">
															<input type="submit" name="import" value="IMPORT">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="alert alert-info">
															<p>Import file excel sesuai dengan</p>
															<br><br><br> 
														</div>
													</div>
												</form>
											</div>
										</div>

									</div>
								</div>	
							</div>
							<?php
							break;
							case 'tampil':
							?>
							<div class="row">
								<a href="<?php echo "?module=buatsoal&v=add&kds=$_GET[kds]"; ?>" class="btn btn-primary">Tambah Pertanyaan</a>
								<hr>
							</div>
							<div class="row">
								<div class="panel panel-success">
									<div class="panel-heading">
										DAFTAR PERTANYAAN
									</div>
									<div class="panel-body text-center">
										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<th>#</th>
													<th>Pertanyaan</th>
													<th>aksi</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>	
							</div>
							<?php
							break;

							default:
							header("location:media.php?module=buatsoal&v=tampil&kds=$_GET[kds]");
							break;
						}

					} else {
						header("location:media.php?module=buatsoal&v=tampil&kds=$_GET[kds]");
					}
					?>
				</div>

			</div>
		</div>
	</div>

	<?php
}
?>
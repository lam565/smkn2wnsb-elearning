<?php 
include "../system/koneksi.php";

if (!isset($_GET['kds']) OR empty($_GET['kds'])) {
	header("location:?module=banksoal");
} else {
	
	$id=$_GET['kds'];
	$qw="SELECT soal.*, mapel.nama_mapel, kelas.nama_kelas, mapel.kd_mapel 
	FROM soal, pengajaran as p, mapel, kelas 
	WHERE p.kd_mapel=soal.kd_mapel AND soal.kd_mapel=mapel.kd_mapel AND p.kd_kelas=kelas.kd_kelas AND soal.kd_guru=p.kd_guru AND soal.kd_soal='$id'";
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
															<select class="form-control" name="jenis" id="cbbketergantungan" data-soal="<?php echo $_GET['kds']; ?>">
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
															<input type="submit" name="lanjut" class="btn btn-success" value="Lanjut">
															<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane fade" id="import">
												<form onSubmit="return validateForm()" enctype="multipart/form-data" method="POST" action="modul/mod_banksoal/aksi.php?act=import">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="form-group text-left">
															<h3>IMPORT SOAL</h3>
															<input type="hidden" name="kd_soal" value="<?php echo $_GET['kds']; ?>">
															<input class="form-control" type="file" name="filesoal" id="filesoal">
															<input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>">
															
														</div>
														<div class="form-group">
															<input type="submit" class="btn btn-success" name="import" value="IMPORT">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="alert alert-info">
															<h4>Import file excel</h4>
															<p>Hanya file excel dengan extensi .xls yang dapat digunakan. Format excel dapat didownload <b><a href="files/format_soal/format_import_soal.xls">disini</a></b>.</p>
															
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
													<?php 
													$np=1;
													$qpert=mysqli_query($connect,"SELECT soal,kd_detail_soal,kd_soal FROM detail_soal WHERE kd_soal='$_GET[kds]'");
													while ($rpert=mysqli_fetch_array($qpert)){
														?>
														<tr>
															<td><?php echo $np; ?></td>
															<td class="text-left"><?php echo $rpert['soal']; ?></td>
															<td>
																<a href="media.php?module=<?php echo "buatsoal&v=edit&kds=$rpert[kd_soal]&kdd=$rpert[kd_detail_soal]"; ?>" class="btn btn-warning">EDIT</a>
																<a href="modul/mod_banksoal/aksi.php?act=delpert&kdd=<?php echo $rpert['kd_detail_soal']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">HAPUS</a>
															</td>
														</tr>
														<?php
														$np++;
													}
													?>
												</tbody>
											</table>
										</div>

									</div>
								</div>	
							</div>
							<?php
							break;

							case 'edit':
							?>
							<div class="panel panel-success">
								<div class="panel-heading">
									UBAH PERTANYAAN
								</div>
								<div class="panel-body text-center">
									<form method="post" action="modul/mod_banksoal/aksi.php?act=tbedit" enctype="multipart/form-data">
										<div class="col-md-6">
											<?php
											$kdd=$_GET['kdd']; 
											$thn=date("Y");
											$k="44".$thn.$_SESSION['kode'];
											$qcek="SELECT * FROM detail_soal WHERE kd_detail_soal='$kdd'";
											$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
											$nourut=substr($max['kd_detail_soal'],strlen($k),3);
											
											?>
											<div class="form-group">
												<label>No</label>
												<input type="text" class="form-control" name="no" disabled="disabled" value="<?php echo $nourut; ?>">
												<input type="hidden" name="kd_soal" value="<?php echo $max['kd_soal']; ?>">
												<input type="hidden" name="kd_detail" value="<?php echo $kdd; ?>">	
											</div>
											<div class="form-group">
												<label>Jenis Ketergantungan</label>
												<select class="form-control" name="jenis" id="cbbketergantungan" data-soal="<?php echo $max['kd_soal']; ?>" data-detail="<?php echo $max['kd_detail_soal']; ?>">
													<option value="-" <?php if ($max['C']=='-' AND $max['P']=='-'){echo "Selected='selected'"; } else {} ?>>Normal</option>
													<option value="Parent" <?php if ($max['C']=='Y' AND $max['P']=='-'){echo "Selected='selected'"; } else {} ?>>Parent</option>
													<option value="Child" <?php if ($max['C']=='-' AND $max['P']!='-'){echo "Selected='selected'"; } else {} ?>>Child</option>
												</select>
											</div>
											<div class="form-group" id="child"></div>
											<div class="form-group">
												<label>PERTANYAAN</label>
												<textarea class="form-control" name="pertanyaan" rows="8"><?php echo $max['soal']; ?></textarea>	
											</div>
											<div class="form-group">
												<label>Ganti Gambar</label>
												<?php 
												if ($max['gambar']!='T') {
													echo "<img src='files/soal/$max[gambar]' width='300'>";
												} else {
													echo "<p>[tanpa gambar]</p>";
												}
												?>
												<input class="form-control" type="file" name="gbsoal">
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inlineCheckbox" name="hapus" value="hapusgbr">
												<label class="form-check-label" for="inlineCheckbox">Hapus Gambar</label>
											</div>
										</div>
										<div class="form-group col-md-6">
											<div class="form-group">
												<label>A</label>
												<input type="text" class="form-control" name="a" placeholder="Pilihan A" value="<?php echo $max['pil_A']; ?>">	
											</div>
											<div class="form-group">
												<label>B</label>
												<input type="text" class="form-control" name="b" placeholder="Pilihan B" value="<?php echo $max['pil_B']; ?>">	
											</div>
											<div class="form-group">
												<label>C</label>
												<input type="text" class="form-control" name="c" placeholder="Pilihan C" value="<?php echo $max['pil_C']; ?>">	
											</div>
											<div class="form-group">
												<label>D</label>
												<input type="text" class="form-control" name="d" placeholder="Pilihan D" value="<?php echo $max['pil_D']; ?>">	
											</div>
											<div class="form-group">
												<label>E</label>
												<input type="text" class="form-control" name="e" placeholder="Pilihan E" value="<?php echo $max['pil_E']; ?>">	
											</div>
											<div class="form-group">
												<label>KUNCI JAWABAN</label>
												<select class="form-control" name="kunci_jawaban">
													<option value="a" <?php echo $max['kunci']=='a' ? "Selected='selected'" : ""; ?>>A</option>
													<option value="b" <?php echo $max['kunci']=='b' ? "Selected='selected'" : ""; ?>>B</option>
													<option value="c" <?php echo $max['kunci']=='c' ? "Selected='selected'" : ""; ?>>C</option>
													<option value="d" <?php echo $max['kunci']=='d' ? "Selected='selected'" : ""; ?>>D</option>
													<option value="e" <?php echo $max['kunci']=='e' ? "Selected='selected'" : ""; ?>>E</option>
												</select>	
											</div>

											<div class="form-group">
												<input type="submit" name="update" class="btn btn-success" value="UPDATE">
											</div>
										</div>
									</form>
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
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
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="row">
						<div class="panel panel-success">
							<div class="panel-heading">
								TAMBAH PERTANYAAN
							</div>
							<div class="panel-body text-center">
								<form>
									<div class="col-md-6">
										<div class="form-group">
											<label>No</label>
											<input type="text" class="form-control" name="no" disabled="disabled" value="">
											<input type="hidden" name="no" value="">	
										</div>
										<div class="form-group">
											<label>PERTANYAAN</label>
											<textarea class="form-control" name="pertanyaan" rows="13"></textarea>	
										</div>
										
										<div class="form-group">
											<label>KUNCI JAWABAN</label>
											<input type="text" class="form-control" name="kunci_jawaban" placeholder="Kunci jawaban">	
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
										<label>Tambahkan Gambar</label>
										<input type="file" name="gbsoal">
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary">Tambah</button>
									</div>
								</form>
							</div>
						</div>	
					</div>

					<div class="row">
						<div class="panel panel-success">
							<div class="panel-heading">
								DAFTAR PERTANYAAN
							</div>
							<div class="panel-body text-center">

							</div>
						</div>	
					</div>

				</div>

			</div>
		</div>
	</div>

	<?php
}
?>
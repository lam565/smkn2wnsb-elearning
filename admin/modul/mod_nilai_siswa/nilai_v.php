<div class="row pad-botm">
	<div class="col-md-12">
		<h4 class="header-line">NILAI SISWA</h4>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				Filter Nilai Siswa
			</div>
			<div class="panel-body">
				<?php
				if (isset($_GET['mp'])){
					$mapel=$_GET['mp'];
				} else {
					header("location:?module=nilai&mp=all");
					$mapel='all';
				}
				?>
				<a href="?module=nilai&mp=all" class="btn <?php echo $_GET['mp']=='all' ? "btn-default" : "btn-primary"; ?> btn-sm form-control">Semua</a>

				<?php
				$qmapel=mysqli_query($connect,"SELECT mapel.kd_mapel, mapel.nama_mapel
					FROM mapel, pengajaran as p
					WHERE p.kd_mapel=mapel.kd_mapel AND p.kd_kelas='$kode_kelas'");
				while ($rmp=mysqli_fetch_array($qmapel)){
					$mapel==$rmp['kd_mapel'] ? $cbtn="btn-default" : $cbtn="btn-primary";
					echo "<a href='?module=nilai&mp=$rmp[kd_mapel]' class='btn $cbtn btn-sm form-control'>$rmp[nama_mapel]</a>  ";
				}
				?>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				Daftar Nilai Siswa
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<th>#</th>
						<th>Nama</th>
						<th>Matapelajaran</th>
						<th>Jenis</th>
						<th>Nilai</th>
					</thead>
					<tbody>
						<?php 
						if ($mapel=='all'){

							$query="SELECT 'Tugas' as jenis, kerja_tugas.nis,kerja_tugas.nilai,tugas.nama_tugas as nama_nilai, mapel.nama_mapel 
							FROM kerja_tugas,tugas, mapel 
							WHERE kerja_tugas.kd_tugas=tugas.kd_tugas AND tugas.kd_mapel=mapel.kd_mapel AND kerja_tugas.nis='$_SESSION[kode]' 
							UNION 
							SELECT 'Ujian' as jenis, nilai_ujian.nis,nilai_ujian.nilai,ujian.nama_ujian as nama_nilai,mapel.nama_mapel 
							FROM nilai_ujian,ujian,mapel 
							WHERE nilai_ujian.kd_ujian=ujian.kd_ujian AND ujian.kd_mapel=mapel.kd_mapel AND nilai_ujian.nis='$_SESSION[kode]'";
							$qnilai=mysqli_query($connect,$query);
							$cj=mysqli_num_rows($qnilai);
							$no=1;
							if ($cj==0) {
								echo "<tr><td colspan='4'>Belum ada data..</td></tr>";
							}
							while ($rsl=mysqli_fetch_array($qnilai)){
								echo "<tr>";
								echo "<td>$no</td>
								<td>$rsl[nama_nilai]</td>
								<td>$rsl[nama_mapel]</td>
								<td>$rsl[jenis]</td>
								<td>$rsl[nilai]</td>";
								echo "<tr>";
								$no++;
							}
						} else {
							$query="SELECT 'Tugas' as jenis, kerja_tugas.nis,kerja_tugas.nilai,tugas.nama_tugas as nama_nilai 
							FROM kerja_tugas,tugas 
							WHERE kerja_tugas.kd_tugas=tugas.kd_tugas AND kerja_tugas.nis='$_SESSION[kode]' AND tugas.kd_mapel='$mapel' 
							UNION 
							SELECT 'Ujian' as jenis, nilai_ujian.nis,nilai_ujian.nilai,ujian.nama_ujian as nama_nilai 
							FROM nilai_ujian,ujian 
							WHERE nilai_ujian.kd_ujian=ujian.kd_ujian AND nilai_ujian.nis='$_SESSION[kode]' AND ujian.kd_mapel='$mapel'";
							$qnilai=mysqli_query($connect,$query);
							$cj=mysqli_num_rows($qnilai);
							$no=1;
							if ($cj==0) {
								echo "<tr><td colspan='4'>Belum ada data..</td></tr>";
							}
							while ($rsl=mysqli_fetch_array($qnilai)){
								echo "<tr>";
								echo "<td>$no</td>
								<td>$rsl[nama_nilai]</td>
								<td>$rsl[jenis]</td>
								<td>$rsl[nilai]</td>";
								echo "<tr>";
								$no++;
							}	
						}
						
						?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>
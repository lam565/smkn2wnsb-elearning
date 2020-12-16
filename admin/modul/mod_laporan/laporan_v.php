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
error_reporting(1);
include "config.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>


<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD GURU</h4>
                
                            </div>

        </div>
	   <div class="row">
    
<form class="form-inline hidden-print" action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
	<label>Periode</label>
	<input type="date" class="form-control" name="start">
	<label>s/d</label>
	<input type="date" class="form-control" name="stop">
	
	
	
	<div class="form-group">
                                            <label>Kelas </label>
                                            <select class="form-control" name="kd_kelas">
												<option>Kelas</option>
												<?php $query1 = $connection->query("SELECT * FROM guru where username='$_SESSION[username]'"); 
												$data1 = $query1->fetch_assoc(); 
												?>
												<?php $query2 = $connection->query("SELECT * FROM pengajaran where kd_guru='$data1[kd_guru]'"); while ($data2 = $query2->fetch_assoc()): ?>
													<option value="<?=$data2["kd_kelas"]?>"><?=$data2["kd_kelas"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										
                                        
										 <div class="form-group">
                                            <label>Mata Pelajaran</label>
                                            <select class="form-control" name="kd_mapel">
												<option>Mata Pelajaran</option>
												<?php $query3 = $connection->query("SELECT * FROM guru where username='$_SESSION[username]'"); 
												$data3 = $query3->fetch_assoc(); 
												?>
												<?php $query5 = $connection->query("SELECT * FROM pengajaran,mapel where pengajaran.kd_mapel=mapel.kd_mapel and pengajaran.kd_guru='$data3[kd_guru]' group by mapel.nama_mapel"); while ($data5 = $query5->fetch_assoc()): ?>
													<option value="<?=$data5["kd_mapel"]?>"><?=$data5["nama_mapel"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										
											<div class="form-group">
                                            <label>Jenis Laporan</label>
                                            <select class="form-control" name="jenis">
											<option value="UO">Jenis Laporan</option>
												<option value="UO">Ujian Online</option>
												<option value="NT">Nilai Tugas</option>
												
											</select>
                                        </div>
										
	<button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
</form>
<br>
<?php if ($_POST['jenis']=='UO'){ ?>
<?php if ($_POST): ?>
	<div class="panel panel-info">
	<?php
	$query1 = $connection->query("SELECT * FROM mapel
	WHERE kd_mapel='$_POST[kd_mapel]'"); 
	$row1 = $query1->fetch_assoc();
	?>
	<?php
	$query2 = $connection->query("SELECT * FROM kelas
	WHERE kd_kelas='$_POST[kd_kelas]'"); 
	$row2 = $query2->fetch_assoc();
	?>
	<?php
	$query3 = $connection->query("SELECT * FROM guru
	WHERE username='$_SESSION[username]'"); 
	$row3 = $query3->fetch_assoc();
	?>
		<div class="panel-heading"><h3 class="text-center">LAPORAN UJIAN ONLINE PERPERIODE</h3><br><h4 class="text-center">Mata Pelajaran: <?=$row1["nama_mapel"]?> (<?=$row2["nama_kelas"]?>)<br>Guru Pengampu: <?=$row3["nama"]?><br><br><?=$_POST["start"]." s/d ".$_POST["stop"]?></h4></div>
		<div class="panel-body">
				<table class="table table-condensed">
						<thead>
								<tr>
										<th>NO</th>
										<th>NIS</th>
										
										<th>NILAI</th>
										<th>NAMA UJIAN</th>
										
										<th class="hidden-print"></th>
								</tr>
						</thead>
						<tbody>
								<?php $no = 1; ?>
								<?php if ($query = $connection->query("SELECT * FROM nilai_ujian,ujian,mapel,kelas,siswa,guru
								WHERE nilai_ujian.kd_ujian=ujian.kd_ujian 
								and ujian.kd_mapel=mapel.kd_mapel 
								and ujian.kd_guru=guru.kd_guru
								and kelas.kd_kelas=ujian.kd_kelas
								and nilai_ujian.nis=siswa.nis
								and ujian.kd_guru='$row3[kd_guru]'
								and ujian.kd_kelas='$_POST[kd_kelas]'
								and ujian.kd_mapel='$_POST[kd_mapel]'
								and nilai_ujian.tgl_mengerjakan BETWEEN '$_POST[start]' AND '$_POST[stop]'")): ?>
										<?php while($row = $query->fetch_assoc()): ?>
										<tr>
												<td><?=$no++?></td>
												<td><?=$row['nis']?></td>
												
												<td><?=$row['nilai']?></td>
												<td><?=$row['nama_ujian']?></td>
												
										</tr>
										<?php endwhile ?>
								<?php endif ?>
						</tbody>
				</table>
		</div>
    <div class="panel-footer hidden-print">
        <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
		<a href="modul/mod_laporan/proses.php?kd_kelas=<?=$_POST['kd_kelas'];?>&kd_mapel=<?=$_POST['kd_mapel'];?>&kd_guru=<?=$_POST['kd_guru'];?>&from=<?=$_POST['start'];?>&to=<?=$_POST['stop'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i></a>
    </div>
	</div>
<?php endif; ?>
<?php } ?>

<?php if ($_POST['jenis']=='NT'){ ?>
<?php if ($_POST): ?>
	<div class="panel panel-info">
	<?php
	$query1 = $connection->query("SELECT * FROM mapel
	WHERE kd_mapel='$_POST[kd_mapel]'"); 
	$row1 = $query1->fetch_assoc();
	?>
	<?php
	$query2 = $connection->query("SELECT * FROM kelas
	WHERE kd_kelas='$_POST[kd_kelas]'"); 
	$row2 = $query2->fetch_assoc();
	?>
	<?php
	$query3 = $connection->query("SELECT * FROM guru
	WHERE username='$_SESSION[username]'"); 
	$row3 = $query3->fetch_assoc();
	?>
		<div class="panel-heading"><h3 class="text-center">LAPORAN NILAI TUGAS PERPERIODE</h3><br><h4 class="text-center">Mata Pelajaran: <?=$row1["nama_mapel"]?> (<?=$row2["nama_kelas"]?>)<br>Guru Pengampu: <?=$row3["nama"]?><br><br><?=$_POST["start"]." s/d ".$_POST["stop"]?></h4></div>
		<div class="panel-body">
				<table class="table table-condensed">
						<thead>
								<tr>
										<th>NO</th>
										<th>NIS</th>
										
										<th>NILAI</th>
										<th>NAMA TUGAS</th>
										
										<th class="hidden-print"></th>
								</tr>
						</thead>
						<tbody>
								<?php $no = 1; ?>
								<?php if ($query = $connection->query("SELECT * FROM tugas,kerja_tugas,mapel,kelas,siswa,guru
								WHERE tugas.kd_tugas=kerja_tugas.kd_tugas 
								and tugas.kd_mapel=mapel.kd_mapel 
								and tugas.kd_guru=tugas.kd_guru
								and kelas.kd_kelas=tugas.kd_kelas
								and kerja_tugas.nis=siswa.nis
								and tugas.kd_guru='$row3[kd_guru]'
								and tugas.kd_kelas='$_POST[kd_kelas]'
								and tugas.kd_mapel='$_POST[kd_mapel]'
								and tugas.tgl_up BETWEEN '$_POST[start]' AND '$_POST[stop]'
								group by siswa.nis")): ?>
										<?php while($row = $query->fetch_assoc()): ?>
										<tr>
												<td><?=$no++?></td>
												<td><?=$row['nis']?></td>
												
												<td><?=$row['nilai']?></td>
												<td><?=$row['nama_tugas']?></td>
												
										</tr>
										<?php endwhile ?>
								<?php endif ?>
						</tbody>
				</table>
		</div>
    <div class="panel-footer hidden-print">
        <a onClick="window.print();return false" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>
		<a href="modul/mod_laporan/proses_tugas.php?kd_kelas=<?=$_POST['kd_kelas'];?>&kd_guru=<?=$_POST['kd_guru'];?>&kd_mapel=<?=$_POST['kd_mapel'];?>&from=<?=$_POST['start'];?>&to=<?=$_POST['stop'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i></a>
    </div>
	</div>
<?php endif; ?>
<?php } ?>

             
             </div>
 </div>
             
             </div>       

        <?php } ?>
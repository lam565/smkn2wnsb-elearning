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

include "config.php";
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>
<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM jurnal WHERE id_jurnal='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE jurnal SET tanggal='$_POST[tanggal]',jam_ke='$_POST[jam_ke]',kd_guru='$_POST[kd_guru]',kd_mapel='$_POST[kd_mapel]',kd_kelas='$_POST[kd_kelas]',
		judul_materi='$_POST[judul_materi]',jml_siswa='$_POST[jml_siswa]',nm_siswa_tdhdr='$_POST[nm_siswa_tdhdr]' WHERE id_jurnal='$_GET[key]'";
	} else {
		$sql = "INSERT INTO jurnal VALUES ('','$_POST[tanggal]','$_POST[jam_ke]','$_POST[kd_guru]','$_POST[kd_mapel]','$_POST[kd_kelas]',
		'$_POST[judul_materi]','$_POST[jml_siswa]','$_POST[nm_siswa_tdhdr]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=jurnal'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=jurnal'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM jurnal WHERE id_jurnal='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=jurnal'</script>";
}
?>

<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD GURU</h4>
                
                            </div>

        </div>
	   <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-12">
 <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
                        <div class="panel-heading">
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> JURNAL GURU
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
                                       
                                 <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" value="<?php echo date('Y-m-d');?>" name="tanggal" type="text" <?= (!$update) ?: 'value="'.$row["kd_mapel"].'"' ?>/>
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Jam Ke </label>
											<input class="form-control" name="jam_ke" type="text" <?= (!$update) ?: 'value="'.$row["jam_ke"].'"' ?>/>
                                        
                                            </div>
										<?php
								$s = mysqli_query($connection, "SELECT*FROM guru where username='$_SESSION[username]'");           
								$d = mysqli_fetch_array($s);
								?>
										 <div class="form-group">
                                            <label>Guru</label>
                                            <input class="form-control" value="<?php echo $d['nama'];?>" name="nama_mapel" type="text"/>
											<input class="form-control" value="<?php echo $d['kd_guru'];?>" name="kd_guru" type="hidden"/>
                                        
										</div>
										
										<?php
								$s = mysqli_query($connection, "SELECT*FROM guru where username='$_SESSION[username]'");           
								$d = mysqli_fetch_array($s);
								?>
										 <div class="form-group">
        <label>Mata Pelajaran</label>
        <select class="form-control" name="kd_mapel">
            <option>--Mata Pelajaran--</option>
            <?php $query3 = $connection->query("SELECT * FROM pengajaran,mapel where pengajaran.kd_mapel=mapel.kd_mapel and pengajaran.kd_guru='$d[kd_guru]'"); while ($data3 = $query3->fetch_assoc()): ?>
            <option value="<?=$data3["kd_mapel"]?>" <?= (!$update) ?: (($data3["kd_mapel"] != $data3["kd_mapel"]) ?: 'selected="on"') ?>><?=$data3["nama_mapel"]?></option>
        <?php endwhile; ?>
    </select>
</div>

										 <div class="form-group">
        <label>Kelas</label>
        <select class="form-control" name="kd_kelas">
            <option>--Kelas--</option>
            <?php $query5 = $connection->query("SELECT * FROM pengajaran,kelas where pengajaran.kd_kelas=kelas.kd_kelas and pengajaran.kd_guru='$d[kd_guru]'"); while ($data5 = $query5->fetch_assoc()): ?>
            <option value="<?=$data5["kd_kelas"]?>" <?= (!$update) ?: (($data5["kd_kelas"] != $data5["kd_kelas"]) ?: 'selected="on"') ?>><?=$data5["nama_kelas"]?></option>
        <?php endwhile; ?>
    </select>
</div>
										
										 <div class="form-group">
                                            <label>Materi </label>
                                            <input class="form-control" placeholder="Masukkan Judul Materi" name="judul_materi" type="text" <?= (!$update) ?: 'value="'.$row["judul_materi"].'"' ?>/>
                                        </div>
										
										 <div class="form-group">
                                            <label>Jumlah Siswa Hadir</label>
                                            <input class="form-control" placeholder="Masukkan Jumlah Siswa Hadir" name="jml_siswa" type="text" <?= (!$update) ?: 'value="'.$row["jml_siswa"].'"' ?>/>
                                        </div>
										
										 <div class="form-group">
                                            <label>Nama Siswa Tidak Hadir</label>
                                            <textarea class="form-control" placeholder="Masukkan Nama Siswa Tidak Hadir" name="nm_siswa_tdhdr" type="text" <?= (!$update) ?: 'value="'.$row["nm_siswa_tdhdr"].'"' ?>/>
											</textarea>
                                        </div>
                                        
                                        
                                        
                                       
                                        <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
							
					<?php if ($update): ?>
										<a href="?module=akun" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>

                                    </form>


                        </div>
     </div>
             </div>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                           Tabel Jurnal Guru
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No</th>
											 <th>Tanggal</th>
											  <th>Jam Ke</th>
											  <th>Guru</th>
											  <th>Mata Pelajaran</th>
											  <th>Kelas</th>
											  <th>Judul Materi</th>
											  <th>Jumlah Siswa Hadir</th>
											  <th>Siswa Tidak Hadir</th>
											
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
										<?php $no = 1; ?>
										
				
	                    <?php 
						
						if ($query = $connection->query("SELECT * FROM jurnal,kelas,guru,mapel 
				where jurnal.kd_guru=guru.kd_guru 
				and jurnal.kd_mapel=mapel.kd_mapel
				
				and jurnal.kd_kelas=kelas.kd_kelas
				
				and guru.username='$_SESSION[username]'				
				order by id_jurnal DESC
				")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
							<td></td>
											<td><?=$no++?></td>
                                            <td><?=$row['tanggal']?></td>
                                            <td><?=$row['jam_ke']?></td>
											<td><?=$row['nama']?></td>
                                            <td><?=$row['nama_mapel']?></td>
											<td><?=$row['nama_kelas']?></td>
											<td><?=$row['judul_materi']?></td>
                                            <td><?=$row['jml_siswa']?></td>
											 <td><?=$row['nm_siswa_tdhdr']?></td>
											
                                            
											<td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="?module=jurnal&action=update&key=<?=$row['id_jurnal']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=jurnal&action=delete&key=<?=$row['id_jurnal']?>" class="btn btn-danger btn-xs">Hapus</a>
	                                </div>
	                            </td>
											
                                           
                                        </tr>
                                        <?php endwhile ?>
	                    <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             </div>
             
             </div>
 </div>
             
             </div>       

        <?php } ?>
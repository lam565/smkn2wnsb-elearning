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
	$sql = $connection->query("SELECT * FROM tahun_ajar WHERE kd_tajar='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE tahun_ajar SET tahun_ajar='$_POST[tahun_ajar]',kd_semester='$_POST[kd_semester]',aktif='$_POST[aktif]' WHERE kd_tajar='$_GET[key]'";
	} else {
		$sql = "INSERT INTO tahun_ajar VALUES ('$_POST[kd_tajar]', '$_POST[tahun_ajar]', '$_POST[kd_semester]', '$_POST[aktif]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=tahun'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=tahun'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM tahun_ajar WHERE kd_tajar='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=tahun'</script>";
}
?>

<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>
                
                            </div>

        </div>
	   <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-12">
 <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
                        <div class="panel-heading">
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> TAHUN AJARAN
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
                                       
                                 <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" name="kd_tajar"  type="text" <?= (!$update) ?: 'value="'.$row["kd_tajar"].'"' ?>/>
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Tahun Ajar </label>
                                            <input class="form-control" name="tahun_ajar" placeholder="Masukkan Tahun Ajar" type="text" <?= (!$update) ?: 'value="'.$row["tahun_ajar"].'"' ?>/>
                                        </div>
										
										 <div class="form-group">
                                            <label>Semester </label>
                                            <input class="form-control" name="kd_semester"  placeholder="Masukkan Semester" type="text" <?= (!$update) ?: 'value="'.$row["kd_semester"].'"' ?>/>
                                        </div>
										
										<div class="form-group">
                                            <label>Status </label>
                                            <select class="form-control" name="aktif">
												<option value="T">--Pilih Status--</option>
												<?php $query5 = $connection->query("SELECT * FROM tahun_ajar"); while ($data5 = $query5->fetch_assoc()): ?>
												<?php if($data5["aktif"]=='Y'){ ?>
												<option value="Y" <?= (!$update) ?: (($data5["aktif"] != $data5["aktif"]) ?: 'selected="on"') ?>>Aktif</option>
												<option value="T">NonAktif</option>
												<?php } else { ?>
												<option value="T" <?= (!$update) ?: (($data5["aktif"] != $data5["aktif"]) ?: 'selected="on"') ?>>NonAktif</option>
												<option value="Y">Aktif</option>
												<?php } ?>
												
												
												<?php endwhile; ?>
											
												
											</select>
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
                           Tabel Tahun Ajaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>No</th>
                                            <th>ID Tahun Ajaran</th>
											 <th>Tahun Ajaran</th>
											<th>Semester</th>
											<th>Aktif</th>
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM tahun_ajar")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                        <tr>
                                            <td></td>
											<td><?=$no++?></td>
                                            <td><?=$row['kd_tajar']?></td>
                                            <td><?=$row['tahun_ajar']?></td>
                                            <td><?=$row['kd_semester']?></td>
											<td><?=$row['aktif']?></td>
											<td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="?module=tahun&action=update&key=<?=$row['kd_tajar']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=tahun&action=delete&key=<?=$row['kd_tajar']?>" class="btn btn-danger btn-xs">Hapus</a>
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
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
	$sql = $connection->query("SELECT * FROM detail_kurikulum WHERE id_detail='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE detail_kurikulum SET kd_kurikulum='$_POST[kd_kurikulum]',
		kd_mapel='$_POST[kd_mapel]',kd_kelas='$_POST[kd_kelas]',kd_guru='$_POST[kd_guru]',kd_silabus='$_POST[kd_silabus]' WHERE id_detail='$_GET[key]'";
	} else {
		$sql = "INSERT INTO detail_kurikulum VALUES ('$_POST[id_detail]','$_POST[kd_kurikulum]', 
		'$_POST[kd_mapel]', '$_POST[kd_kelas]', '$_POST[kd_guru]','$_POST[kd_silabus]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=detkurikulum&key2=$_GET[key2]'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=detkurikulum&key2=$_GET[key2]'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM detail_kurikulum WHERE id_detail='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=detkurikulum&key2=$_GET[key2]'</script>";
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
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> KURIKULUM
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
                                       
                                 <div class="form-group">
                                            <label>ID Detail</label>
                                            <input class="form-control" name="id_detail" type="text" <?= (!$update) ?: 'value="'.$row["id_detail"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Kurikulum </label>
                                            <select class="form-control" name="kd_kurikulum">
												
												<?php $query = $connection->query("SELECT * FROM kurikulum where kd_kurikulum='$_GET[key2]'"); while ($data = $query->fetch_assoc()): ?>
													<option value="<?=$data["kd_kurikulum"]?>" <?= (!$update) ?: (($row["kd_kurikulum"] != $data["kd_kurikulum"]) ?: 'selected="on"') ?>><?=$data["nama_kurikulum"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Mapel </label>
                                            <select class="form-control" name="kd_mapel">
												<option>Mapel</option>
												<?php $query = $connection->query("SELECT * FROM mapel"); while ($data = $query->fetch_assoc()): ?>
													<option value="<?=$data["kd_mapel"]?>" <?= (!$update) ?: (($row["kd_mapel"] != $data["kd_mapel"]) ?: 'selected="on"') ?>><?=$data["nama_mapel"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										 <div class="form-group">
                                            <label>Kelas </label>
                                            <select class="form-control" name="kd_kelas">
												<option>Kelas</option>
												<?php $query = $connection->query("SELECT * FROM kelas"); while ($data = $query->fetch_assoc()): ?>
													<option value="<?=$data["kd_kelas"]?>" <?= (!$update) ?: (($row["kd_kelas"] != $data["kd_kelas"]) ?: 'selected="on"') ?>><?=$data["nama_kelas"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Guru </label>
                                            <select class="form-control" name="kd_guru">
												<option>Guru</option>
												<?php $query = $connection->query("SELECT * FROM guru"); while ($data = $query->fetch_assoc()): ?>
													<option value="<?=$data["kd_guru"]?>" <?= (!$update) ?: (($row["kd_guru"] != $data["kd_guru"]) ?: 'selected="on"') ?>><?=$data["nama"]?></option>
												<?php endwhile; ?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Silabus </label>
                                            <select class="form-control" name="kd_silabus">
												<option>Silabus</option>
												<?php $query = $connection->query("SELECT * FROM silabus"); while ($data = $query->fetch_assoc()): ?>
													<option value="<?=$data["kd_silabus"]?>" <?= (!$update) ?: (($row["kd_silabus"] != $data["kd_silabus"]) ?: 'selected="on"') ?>><?=$data["judul"]?></option>
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
                           TABEL DETAIL KURIKULUM
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>ID</th>
                                            <th>Kd Kurikulum</th>
											 <th>Kd Mapel</th>
											  <th>Kd Kelas</th>
											   <th>Kd Guru</th>
											    <th>Kd Silabus</th>
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
	                    <?php if ($query = $connection->query("SELECT * FROM detail_kurikulum where kd_kurikulum='$_GET[key2]'")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$row['id_detail']?></td>
                                            <td><?=$row['kd_kurikulum']?></td>
											<td><?=$row['kd_mapel']?></td>
											<td><?=$row['kd_kelas']?></td>
											<td><?=$row['kd_guru']?></td>
											<td><?=$row['kd_silabus']?></td>
											
											<td class="hidden-print">
	                                <div class="btn-group">
										<a href="?module=detkurikulum&action=update&key=<?=$row['id_detail']?>&key2=<?=$row['kd_kurikulum']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=detkurikulum&action=delete&key=<?=$row['id_detail']?>&key2=<?=$row['kd_kurikulum']?>" class="btn btn-danger btn-xs">Hapus</a>
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
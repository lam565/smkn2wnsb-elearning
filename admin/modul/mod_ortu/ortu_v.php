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
	$sql = $connection->query("SELECT * FROM ortu WHERE kd_ortu='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE ortu SET ayah='$_POST[ayah]',pekerjaan_ayah='$_POST[pekerjaan_ayah]',ibu='$_POST[ibu]',pekerjaan_ibu='$_POST[pekerjaan_ibu]',alamat='$_POST[alamat]',telp='$_POST[telp]' WHERE kd_ortu='$_GET[key]'";
	} else {
		$sql = "INSERT INTO ortu VALUES ('$_POST[kd_ortu]', '$_POST[ayah]', '$_POST[pekerjaan_ayah]', '$_POST[ibu]', '$_POST[pekerjaan_ibu]', '$_POST[alamat]', '$_POST[telp]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=ortu'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=ortu'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM ortu WHERE kd_ortu='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=ortu'</script>";
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
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> ORANG TUA
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
                                       
                                 <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" name="kd_ortu" type="text" <?= (!$update) ?: 'value="'.$row["kd_ortu"].'"' ?>/>
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Nama Ayah </label>
                                            <input class="form-control" name="ayah" type="text" <?= (!$update) ?: 'value="'.$row["ayah"].'"' ?>/>
                                        </div>
										
										<div class="form-group">
                                            <label>Pekerjaan Ayah</label>
                                            <input class="form-control" name="pekerjaan_ayah" type="text" <?= (!$update) ?: 'value="'.$row["pekerjaan_ayah"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Nama Ibu </label>
                                            <input class="form-control" name="ibu" type="text" <?= (!$update) ?: 'value="'.$row["ibu"].'"' ?>/>
                                        </div>
										
										<div class="form-group">
                                            <label>Pekerjaan Ibu</label>
                                            <input class="form-control" name="pekerjaan_ibu" type="text" <?= (!$update) ?: 'value="'.$row["pekerjaan_ibu"].'"' ?>/>
                                        </div>
										
										<div class="form-group">
                                            <label>Alamat </label>
                                            <input class="form-control" name="alamat" type="text" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>/>
                                        </div>
										
										<div class="form-group">
                                            <label>Telp</label>
                                            <input class="form-control" name="telp" type="text" <?= (!$update) ?: 'value="'.$row["telp"].'"' ?>/>
                                        </div>
                                        
                                        
                                        
                                       
                                       <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
	                <?php if ($update): ?>
										<a href="?module=ortu" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>


                                    </form>
                        </div>
     </div>
             </div>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                           Tabel Orang Tua
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
											 <th>Ayah</th>
											<th>Pekerjaan Ayah</th>
											<th>Ibu</th>
											<th>Pekerjaan Ibu</th>
											<th>Alamat</th>
											<th>Telp</th>
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM ortu")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$row['kd_ortu']?></td>
                                            <td><?=$row['ayah']?></td>
                                            <td><?=$row['pekerjaan_ayah']?></td>
											<td><?=$row['ibu']?></td>
											<td><?=$row['pekerjaan_ibu']?></td>
											<td><?=$row['alamat']?></td>
											<td><?=$row['telp']?></td>
											<td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="?module=ortu&action=update&key=<?=$row['kd_ortu']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=ortu&action=delete&key=<?=$row['kd_ortu']?>" class="btn btn-danger btn-xs">Hapus</a>
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
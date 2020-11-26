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
	$sql = $connection->query("SELECT * FROM semester WHERE kd_semester='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE semester SET semester='$_POST[semester]' WHERE kd_semester='$_GET[key]'";
	} else {
		$sql = "INSERT INTO semester VALUES ('$_POST[kd_semester]', '$_POST[semester]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=semester'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=semester'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM semester WHERE kd_semester='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=semester'</script>";
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
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> SEMESTER
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
                                       
                                 <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" name="kd_semester" type="text" <?= (!$update) ?: 'value="'.$row["kd_semester"].'"' ?>/>
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Semester </label>
                                            <input class="form-control" name="semester" type="text" <?= (!$update) ?: 'value="'.$row["semester"].'"' ?>/>
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
                           Tabel SEMESTER
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
											 <th>Semester</th>

											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
	                    <?php if ($query = $connection->query("SELECT * FROM semester")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$row['kd_semester']?></td>
                                            <td><?=$row['semester']?></td>
                                           
											<td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="?module=semester&action=update&key=<?=$row['kd_semester']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=semester&action=delete&key=<?=$row['kd_semester']?>" class="btn btn-danger btn-xs">Hapus</a>
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
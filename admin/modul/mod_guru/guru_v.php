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
	$sql = $connection->query("SELECT * FROM guru WHERE kd_guru='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$err = false;
	$file = $_FILES['gambar']['name'];
	if ($update) {
		if ($file) {
			$x = explode('.', $_FILES['gambar']['name']);
			$file_name = date("dmYHis").".".strtolower(end($x));
			if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/guru/".$file_name)) {
				echo "<script>alert('Upload File Gagal!'); window.location = 'media.php?module=guru'</script>";
				$err = true;
			}
			@unlink("../../assets/img/guru/".$row["gambar"]);
		} else {
			$file_name = $row["gambar"];
		}
	} else {
		if (!$file) {
			
			echo "<script>alert('File gambar tidak ada'); window.location = 'media.php?module=guru'</script>";
			$err = true;
		}
		$x = explode('.', $_FILES['gambar']['name']);
		$file_name = date("dmYHis").".".strtolower(end($x));
		if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/guru/".$file_name)) {
			echo "<script>alert('Upload File Gagal!'); window.location = 'media.php?module=guru'</script>";
			$err = true;
		}
	}
	if ($update) {
		$sql = "UPDATE guru SET username='$_POST[username]',nip='$_POST[nip]',nama='$_POST[nama]',gelpend='$_POST[gelpend]',
		tmp_lahir='$_POST[tmp_lahir]',tgl_lahir='$_POST[tgl_lahir]',alamat='$_POST[alamat]',telp='$_POST[telp]',
		email='$_POST[email]',foto='$file_name',status='$_POST[status]' WHERE kd_guru='$_GET[key]'";
	} else {
		$sql = "INSERT INTO guru VALUES ('$_POST[kd_guru]', '$_POST[username]', 
		'$_POST[nip]','$_POST[nama]','$_POST[gelpend]','$_POST[tmp_lahir]',
		'$_POST[tgl_lahir]','$_POST[alamat]','$_POST[telp]','$_POST[email]',
		'$file_name','$_POST[status]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=guru'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=guru'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM guru WHERE kd_guru='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=guru'</script>";
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
                 <div class="col-md-3 col-sm-3 col-xs-12">
 <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
                        <div class="panel-heading">
                           <?= ($update) ? "EDIT" : "TAMBAH" ?> GURU
                        </div>
                        <div class="panel-body text-center recent-users-sec">
						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" name="kd_guru" type="text" <?= (!$update) ?: 'value="'.$row["kd_guru"].'"' ?>/>
                                        </div>
                                 <div class="form-group">
                                            <label>NIP</label>
                                            <input class="form-control" name="nip" type="text" <?= (!$update) ?: 'value="'.$row["nip"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>/>
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Nama Guru </label>
                                            <input class="form-control" name="nama" type="text" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Gelar </label>
                                            <input class="form-control" name="gelpend" type="text" <?= (!$update) ?: 'value="'.$row["gelpend"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Tempat Lahir </label>
                                            <input class="form-control" name="tmp_lahir" type="text" <?= (!$update) ?: 'value="'.$row["tmp_lahir"].'"' ?>/>
                                        </div>
										<div class="form-group">
                                            <label>Tanggal Lahir </label>
                                            <input class="form-control" name="tgl_lahir" type="text" <?= (!$update) ?: 'value="'.$row["tgl_lahir"].'"' ?>/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alamat</label>
                                           <input class="form-control" name="alamat" type="text" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>/>
                                            
                                        </div>
										<div class="form-group">
                                            <label>Telp </label>
                                           <input class="form-control" name="telp" type="text" <?= (!$update) ?: 'value="'.$row["telp"].'"' ?>/>
                                            
                                        </div>
										<div class="form-group">
                                            <label>E-Mail </label>
                                           <input class="form-control" name="email" type="text" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>/>
                                            
                                        </div>
										<div class="form-group">
                                            <label>Foto </label>
                                            <input type="file" name="gambar" class="form-control">
			                <?php if ($update): ?>
												<span class="help-block">*) Kosongkang jika tidak diubah</span>
											<?php endif; ?>
                                        </div>
										<div class="form-group">
                                            <label>Status </label>
                                            <input class="form-control" name="status" type="text" <?= (!$update) ?: 'value="'.$row["status"].'"' ?>/>
                                        </div>
                                        
                                       
                                        <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
	                <?php if ($update): ?>
										<a href="?module=akun" class="btn btn-info btn-block">Batal</a>
									<?php endif; ?>

                                    </form>
                        </div>
     </div>
             </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                           Tabel Guru
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIP</th>
											 <th>Username</th>
											 <th>Nama</th>
											 
											 <th>Tempat Lahir</th>
											
											 <th>Alamat</th>
											 <th>Telp</th>
											 <th>E-Mail</th>
											 <th>Foto</th>
											 <th>Status</th>
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
										<?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM guru")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                            <td></td>
                                            <td><?=$row['nip']?></td>
                                            <td><?=$row['username']?></td>
											<td><?=$row['nama']?>,<?=$row['gelpend']?></td>
											
											<td><?=$row['tmp_lahir']?>,<?=$row['tgl_lahir']?></td>
											
											<td><?=$row['alamat']?></td>
											<td><?=$row['telp']?></td>
											<td><?=$row['email']?></td>
											<td><?=$row['foto']?></td>
											<td><?=$row['status']?></td>
                                           <td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="?module=guru&action=update&key=<?=$row['kd_guru']?>" class="btn btn-warning btn-xs">Edit</a>
	                                    <a href="?module=guru&action=delete&key=<?=$row['kd_guru']?>" class="btn btn-danger btn-xs">Hapus</a>
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
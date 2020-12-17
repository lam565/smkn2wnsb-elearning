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

   if ($update) {
    $sql = "UPDATE guru SET username='$_POST[username]',nip='$_POST[nip]',nama='$_POST[nama]',telp='$_POST[telp]',
    email='$_POST[email]',status='$_POST[status]' WHERE kd_guru='$_GET[key]'";
  } else {
	  $tg=date('Y-m-d H:i:s');
    $sql = "INSERT INTO guru VALUES ('$_POST[kd_guru]', '$_POST[username]', 
    '$_POST[nip]','$_POST[nama]','$_POST[telp]','$_POST[email]',
    'default.jpg','$_POST[status]')";
	
  }
  if ($connection->query($sql)) {
	  $password=md5('1234');
	  $tg=date('Y-m-d H:i:s');
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=guru'</script>";
	$connection->query("INSERT INTO login VALUES ('$_POST[username]', '$password', 
    'guru','$tg','aktif')");
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
          <label>Kode Guru</label>
		  <?php
$sql="select * from guru order by kd_guru DESC LIMIT 0,1";
$results = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));
$data = mysqli_fetch_array($results);
	$kodeawal=substr($data['kd_guru'],3,4)+1;
	if($kodeawal<10){
		$kd='GR00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kd='GR0'.$kodeawal;
	}else{
		$kd='GR'.$kodeawal;
	}
	
?>
          <input class="form-control" value="<?php echo $kd;?>" "Masukkan Kode Guru" name="kd_guru" type="text"/>
        </div>
        <div class="form-group">
          <label>NIP</label>
          <input class="form-control" placeholder="Masukkan NIP" name="nip" type="text" <?= (!$update) ?: 'value="'.$row["nip"].'"' ?>/>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input class="form-control" placeholder="Masukkan Username" name="username" type="text" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>/>
        </div>
		

        <div class="form-group">
          <label>Nama Guru </label>
          <input class="form-control" placeholder="Masukkan Nama Guru" name="nama" type="text" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>/>
        </div>

        <div class="form-group">
          <label>Telepon </label>
          <input class="form-control" placeholder="Masukkan Telepon" name="telp" type="text" <?= (!$update) ?: 'value="'.$row["telp"].'"' ?>/>

        </div>
        <div class="form-group">
          <label>E-Mail </label>
          <input class="form-control" placeholder="Masukkan E-Mail" name="email" type="text" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>/>

        </div>

        <div class="form-group">
                                            <label>Status </label>
                                            <select class="form-control" name="status">
												<option>--Pilih Status--</option>
												<?php $query5 = $connection->query("SELECT * FROM guru group by status"); while ($data5 = $query5->fetch_assoc()): ?>
												<?php if($data5["status"]=='Aktif'){ ?>
												<option value="Aktif" <?= (!$update) ?: (($data5["status"] != $data5["status"]) ?: 'selected="on"') ?>>Aktif</option>
												<option value="NonAktif">NonAktif</option>
												<?php } else { ?>
												<option value="NonAktif" <?= (!$update) ?: (($data5["status"] != $data5["status"]) ?: 'selected="on"') ?>>NonAktif</option>
												<option value="Aktif">Aktif</option>
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
<div class="col-md-9 col-sm-9 col-xs-12">
  <div class="panel panel-success">
    <div class="panel-heading">
     Tabel Guru
   </div>
   <div class="panel-body">
    <a href="?module=importgr" class="btn btn-success btn-sm">IMPORT DARI EXCEL</a>
    <div class="table-responsive">
     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>

            <th>NIP</th>

            <th>Nama</th>


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
              <td><?=$row['kd_guru']?></td>

              <td><?=$row['nip']?></td>

              <td><?=$row['nama']?></td>


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
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
       $sql = $connection->query("SELECT * FROM siswa WHERE nis='$_GET[key]'");
       $row = $sql->fetch_assoc();
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
       if ($update) {
          $sql = "UPDATE siswa SET nisn='$_POST[nisn]', nama='$_POST[nama]', username='$_POST[username]', kelamin='$_POST[kelamin]', tmp_lahir='$_POST[tmp_lahir]', tgl_lahir='$_POST[tgl_lahir]', kd_ortu='$_POST[kd_ortu]',alamat='$_POST[alamat]',email='$_POST[email]',telp='$_POST[telp]',status='$_POST[status]' WHERE nis='$_GET[key]'";
      } else {
          $sql = "INSERT INTO siswa VALUES ('$_POST[nis]', '$_POST[nisn]', '$_POST[nama]','$_POST[username]', '$_POST[kelamin]', '$_POST[tmp_lahir]', '$_POST[tgl_lahir]', '$_POST[kd_ortu]', '$_POST[alamat]', '$_POST[email]', '', '$_POST[telp]', '$_POST[status]')";
          
      }

      if ($connection->query($sql)) {
       $sql2 = "INSERT INTO rombel VALUES ('$_POST[nis]', '$_POST[kd_kelas]', '$_POST[kd_tajar]')";
       echo "<script>alert('Berhasil!'); window.location = 'media.php?module=siswa'</script>";
   } else {
     echo "<script>alert('Gagal!'); window.location = 'media.php?module=siswa'</script>";
 }
 
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM siswa WHERE nis='$_GET[key]'");
  echo "<script>alert('Berhasil!'); window.location = 'media.php?module=siswa'</script>";
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
             <?= ($update) ? "EDIT" : "TAMBAH" ?> SISWA
         </div>
         <div class="panel-body text-center recent-users-sec">
          <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data">
             
           <div class="form-group">
            <label>NIS</label>
            <input class="form-control" name="nis" type="text" <?= (!$update) ?: 'value="'.$row["nis"].'"' ?>/>
        </div>
        <div class="form-group">
            <label>NISN</label>
            <input class="form-control" name="nisn" type="text" <?= (!$update) ?: 'value="'.$row["nisn"].'"' ?>/>
        </div>
        
        
        <div class="form-group">
            <label>Nama Siswa </label>
            <input class="form-control" name="nama" type="text" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>/>
        </div>
        <div class="form-group">
            <label>Username </label>
            <input class="form-control" name="username" type="text" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>/>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <input class="form-control" name="kelamin" type="text" <?= (!$update) ?: 'value="'.$row["kelamin"].'"' ?>/>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input class="form-control" name="tmp_lahir" type="text" <?= (!$update) ?: 'value="'.$row["tmp_lahir"].'"' ?>/>
            
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input class="form-control" name="tgl_lahir" type="text" <?= (!$update) ?: 'value="'.$row["tgl_lahir"].'"' ?>/>
            
        </div>
        
        <div class="form-group">
            <label>Orang Tua</label>
            <select class="form-control" name="kd_ortu">
                <option>Pilih</option>
                <?php $query = $connection->query("SELECT * FROM ortu"); while ($data = $query->fetch_assoc()): ?>
                <option value="<?=$data["kd_ortu"]?>" <?= (!$update) ?: (($row["kd_ortu"] != $data["kd_ortu"]) ?: 'selected="on"') ?>><?=$data["ayah"]?></option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" name="alamat" type="text" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>/>
    </div>
    <div class="form-group">
        <label>E-Mail</label>
        <input class="form-control" name="email" type="text" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>/>
    </div>
    
    <div class="form-group">
        <label>Tlp</label>
        <input class="form-control" name="telp" type="text" <?= (!$update) ?: 'value="'.$row["telp"].'"' ?>/>
    </div>
    <div class="form-group">
        <label>Status</label>
        <input class="form-control" name="status" type="text" <?= (!$update) ?: 'value="'.$row["status"].'"' ?>/>
    </div>
    <div class="form-group">
        <label>Kelas </label>
        <select class="form-control" name="kd_kelas">
            <option>Kelas</option>
            <?php $query3 = $connection->query("SELECT * FROM kelas"); while ($data3 = $query3->fetch_assoc()): ?>
            <option value="<?=$data3["kd_kelas"]?>" <?= (!$update) ?: (($row3["kd_kelas"] != $data3["kd_kelas"]) ?: 'selected="on"') ?>><?=$data3["nama_kelas"]?></option>
        <?php endwhile; ?>
    </select>
</div>
<div class="form-group">
    <label>Tahun Ajaran</label>
    <select class="form-control" name="kd_tajar">
        <option>Tahun Ajaran</option>
        <?php $query5 = $connection->query("SELECT * FROM tahun_ajar"); while ($data5 = $query5->fetch_assoc()): ?>
        <option value="<?=$data5["kd_tajar"]?>" <?= (!$update) ?: (($row5["kd_tajar"] != $data5["kd_tajar"]) ?: 'selected="on"') ?>><?=$data5["tahun_ajar"]?></option>
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
     Tabel Siswa
 </div>
 <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Username</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Orang Tua</th>
                    <th>Alamat</th>
                    <th>E-mail</th>
                    <th>Foto</th>
                    <th>Telp</th>
                    <th>Status</th>
                    
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php $no = 1; ?>
                  <?php if ($query = $connection->query("SELECT * FROM siswa")): ?>
                   <?php while($row = $query->fetch_assoc()): ?>
                    <td></td>
                    <td><?=$row['nis']?></td>
                    <td><?=$row['nisn']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['username']?></td>
                    
                    <td><?=$row['kelamin']?></td>
                    <td><?=$row['tmp_lahir']?></td>
                    
                    <td><?=$row['tgl_lahir']?></td>
                    <td><?=$row['kd_ortu']?></td>
                    <td><?=$row['alamat']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['gambar']?></td>
                    <td><?=$row['telp']?></td>
                    <td><?=$row['status']?></td>
                    <td class="hidden-print">
                       <div class="btn-group">
                           <a href="?module=siswa&action=update&key=<?=$row['nis']?>" class="btn btn-warning btn-xs">Edit</a>
                           <a href="?module=siswa&action=delete&key=<?=$row['nis']?>" class="btn btn-danger btn-xs">Hapus</a>
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
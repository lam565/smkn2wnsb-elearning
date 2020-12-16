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
   $sql = $connection->query("SELECT * FROM rombel WHERE nis='$_GET[key]'");
   $row = $sql->fetch_assoc();
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($update) {
    $sql = "UPDATE rombel SET kd_kelas='$_POST[kd_kelas]',kd_tajar='$_POST[kd_tajar]' WHERE nis='$_GET[key]'";
  } else {
    $sql = "INSERT INTO rombel VALUES ('$_POST[nis]', '$_POST[kd_kelas]', '$_POST[kd_tajar]')";
  }
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=rombel'</script>";
  } else {
    echo "<script>alert('Gagal'); window.location = 'media.php?module=rombel'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM rombel WHERE nis='$_GET[key]'");
  echo "<script>alert('Berhasil'); window.location = 'media.php?module=rombel'</script>";
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
       <?= ($update) ? "EDIT" : "TAMBAH" ?> ROMBEL
     </div>
     <div class="panel-body text-center recent-users-sec">
      <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">
       
       <div class="form-group">
        <label>Siswa </label>
        <select class="form-control" name="nis">
            <option>--Pilih Siswa--</option>
            <?php $query = $connection->query("SELECT * FROM siswa"); while ($data = $query->fetch_assoc()): ?>
            <option value="<?=$data["nis"]?>" <?= (!$update) ?: (($data["nis"] != $data["nis"]) ?: 'selected="on"') ?>><?=$data["nis"]?>--<?=$data["nama"]?></option>
        <?php endwhile; ?>
    </select>
</div>
      
      
       <div class="form-group">
        <label>Kelas </label>
        <select class="form-control" name="kd_kelas">
            <option>--Pilih Kelas--</option>
            <?php $query3 = $connection->query("SELECT * FROM kelas"); while ($data3 = $query3->fetch_assoc()): ?>
            <option value="<?=$data3["kd_kelas"]?>" <?= (!$update) ?: (($data3["kd_kelas"] != $data3["kd_kelas"]) ?: 'selected="on"') ?>><?=$data3["nama_kelas"]?></option>
        <?php endwhile; ?>
    </select>
</div>
<div class="form-group">
    <label>Tahun Ajaran</label>
    <select class="form-control" name="kd_tajar">
        <option>--Pilih Tahun Ajaran--</option>
        <?php $query5 = $connection->query("SELECT * FROM tahun_ajar"); while ($data5 = $query5->fetch_assoc()): ?>
        <option value="<?=$data5["kd_tajar"]?>" <?= (!$update) ?: (($data5["kd_tajar"] != $data5["kd_tajar"]) ?: 'selected="on"') ?>><?=$data5["tahun_ajar"]?></option>
    <?php endwhile; ?>
</select>
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
     Tabel Rombel
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
           
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php $no = 1; ?>
         <?php if ($query = $connection->query("
		 SELECT * FROM rombel,kelas,tahun_ajar,siswa 
		 where rombel.kd_kelas=kelas.kd_kelas
		 and siswa.nis=rombel.nis
		 and rombel.kd_tajar=tahun_ajar.kd_tajar")): ?>
           <?php while($row = $query->fetch_assoc()): ?>
            <tr>
              <td></td>
              <td><?=$row['nis']?></td>
			   <td><?=$row['nama']?></td>
              <td><?=$row['nama_kelas']?></td>
              <td><?=$row['tahun_ajar']?></td>
              
              <td class="hidden-print">
               <div class="btn-group">
                 <a href="?module=rombel&action=update&key=<?=$row['nis']?>" class="btn btn-warning btn-xs">Edit</a>
                 <a href="?module=rombel&action=delete&key=<?=$row['nis']?>" class="btn btn-danger btn-xs">Hapus</a>
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
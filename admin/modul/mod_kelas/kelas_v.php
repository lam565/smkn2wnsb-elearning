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
   $sql = $connection->query("SELECT * FROM kelas WHERE kd_kelas='$_GET[key]'");
   $row = $sql->fetch_assoc();
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($update) {
    $sql = "UPDATE kelas SET nama_kelas='$_POST[nama_kelas]',tingkat='$_POST[tingkat]',kd_jurusan='$_POST[kd_jurusan]' WHERE kd_kelas='$_GET[key]'";
  } else {
    $sql = "INSERT INTO kelas VALUES ('$_POST[kd_kelas]', '$_POST[nama_kelas]', '$_POST[tingkat]', '$_POST[kd_jurusan]')";
  }
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
  } else {
    echo "<script>alert('Gagal'); window.location = 'media.php?module=kelas'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM kelas WHERE kd_kelas='$_GET[key]'");
  echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
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
       <?= ($update) ? "EDIT" : "TAMBAH" ?> KELAS
     </div>
     <div class="panel-body text-center recent-users-sec">
      <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" role="form">

        <div class="form-group">
        <label>Tingkat </label>
        <select class="form-control" name="tingkat">
          <option value="T">--Pilih Tingkat--</option>
          <?php $query5 = $connection->query("SELECT * FROM kelas group by tingkat and kd_jurusan"); while ($data5 = $query5->fetch_assoc()): ?>
          <?php if($data5["tingkat"]=='X'){ ?>
            <option value="X" <?= (!$update) ?: (($data5["aktif"] != $data5["aktif"]) ?: 'selected="on"') ?>>X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          <?php } else if($data5["tingkat"]=='XI') { ?>
            <option value="XI" <?= (!$update) ?: (($data5["aktif"] != $data5["aktif"]) ?: 'selected="on"') ?>>XI</option>
            <option value="X">X</option>
            <option value="XII">XII</option>
          <?php } else if($data5["tingkat"]=='XII') { ?>
            <option value="XII" <?= (!$update) ?: (($data5["aktif"] != $data5["aktif"]) ?: 'selected="on"') ?>>XII</option>
            <option value="X">X</option>
            <option value="XI">XII</option>
          <?php } ?>


        <?php endwhile; ?>


      </select>
    </div>

    <div class="form-group">
      <label>Jurusan </label>
      <select class="form-control" name="kd_jurusan">
        <option>--Pilih Jurusan--</option>
        <?php $query = $connection->query("SELECT * FROM jurusan"); while ($data = $query->fetch_assoc()): ?>
        <option value="<?=$data["kd_jurusan"]?>" <?= (!$update) ?: (($row["kd_jurusan"] != $data["kd_jurusan"]) ?: 'selected="on"') ?>><?=$data["nama_jurusan"]?></option>
      <?php endwhile; ?>
    </select>
  </div>

       <div class="form-group">
        <label>Kode Kelas</label>
        <input class="form-control" placeholder="Masukkan Kode Kelas" name="kd_kelas" type="text" <?= (!$update) ?: 'value="'.$row["kd_kelas"].'"' ?>/>
      </div>


      <div class="form-group">
        <label>Nama Kelas </label>
        <input class="form-control" placeholder="Masukkan Nama Kelas" name="nama_kelas" type="text" <?= (!$update) ?: 'value="'.$row["nama_kelas"].'"' ?>/>
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
     Tabel Kelas
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Kelas</th>
            <th>Nama Kelas</th>
            <th>Tingkat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         <?php $no = 1; ?>
         <?php if ($query = $connection->query("SELECT * FROM kelas,jurusan where kelas.kd_jurusan=jurusan.kd_jurusan")): ?>
           <?php while($row = $query->fetch_assoc()): ?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$row['kd_kelas']?> <br><a href="?module=rombel&kls=<?=$row['kd_kelas']?>" class="btn btn-xs btn-info">Lihat</a> </td>
              <td><?=$row['nama_kelas']?></td>
              <td><?=$row['tingkat']?></td>
              <td><?=$row['nama_jurusan']?></td>
              <td class="hidden-print">
               <div class="btn-group">
                 <a href="?module=kelas&action=update&key=<?=$row['kd_kelas']?>" class="btn btn-warning btn-xs">Edit</a>
                 <a href="?module=kelas&action=delete&key=<?=$row['kd_kelas']?>" class="btn btn-danger btn-xs">Hapus</a>
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
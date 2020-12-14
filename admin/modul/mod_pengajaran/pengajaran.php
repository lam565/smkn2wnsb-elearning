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

  <div class="content-wrapper">
   <div class="container">
    <div class="row pad-botm">
      <div class="col-md-12">
        <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>
      </div>

    </div>
    <div class="row">
     <div class="col-md-4 col-sm-4 col-xs-12">
       <div class="panel panel-info">
        <div class="panel-heading">
         MANAJEMEN PENGAJAR
       </div>
       <div class="panel-body text-center recent-users-sec">
        <form action="" method="POST" role="form">

         <div class="form-group">
          <label> Mata Pelajaran</label>
          <select class="form-control" name="kd_mapel" id="cbbmapelajar">
            <option>Pilih Matapelajaran</option>
            <?php if ($query = $connection->query("SELECT * FROM mapel ORDER BY nama_mapel")): ?>
             <?php while($row = $query->fetch_assoc()): ?>
              <option value="<?php echo $row['kd_mapel']; ?>"><?php echo $row['nama_mapel']; ?></option>
            <?php endwhile ?>
          <?php endif ?>
        </select>
      </div>
      <div class="form-group">
        <label> Jurusan </label>
        <select class="form-control" name="kd_jurusan" id="cbbjurusan" data-mapel="">
          <option>Pilih Jurusan</option>
          <?php if ($query = $connection->query("SELECT * FROM jurusan ORDER BY nama_jurusan")): ?>
           <?php while($row = $query->fetch_assoc()): ?>
            <option value="<?php echo $row['kd_jurusan']; ?>"><?php echo $row['nama_jurusan']; ?></option>
          <?php endwhile ?>
        <?php endif ?>
      </select>
    </div>

    <div class="form-group">
      <label>Kelas </label>
      <div id="kelasajar">
        
      </div>        
    </div>
  <div class="form-group">
    <label>Guru </label>

  </div>

  <button type="submit" class="btn btn-btn-block">Simpan</button>

</form>
</div>
</div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="panel panel-success">
    <div class="panel-heading">
     TABEL PENGAJAR
   </div>
   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Guru</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

         <?php 
         $no=1;
         if ($query = $connection->query("SELECT * FROM pengajaran,mapel,kelas,guru where pengajaran.kd_mapel=mapel.kd_mapel AND pengajaran.kd_kelas=kelas.kd_kelas ORDER BY pengajaran.kd_mapel")): ?>
           <?php while($row = $query->fetch_assoc()): ?>
            <tr>
              <td></td>
              <td><?=$no; ?></td>
              <td><?=$row['kd_kurikulum']?></td>
              <td><?=$row['nama_mapel']?></td>
              <td><?=$row['nama_kelas']?></td>
              <td><?=$row['nama']?></td>

              <td class="hidden-print">
               <div class="btn-group">
                <a href="?module=detkurikulum&action=update&key=<?=$row['id_detail']?>&key2=<?=$row['kd_kurikulum']?>" class="btn btn-warning btn-xs">Edit</a>
                <a href="?module=detkurikulum&action=delete&key=<?=$row['id_detail']?>&key2=<?=$row['kd_kurikulum']?>" class="btn btn-danger btn-xs">Hapus</a>
              </div>
            </td>

          </tr>
          <?php $no++; endwhile ?>
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
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
        <form action="modul/mod_pengajaran/aksi.php?act=add" method="POST" role="form">

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
      <select class="form-control" name="kd_guru">
        <option>Pilih Guru Pengajar</option>
        <?php 
        $query=mysqli_query($connect,"SELECT kd_guru,nama FROM guru WHERE status='Aktif' ORDER BY nama");
        $c=mysqli_num_rows($query);
        if ($c>0) {
          while ($rsl=mysqli_fetch_array($query)){
            echo "<option value='$rsl[kd_guru]'>$rsl[nama]</option>";
          }
        }
        ?>
      </select>
    </div>

    <input type="submit" name="submit" value="Tambah" class="btn btn-info">

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
    <form action="" method="get">
      <div class="form-group col-sm-4 col-md-2 col-xs-12">
        <label>Filter</label>
        <input type="hidden" name="module" value="pengajaran">
      </div>
      <div class="form-group col-sm-6 col-md-8 col-xs-12">
        <select name='fkelas' class="form-control">
          <option value="all">Semua</option>
          <?php 
          $query=mysqli_query($connect,"SELECT kd_kelas,nama_kelas FROM kelas ORDER BY tingkat");
          
          while ($result=mysqli_fetch_array($query)) {
            echo "<option value='$result[kd_kelas]'>$result[nama_kelas]</option>";
          }
           ?>
         </select>
       </div>
       <div class="form-group col-sm-2 col-md-2 col-xs-12">
        <input type="submit" class="btn btn-info btn-sm" value="Saring">
      </div>
    </form>
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
         function namaGuru($con,$kd){
          $query = mysqli_query($con,"SELECT nama FROM guru WHERE kd_guru='$kd'");
          $guru=mysqli_fetch_array($query);
          return $guru['nama'];
         }
         $fkelas="";
         if (isset($_GET['fkelas'])){
          if ($_GET['fkelas']=='all'){
            $fkelas="";
          } else {
            $fkelas=" AND pengajaran.kd_kelas='$_GET[fkelas]' ";
          }
          
         } 
         $no=1;
         if ($query = $connection->query("SELECT * FROM pengajaran,mapel,kelas where pengajaran.kd_mapel=mapel.kd_mapel AND pengajaran.kd_kelas=kelas.kd_kelas ".$fkelas." ORDER BY pengajaran.kd_kelas")): ?>
           <?php while($row = $query->fetch_assoc()): ?>
            <tr>
              <td><?=$no; ?></td>
              <td><?=$row['nama_mapel']?></td>
              <td><?=$row['nama_kelas']?></td>
              <td><?php 
              $kd_guru=explode(",", $row['kd_guru']);
              $j=1;
              foreach ($kd_guru as $kd) {
                echo $j==2 ? "<br>" : " ";
                echo namaGuru($connect,$kd)." <a href='modul/mod_pengajaran/aksi.php?act=del&kd=$row[kd_pengajaran]&kdg=$kd' class='btn-danger btn-xs'> x </a>";
                $j++;
              } 
              ?></td>
              <td class="hidden-print">
               <div class="btn-group">
                <a href="?module=pengajaran&eid=<?php echo $row['kd_pengajaran'] ?>" class="btn btn-warning btn-xs">Edit</a>
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
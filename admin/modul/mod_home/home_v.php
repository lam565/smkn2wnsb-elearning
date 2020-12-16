<!-- CSS -->
<?php


if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
else{

  ?>



  <div class="content-wrapper">
   <div class="container">
    <div class="row pad-botm">
      <div class="col-md-12">
        <h4 class="header-line">DASHBOARD GURU</h4>
      </div>
    </div>
    <?php 
    $qguru = mysqli_query($connect,"SELECT * FROM guru WHERE kd_guru='$_SESSION[kode]'");
    $guru = mysqli_fetch_array($qguru);
    //$guru['kelamin']=='L' ? $panggilan = "Bapak" : $panggilan = "Ibu"; 
    ?>
    <div class="row">
      <div class="alert alert-info">
        <h4>SELAMAT DATANG <?php echo " <strong>".$guru['nama']."</strong>"; ?></h4>
        <p>Selahkan bekerja dengan memilih beberapa menu yang telah disediakan!</p> 
      </div>
    </div>
    <div class="row">

      <!-- Ambil data kelas yang diajar -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            Profil Guru
          </div>
          <div class="panel-body">
            <div class="row">
              <label class="col-sm-3 col-xs-3">Nama : </label>
              <p class="col-sm-7 col-xs-7"><?php echo $guru['nama'] ?></p>
              <a class="col-sm-2 col-xs-2 btn btn-xs" href="">Edit</a>
            </div>
            <div class="row">
              <label class="col-sm-12 col-xs-12 text-center">** Mata Pelajaran Diampu **</label>
              <div class="panel panel-info">
                <div class="panel-body table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Matapelajaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i=1; 
                      $qget=mysqli_query($connect,"SELECT * FROM mapel,kelas,pengajaran WHERE pengajaran.kd_mapel=mapel.kd_mapel AND pengajaran.kd_kelas=kelas.kd_kelas AND pengajaran.kd_guru='$guru[kd_guru]'");
                      while ($ajar=mysqli_fetch_array($qget)) {
                        echo "<tr>";
                        echo "<td> $i </td>
                        <td>$ajar[nama_mapel] - $ajar[nama_kelas]</td>
                        <td><a class='btn btn-xs btn-danger' href='modul/mod_home/aksi.php?act=del&kd=$ajar[kd_pengajaran]'>-</a></td>";
                        echo "</tr>";
                        $i++;
                      }
                      ?>
                      <tr>
                        <td colspan="3" class="text-center">
                          <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"> + Tambah </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="modul/mod_home/aksi.php?act=add">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Tambah Matapelajaran</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Matapelajaran</label>
                    <select class="form-control" name="kd_mapel" id="cbbmapelajar">
                      <option value="">Pilih Mapel</option>
                      <?php 
                      $qmp=mysqli_query($connect,"SELECT kd_mapel,nama_mapel FROM mapel ORDER BY nama_mapel");
                      while ($mapel=mysqli_fetch_array($qmp)){
                        echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="kd_jurusan" id="cbbjurusan" data-mapel="">
                      <option value="">Pilih Jurusan</option>
                      <?php 
                      $qjrs=mysqli_query($connect,"SELECT kd_jurusan,nama_jurusan FROM jurusan ORDER BY nama_jurusan");
                      while ($jrs=mysqli_fetch_array($qjrs)){
                        echo "<option value='$jrs[kd_jurusan]'>$jrs[nama_jurusan]</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <div id="kelasajar"></div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="kd_guru" value="<?php echo $guru['kd_guru'] ?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="panel panel-info">
          <div class="panel-body">
            <?php
            $qbacakurikulum="SELECT kls.kd_kelas,kls.nama_kelas,g.kd_guru,g.nama,m.nama_mapel 
            FROM pengajaran as p, guru as g, kelas as kls, mapel as m 
            WHERE g.kd_guru=p.kd_guru AND kls.kd_kelas=p.kd_kelas AND m.kd_mapel=p.kd_mapel AND g.username='$_SESSION[username]'";

            $datakurikulum=mysqli_query($connect,$qbacakurikulum);
            while ($rkur=mysqli_fetch_array($datakurikulum)){
              echo "<div class=\"col-md-3 col-sm-3 col-xs-6\">
              <div class=\"alert alert-info back-widget-set text-center\">
              <i class=\"fa fa-book fa-5x\"></i>
              <p>$rkur[nama_mapel]</p>
              <h3>$rkur[nama_kelas]</h3>

              </div>
              </div>";
            }

            ?> 
          </div>
        </div>
      </div>


    </div>              

  </div>
</div>


<?php } ?>
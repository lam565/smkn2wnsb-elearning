<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Beranda Siswa</h4>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12" >
    <div class="panel panel-success">
      <div class="panel-heading">
        Detail Siswa
      </div>
      <div class="panel-body">
        <div class="img text-center">
          <img src="assets/img/user2.png">
          <h4>Nama Siswa</h4>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <td>NIS</td>
                <td>:</td>
                <td>31231</td>
              </tr>
              <tr>
                <td>JENIS KELAMIN</td>
                <td>:</td>
                <td>Laki - laki</td>
              </tr>
              <tr>
                <td>KELAS</td>
                <td>:</td>
                <td>XII A</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="panel-footer">
        2020/2021 Semester Ganjil
      </div>
    </div>
    <div class="panel panel-success">
      <div class="panel-heading">
        Daftar Mata Pelajaran
      </div>
      <div class="panel-body">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Semua Mapel</a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse in" style="height: auto;">
              <div class="panel-body">
                <a href="?module=materi&mp=all" class="btn btn-primary btn-sm">Materi</a>
                <a href="?module=tugas&mp=all" class="btn btn-primary btn-sm">Tugas</a>
                <a href="?module=nilai&mp=all" class="btn btn-primary btn-sm">Nilai</a>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Mata Pelajaran 1</a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
              <div class="panel-body">
                <a href="#" class="btn btn-primary btn-sm">Materi</a>
                <a href="#" class="btn btn-primary btn-sm">Tugas</a>
                <a href="#" class="btn btn-primary btn-sm">Nilai</a>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#mapel2" class="collapsed">Mata Pelajaran 2</a>
              </h4>
            </div>
            <div id="mapel2" class="panel-collapse collapse" style="height: 0px;">
              <div class="panel-body">
                <a href="#" class="btn btn-primary btn-sm">Materi</a>
                <a href="#" class="btn btn-primary btn-sm">Tugas</a>
                <a href="#" class="btn btn-primary btn-sm">Nilai</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8 col-sm-8 col-xs-12">


    <div class="row">
      <div class="panel panel-warning">
        <div class="panel-heading">
          Timeline Kelas XII A
        </div>
        <div class="panel-body">
          <?php 
          $qt="SELECT timeline.jenis 
          FROM timeline, kurikulum, detail_kurikulum as dk, guru, mapel, kelas 
          WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND 
          dk.kd_guru=guru.kd_guru AND 
          dk.kd_mapel=timeline.kd_mapel AND dk.kd_kelas=kelas.kd_kelas AND dk.kd_kelas=timeline.kd_kelas AND dk.kd_mapel=mapel.kd_mapel AND timeline.kd_kelas='xa1'";

          
          ?>
          <div class="alert alert-info">
            <h4><i class="fa fa-briefcase"></i> MATERI</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
          </div>
          <div class="alert alert-info">
            <h4><i class="fa fa-recycle"></i> TUGAS</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
          </div>
          <div class="alert alert-info">
            <h4><i class="fa fa-recycle"></i> TUGAS</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
          </div>
          <div class="alert alert-info">
            <h4><i class="fa fa-recycle"></i> TUGAS</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
          </div>
          <div class="alert alert-info">
            <h4><i class="fa fa-recycle"></i> TUGAS</h4>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="alert-link">Alert Link</a>.
          </div>
        </div>
        <div class="panel-footer">
          <a href="#">Lihat Semua</a>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
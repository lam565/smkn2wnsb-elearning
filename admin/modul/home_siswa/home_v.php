<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Beranda Siswa</h4>
  </div>
</div>
<?php
if ($rombel=="NULL") {

  ?>
  <div class="row">
    <div class="col-12">
      <div class="alert alert-info">
        <h4>SELAMAT DATANG</h4>
        <p>Sayang sekali, data kamu belum diinputkan ke dalam kelas pada tahun ajaran ini, Silahkan meminta admin untuk memasukkan</p> 
      </div>
    </div>
  </div>

  <?php
    # code...
} else {


  ?>
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12" >

      <div class="panel panel-success">
        <div class="panel-heading">
          Data Siswa
        </div>
        <div class="panel-body">
          <div class="row">
            <label class="col-sm-3 col-xs-3">Nama </label>
            <p class="col-sm-7 col-xs-7"><?php echo $nama_siswa; ?></p>
            <a class="col-sm-2 col-xs-2 btn btn-xs" href="" data-toggle="modal" data-target="#modalnama">Ubah</a>
          </div>
          <div class="row">
            <label class="col-sm-3 col-xs-3">Kelas</label>
            <p class="col-sm-7 col-xs-7"> <?= $nama_kelas; ?></p>
          </div>
          <div class="row">
            <label class="col-sm-3 col-xs-3">Password</label>
            <p class="col-sm-7 col-xs-7"> ********** </p>
            <a class="col-sm-2 col-xs-2 btn btn-xs" href="" data-toggle="modal" data-target="#modalpassowrd">Ubah</a>
          </div>
          
        </div>
      </div>

      <div class="panel panel-success">
        <div class="panel-heading">
          Daftar Mata Pelajaran
        </div>
        <div class="panel-body">
          <div class="panel-group" id="accordion">

            <?php
            $qmp="SELECT mapel.kd_mapel, mapel.nama_mapel 
            FROM pengajaran as p, mapel, kelas 
            WHERE p.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=p.kd_kelas AND p.kd_kelas='$kode_kelas'";
            $mp=mysqli_query($connect,$qmp);
            $o=1;
            while ($rmp=mysqli_fetch_array($mp)){
              echo "<div class='panel panel-default'>
              <div class='panel-heading'>
              <h4 class='panel-title'>
              <a data-toggle='collapse' data-parent='#accordion' href='#collapse$o' class='collapsed'>$rmp[nama_mapel]</a>
              </h4>
              </div>
              <div id='collapse$o' class='panel-collapse collapse' style='height: auto;'>
              <div class='panel-body'>
              <a href='?module=materi&mp=$rmp[kd_mapel]' class='btn btn-primary btn-sm'>Materi</a>
              <a href='?module=tugas&mp=$rmp[kd_mapel]' class='btn btn-primary btn-sm'>Tugas</a>
              <a href='?module=nilai&mp=$rmp[kd_mapel]' class='btn btn-primary btn-sm'>Nilai</a>";

              date_default_timezone_set("Asia/Bangkok");
              $tglnow = date("Y-m-d");
              $cekabsensi = mysqli_query($connect,"SELECT kd_absensi FROM absensi WHERE nis='$nis' AND kd_kelas='$kode_kelas' AND kd_mapel='$rmp[kd_mapel]' AND tgl_absensi LIKE '$tglnow%'");
              $sudahabsen = mysqli_num_rows($cekabsensi);

              if ($sudahabsen > 0) {
                echo " <a href='#' class='btn btn-default btn-sm' disabled>Sudah Absensi</a>";
              } else {
                echo " <a href='modul/home_siswa/aksi.php?act=absen&mp=$rmp[kd_mapel]&nis=$nis&kls=$kode_kelas' class='btn btn-primary btn-sm'>Absensi</a>";
              }
              
              echo "</div>
              </div>
              </div>";
              $o++;
            }
            ?>

          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalnama" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="modul/home_siswa/aksi.php?act=rename">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Ubah Nama</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_baru">Nama Baru</label>
                <input type="text" name="nama_baru" class="form-control" required="" placeholder="<?php echo $nama_siswa; ?>">                    
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="nis" value="<?php echo $nis; ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="modalpassowrd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="modul/home_siswa/aksi.php?act=updpass">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Ubah Password</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="passlama">Password Lama</label>
                <input type="password" name="passlama" class="form-control" required="" >                    
              </div>
              <div class="form-group">
                <label for="passbaru1">Password Baru</label>
                <input type="password" name="passbaru1" class="form-control" required="" >                    
              </div>
              <div class="form-group">
                <label for="passbaru2">Ulangi Password Baru</label>
                <input type="password" name="passbaru2" class="form-control" required="" >                    
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="nis" value="<?php echo $nis ?>">
              <input type="hidden" name="username" value="<?php echo $username ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END Modal -->

    <div class="col-md-8 col-sm-8 col-xs-12">


      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Timeline Kelas <?php echo $nama_kelas; ?>
          </div>
          <div class="panel-body">
            <?php 

            function getTL($j,$kd,$conn){
              $query="SELECT $j.*, guru.nama, mapel.nama_mapel  
              FROM $j , guru, mapel 
              WHERE $j.kd_guru=guru.kd_guru AND $j.kd_mapel=mapel.kd_mapel AND kd_$j='$kd'";
              $q=mysqli_query($conn,$query);
              while ($r=mysqli_fetch_array($q)){
                $j=strtoupper($j);
                echo "<div class='alert alert-info'>
                <h4><i class='fa fa-briefcase'></i> $j</h4>";
                switch ($j) {
                  case 'TUGAS':
                  echo "Guru $r[nama] telah menambahkan TUGAS $r[nama_mapel] pada $r[tgl_up]. <a href='?module=detailtugas&kd=$r[kd_tugas]' class='alert-link'>Buka Tugas</a>";
                  break;
                  case 'MATERI':
                  echo "Guru $r[nama] telah menambahkan MATERI $r[nama_mapel] pada $r[tgl_up]. <a href='?module=materi&mp=$r[kd_mapel]' class='alert-link'>Buka materi</a>";
                  break;

                  case 'UJIAN':
                  echo "Guru $r[nama] telah menambahkan UJIAN $r[nama_mapel]. <a href='?module=ujian&mp=$r[kd_mapel]' class='alert-link'>Buka Ujian</a>";
                  break;

                  default:
                  # code...
                  break;
                }

                echo "</div>";
              }
            }

            $qt="SELECT timeline.jenis, timeline.id_jenis 
            FROM timeline, pengajaran as p, guru, mapel, kelas 
            WHERE p.kd_guru=guru.kd_guru AND 
            p.kd_mapel=timeline.kd_mapel AND p.kd_kelas=kelas.kd_kelas AND p.kd_kelas=timeline.kd_kelas AND p.kd_mapel=mapel.kd_mapel AND timeline.kd_kelas='$kode_kelas' ORDER BY timeline.waktu DESC";
            $tlguru=mysqli_query($connect,$qt);
            while ($rTL=mysqli_fetch_array($tlguru)){
              getTL($rTL['jenis'],$rTL['id_jenis'],$connect);
            }

            ?>

          </div>
          <div class="panel-footer">
            <a href="#">....</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php
    # code...
} 
?>
</div>
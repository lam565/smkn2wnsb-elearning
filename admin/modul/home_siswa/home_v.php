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
      <?php
      $qsw="SELECT * FROM siswa WHERE nis='$_SESSION[kode]'";
      $rsw=mysqli_fetch_array(mysqli_query($connect,$qsw));
      ?>
      <div class="panel-body">
        <div class="img text-center">
          <img src="assets/img/user2.png">
          <h4><?php echo $rsw['nama']; ?></h4>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?php echo $_SESSION['kode']; ?></td>
              </tr>
              <tr>
                <td>JENIS KELAMIN</td>
                <td>:</td>
                <td><?php echo  $rsw['kelamin']=='L' ? "Laki - laki" : "Perempuan"; ?></td>
              </tr>
              <tr>
                <td>KELAS</td>
                <td>:</td>
                <td><?php echo $nama_kelas; ?></td>
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

          <?php
          $qmp="SELECT mapel.kd_mapel, mapel.nama_mapel 
          FROM kurikulum, detail_kurikulum as dk, mapel, kelas 
          WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND dk.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=dk.kd_kelas AND dk.kd_kelas='$kode_kelas'";
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
            <a href='?module=nilai&mp=$rmp[kd_mapel]' class='btn btn-primary btn-sm'>Nilai</a>
            </div>
            </div>
            </div>";
            $o++;
          }
          ?>
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8 col-sm-8 col-xs-12">


    <div class="row">
      <div class="panel panel-warning">
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
                echo "Guru $r[nama] telah menambahkan UJIAN $r[nama_mapel]. <a href='?module=ujian&mp=$r[kd_mapel]' class='alert-link'>Buka materi</a>";
                break;

                default:
                  # code...
                break;
              }
              
              echo "</div>";
            }
          }

          $qt="SELECT timeline.jenis, timeline.id_jenis 
          FROM timeline, kurikulum, detail_kurikulum as dk, guru, mapel, kelas 
          WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND 
          dk.kd_guru=guru.kd_guru AND 
          dk.kd_mapel=timeline.kd_mapel AND dk.kd_kelas=kelas.kd_kelas AND dk.kd_kelas=timeline.kd_kelas AND dk.kd_mapel=mapel.kd_mapel AND timeline.kd_kelas='$kode_kelas' ORDER BY timeline.waktu DESC";
          $tlguru=mysqli_query($connect,$qt);
          while ($rTL=mysqli_fetch_array($tlguru)){
            getTL($rTL['jenis'],$rTL['id_jenis'],$connect);
          }

          ?>
          
        </div>
        <div class="panel-footer">
          <a href="#">Lihat Semua</a>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
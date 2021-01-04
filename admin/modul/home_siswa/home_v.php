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

      <?php
      $qsw="SELECT * FROM siswa WHERE nis='$_SESSION[kode]'";
      $rsw=mysqli_fetch_array(mysqli_query($connect,$qsw));
      ?>

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
            <a href="#">Lihat Semua</a>
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
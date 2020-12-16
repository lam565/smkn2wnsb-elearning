<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">UJIAN</h4>
  </div>
</div>
<div class="row">
  <?php
  if (isset($_GET['mp'])){
    $mapel=$_GET['mp'];
  } else {
    $mapel='all';
  }
  ?>
</div>
<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12" >
    <div class="panel panel-success">
      <div class="panel-heading">
        Ujian Untuk Kelas <?php echo $nama_kelas; ?>
      </div>        

      <div class="panel-body">

        <a href="?module=ujian&mp=all" class="btn <?php echo $_GET['mp']=='all' ? "btn-default" : "btn-primary"; ?> btn-sm form-control">Semua</a>
        <?php
        $qmapel=mysqli_query($connect,"SELECT mapel.kd_mapel, mapel.nama_mapel 
          FROM mapel, pengajaran as p
          WHERE p.kd_mapel=mapel.kd_mapel AND p.kd_kelas='$kode_kelas'");
        while ($rmp=mysqli_fetch_array($qmapel)){
          $mapel==$rmp['kd_mapel'] ? $cbtn="btn-default" : $cbtn="btn-primary";
          echo "<a href='?module=ujian&mp=$rmp[kd_mapel]' class='btn $cbtn btn-sm form-control'>$rmp[nama_mapel]</a>  ";
        }
        ?>

      </div>
    </div> 
  </div>
  <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        Ujian Untuk Kelas <?php echo $nama_kelas; ?>
      </div>        

      <div class="panel-body">

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Ujian </th>
                <th>Mata Pelajaran </th>
                <th>Guru Pengampu </th>
                <th>Tanggal</th>
                <th>Aksi </th>
              </tr>
            </thead>
            <tbody>
              <?php

              if ($mapel=='all') {
                $qmat="SELECT ujian.nama_ujian, mapel.nama_mapel, ujian.tgl_ujian, ujian.kd_ujian, kelas.nama_kelas , guru.nama
                FROM ujian, pengajaran as p, mapel, kelas, guru 
                WHERE p.kd_mapel=ujian.kd_mapel AND ujian.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=ujian.kd_kelas AND kelas.kd_kelas=p.kd_kelas AND ujian.kd_guru=p.kd_guru AND guru.kd_guru=p.kd_guru AND ujian.kd_kelas='$kode_kelas'";
                $mat=mysqli_query($connect,$qmat);
                while ($rmat=mysqli_fetch_array($mat)){
                  echo "<tr class='odd gradeX'>
                  <td>$rmat[nama_ujian]</td>
                  <td>$rmat[nama_mapel]</td>
                  <td>$rmat[nama]</td>";

                  echo "<td class='center'>$rmat[tgl_ujian]</td>
                  <td class='center'><a class='btn btn-info btn-sm' href='?module=detailujian&kd=$rmat[kd_ujian]'>Buka ujian</a></td>";  

                  echo "</tr>";
                }
              } else {
                $qmat="SELECT ujian.nama_ujian, mapel.nama_mapel, ujian.tgl_ujian, ujian.kd_ujian, kelas.nama_kelas , guru.nama
                FROM ujian, pengajaran as p, mapel, kelas, guru 
                WHERE p.kd_mapel=ujian.kd_mapel AND ujian.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=ujian.kd_kelas AND kelas.kd_kelas=p.kd_kelas AND ujian.kd_guru=p.kd_guru AND guru.kd_guru=p.kd_guru AND ujian.kd_kelas='$kode_kelas' AND ujian.kd_mapel='$mapel'";
                $mat=mysqli_query($connect,$qmat);
                $n=mysqli_num_rows($mat);
                if ($n<1) {
                  echo "<tr><td colspan='5'>Belum ada data..</td></tr>";
                } else {
                  while ($rmat=mysqli_fetch_array($mat)){
                    echo "<tr class='odd gradeX'>
                    <td>$rmat[nama_ujian]</td>
                    <td>$rmat[nama_mapel]</td>
                    <td>$rmat[nama]</td>";

                    echo "<td class='center'>$rmat[tgl_ujian]</td>
                    <td class='center'><a class='btn btn-info btn-sm' href='?module=detailujian&kd=$rmat[kd_ujian]'>Buka ujian</a></td>"; 

                    echo "</tr>";
                  }  
                }

              }

              ?>                               
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
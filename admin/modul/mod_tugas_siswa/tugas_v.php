<div class="row pad-botm">
  <div class="col-md-12">
    <h4 class="header-line">Materi Belajar Siswa</h4>
  </div>
</div>
<?php
if (isset($_GET['mp'])){
  $mapel=$_GET['mp'];
} else {
  header("location:?module=tugas&mp=all");
  $mapel='all';
}
?>
<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12" >
    <div class="panel panel-info">
      <div class="panel-heading">
       Tugas Untuk Kelas <?php echo $nama_kelas; ?>
     </div>        

     <div class="panel-body">

      <a href="?module=tugas&mp=all" class="btn <?php echo $_GET['mp']=='all' ? "btn-default" : "btn-primary"; ?> btn-sm form-control">Semua</a>

      <?php
      $qmapel=mysqli_query($connect,"SELECT mapel.kd_mapel, mapel.nama_mapel 
        FROM mapel, pengajaran as p
        WHERE p.kd_mapel=mapel.kd_mapel AND p.kd_kelas='$kode_kelas'");
      while ($rmp=mysqli_fetch_array($qmapel)){
        $mapel==$rmp['kd_mapel'] ? $cbtn="btn-default" : $cbtn="btn-primary";
        echo "<a href='?module=tugas&mp=$rmp[kd_mapel]' class='btn $cbtn btn-sm form-control'>$rmp[nama_mapel]</a>  ";
      }
      ?>

    </div>
  </div>  

</div>
<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="panel panel-info">
    <div class="panel-heading">
     DAFTAR TUGAS
   </div>        

   <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Materi </th>
            <th>Mata Pelajaran </th>
            <th>Guru Pengampu </th>
            <th>File </th>
            <th>Aksi </th>
          </tr>
        </thead>
        <tbody>
          <?php

          if ($mapel=='all') {
            $qmat="SELECT tugas.nama_tugas, tugas.file, tugas.tgl_up, mapel.nama_mapel, tugas.kd_tugas, kelas.nama_kelas , guru.nama
            FROM tugas, pengajaran as p, mapel, kelas, guru 
            WHERE p.kd_mapel=tugas.kd_mapel AND tugas.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=tugas.kd_kelas AND kelas.kd_kelas=p.kd_kelas AND tugas.kd_guru=p.kd_guru AND guru.kd_guru=p.kd_guru AND tugas.kd_kelas='$kode_kelas'";
            $mat=mysqli_query($connect,$qmat);
            while ($rmat=mysqli_fetch_array($mat)){
              echo "<tr class='odd gradeX'>
              <td>$rmat[nama_tugas]</td>
              <td>$rmat[nama_mapel]</td>
              <td>$rmat[nama]</td>";

              echo "<td class='center'>$rmat[file]</td>
              <td class='center'><a class='btn btn-info btn-xs' href='?module=detailtugas&kd=$rmat[kd_tugas]'>Buka Tugas</a></td>";  

              echo "</tr>";
            }
          } else {
            $qmat="SELECT tugas.nama_tugas, tugas.file, tugas.tgl_up, mapel.nama_mapel, tugas.kd_tugas, kelas.nama_kelas , guru.nama
            FROM tugas, pengajaran as p, mapel, kelas, guru 
            WHERE p.kd_mapel=tugas.kd_mapel AND tugas.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=tugas.kd_kelas AND kelas.kd_kelas=p.kd_kelas AND tugas.kd_guru=p.kd_guru AND guru.kd_guru=p.kd_guru AND tugas.kd_kelas='$kode_kelas' AND tugas.kd_mapel='$mapel'";
            $mat=mysqli_query($connect,$qmat);
            while ($rmat=mysqli_fetch_array($mat)){
              echo "<tr class='odd gradeX'>
              <td>$rmat[nama_tugas]</td>
              <td>$rmat[nama_mapel]</td>
              <td>$rmat[nama]</td>";

              echo "<td class='center'>$rmat[file]</td>
              <td class='center'><a class='btn btn-info btn-xs' href='?module=detailtugas&kd=$rmat[kd_tugas]'>Buka Tugas</a></td>"; 

              echo "</tr>";
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
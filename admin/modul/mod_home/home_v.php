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
    <div class="row">
      <div class="alert alert-info">
        <h4>SELAMAT DATANG BPK/IBU GURU <?php echo $_SESSION['kode']; ?></h4>
        <p>Pada kurikulum saat ini anda mengajar :</p> 
      </div>
    </div>
    <div class="row">

      <!-- Ambil data kelas yang diajar -->

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


<?php } ?>
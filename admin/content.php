<?php
if (empty($_SESSION['username']) AND empty($_SESSION['level']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
  ?>

  <?php
  $modul=$_GET['module'];
// Bagian home
  switch ($_SESSION['level']) {
    case 'guru':
    switch ($modul) {
      case 'home':
      include "modul/mod_home/home_v.php";
      break;

      default:
      //notfound modul
      include "modul/mod_404.php";
      break;
    }
    break;

    case 'siswa':
    switch ($modul) {
      case 'home':
        include "modul/home/home_v.php";
      break;
      case 'materi':
        include "modul/mod_materi/materi_v.php";
      break;
      case 'tugas':
        include "modul/mod_tugas/tugas_v.php";
      break;
      case 'detailtugas':
        include "modul/mod_tugas/detail_tugas.php";
      break;

      default:
      //notfound modul
      include "modul/mod_404.php";
      break;
    }
    break;
    
    default:
    //notfound level
    echo "<p><b><center>MODUL BELUM ADA ATAU BELUM LENGKAP</center></b></p>";
    break;
  }
}
?>

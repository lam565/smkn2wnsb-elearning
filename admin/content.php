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
      
      case 'silabus':
      include "modul/mod_silabus/silabus_v.php";
      break;
      
      case 'materi':
      include "modul/mod_materi/materi_v.php";
      break;
      
      case 'banksoal':
      include "modul/mod_banksoal/banksoal_v.php";
      break;

      case 'ujian':
      include "modul/mod_ujian/ujian_v.php";
      break;
      
      case 'tugas':
      include "modul/mod_tugas/tugas_v.php";
      break;

      case 'detailtugas':
      include "modul/mod_tugas/detailtugas.php";
      break;
      
      case 'laporan':
      include "modul/mod_laporan/laporan_v.php";
      break;

      default:
      //notfound modul
      include "modul/mod_404.php";
      break;
    }
    break;
   case 'admin':
    switch ($modul) {
      case 'homeadm':
      include "modul/mod_homeadm/homeadm_v.php";
      break;
	  
	  case 'akun':
      include "modul/mod_akun/akun_v.php";
      break;
	  
	  case 'siswa':
      include "modul/mod_siswa/siswa_v.php";
      break;
	  
	  case 'guru':
      include "modul/mod_guru/guru_v.php";
      break;
	  
	  case 'kelas':
      include "modul/mod_kelas/kelas_v.php";
      break;
	  
	  case 'mapel':
      include "modul/mod_mapel/mapel_v.php";
      break;
	  
	  case 'ortu':
      include "modul/mod_ortu/ortu_v.php";
      break;
	  
	  case 'semester':
      include "modul/mod_semester/semester_v.php";
      break;
	  
	   case 'tahun':
      include "modul/mod_tahun_ajar/tahun_v.php";
      break;
	  
	   case 'kurikulum':
      include "modul/mod_kurikulum/kurikulum_v.php";
      break;
	  
	   case 'detkurikulum':
      include "modul/mod_detailkurikulum/detkurikulum_v.php";
      break;
	  
	  case 'gfsiswa':
      include "modul/mod_gfsiswa/gfsiswa_v.php";
      break;

     default:
      //notfound modul
      include "modul/mod_404.php";
      break;
    }
    break;

    case 'siswa':
    $q=mysqli_query($connect,"SELECT * FROM rombel,kelas WHERE rombel.kd_kelas=kelas.kd_kelas AND rombel.nis='$_SESSION[kode]' AND rombel.kd_tajar='$kd_tajar'");
    $qkls=mysqli_fetch_array($q);
    $kode_kelas=$qkls['kd_kelas'];
    $nama_kelas=$qkls['nama_kelas'];
    switch ($modul) {
      case 'home':
      include "modul/home_siswa/home_v.php";
      break;
      case 'materi':
      include "modul/mod_materi_siswa/materi_v.php";
      break;
      case 'tugas':
      include "modul/mod_tugas_siswa/tugas_v.php";
      break;
      case 'detailtugas':
      include "modul/mod_tugas_siswa/detail_tugas.php";
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

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

      case 'absensi':
      include "modul/kehadiran/kehadiran_v.php";
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
      case 'buatsoal':
      include "modul/mod_banksoal/buatsoal.php";
      break;

      case 'ujian':
      include "modul/mod_ujian/ujian_v.php";
      break;
      case 'detnilujian':
      include "modul/mod_ujian/detail_nilai_ujian.php";
      break;
      
      case 'tugas':
      include "modul/mod_tugas/tugas_v.php";
      break;

      case 'jurnal':
      include "modul/mod_jurnal/jurnal_v.php";
      break;

      case 'detailtugas':
      include "modul/mod_tugas/detailtugas.php";
      break;
      
      case 'forum':
      include "modul/mod_forum/forum_v.php";
      break;

      case 'tampil_forum':
      include "modul/mod_forum/tampil_forum.php";
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

      case 'importsw':
      include "modul/mod_siswa/import_siswa.php";
      break;

      case 'guru':
      include "modul/mod_guru/guru_v.php";
      break;
      case 'importgr':
      include "modul/mod_guru/import_guru.php";
      break;

      case 'kelas':
      include "modul/mod_kelas/kelas_v.php";
      break;

      case 'mapel':
      include "modul/mod_mapel/mapel_v.php";
      break;

      case 'rombel':
      include "modul/mod_rombel/rombel_v.php";
      break;



      case 'tahun':
      include "modul/mod_tahun_ajar/tahun_v.php";
      break;

      case 'pengajaran':
      include "modul/mod_pengajaran/pengajaran.php";
      break;

      case 'pelaporan':
      include "modul/mod_pelaporan/pelaporan_v.php";
      break;

      case 'aktivitas':
      include "modul/mod_aktivitas/aktivitas_v.php";
      break;

      default:
      //notfound modul
      include "modul/mod_404.php";
      break;
    }
    break;

    case 'siswa':
    $q=mysqli_query($connect,"SELECT * FROM siswa,rombel,kelas WHERE rombel.nis=siswa.nis AND rombel.kd_kelas=kelas.kd_kelas AND rombel.nis='$_SESSION[kode]' AND rombel.kd_tajar='$kd_tajar'");
    $rombel="OK";
    if (mysqli_num_rows($q)){
      $qkls=mysqli_fetch_array($q);
      $kode_kelas=$qkls['kd_kelas'];
      $nama_kelas=$qkls['nama_kelas'];
      $nama_siswa=$qkls['nama'];
      $nis = $qkls['nis'];
      $username = $qkls['username'];

    } else {
      $rombel="NULL";
      $kode_kelas="kosong";
      $nama_kelas="kosong";
    }
    
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
      case 'ujian':
      include "modul/ujian_siswa/ujian_v.php";
      break;
      case 'detailujian':
      include "modul/ujian_siswa/detail_ujian.php";
      break;
      case 'lembarujian':
      include "modul/ujian_siswa/lembarujian.php";
      break;
      case 'nilai':
      include "modul/mod_nilai_siswa/nilai_v.php";
      break;
      case 'forum':
      include "modul/mod_forum/forumsiswa_v.php";
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

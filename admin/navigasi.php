<ul id="menu-top" class="nav navbar-nav navbar-right">
    <?php
    switch ($_SESSION['level']) {
        //Navigasi Guru
        case 'guru': ?>
        <li class="<?php if ($_GET['module'] == 'home') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=home"><b>BERANDA</b></a></li>                           
        <li class="<?php if ($_GET['module'] == 'silabus') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=silabus"><b>SILABUS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'materi') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=materi"><b>MATERI</b></a></li>
        <li class="<?php if ($_GET['module'] == 'tugas') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=tugas"><b>TUGAS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'banksoal') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=banksoal"><b>BANK SOAL</b></a></li>
        <li class="<?php if ($_GET['module'] == 'ujian') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=ujian"><b>UJIAN</b></a></li>
       <li class="<?php if ($_GET['module'] == 'forum') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=forum"><b>FORUM KELAS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'laporan') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=laporan"><b>LAPORAN</b></a></li>
        <?php
        break;

        //Navigasi admin
       case 'admin': ?>
        <li class="<?php if ($_GET['module'] == 'homeadm') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=homeadm" class="menu-top-active"><b>BERANDA</b></a></li>
        <li class="<?php if ($_GET['module'] == 'tahun') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=tahun"><b>TAHUN AJARAN</b></a></li>
        <li class="<?php if ($_GET['module'] == 'akun') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=akun"><b>JURUSAN</b></a></li>
        <li class="<?php if ($_GET['module'] == 'kelas') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=kelas"><b>KELAS</b></a></li>
		<li class="<?php if ($_GET['module'] == 'rombel') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=rombel"><b>ROMBEL</b></a></li>
        <li class="<?php if ($_GET['module'] == 'guru') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=guru"><b>GURU</b></a></li>
        <li class="<?php if ($_GET['module'] == 'siswa') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=siswa"><b>SISWA</b></a></li>
		<li class="<?php if ($_GET['module'] == 'mapel') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=mapel"><b>MATA PELAJARAN</b></a></li>
		<li class="<?php if ($_GET['module'] == 'kurikulum') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=kurikulum"><b>KURIKULUM</b></a></li>
		<li class="<?php if ($_GET['module'] == 'pelaporan') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=pelaporan"><b>PELAPORAN</b></a></li>		
		
        <?php
        break;

        //Navigasi Siswa
        case 'siswa': ?>
        <li class="<?php if ($_GET['module'] == 'home') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=home" ><b>Beranda</b></a></li>
        <li class="<?php if ($_GET['module'] == 'materi') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=materi&mp=all" ><b>MATERI</b></a></li>
        <li class="<?php if ($_GET['module'] == 'tugas') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=tugas&mp=all" ><b>TUGAS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'nilai') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=ujian&mp=all" ><b>UJIAN</b></a></li>
        <li class="<?php if ($_GET['module'] == 'nilai') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=nilai" ><b>NILAI</b></a></li>
        <li class="<?php if ($_GET['module'] == 'forum') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=forum"><b>FORUM KELAS</b></a></li>
        <?php
        break;

        default:
        echo "Anda belum login";
        break;
    }
    ?>
</ul>

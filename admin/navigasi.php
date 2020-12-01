<ul id="menu-top" class="nav navbar-nav navbar-right">
    <?php
    switch ($_SESSION['level']) {
        //Navigasi Guru
        case 'guru': ?>
        <li class="<?php if ($_GET['module'] == 'home') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=home"><b>BERANDA</b></a></li>                           
        <li class="<?php if ($_GET['module'] == 'silabus') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=silabus"><b>SILABUS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'materi') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=materi"><b>MATERI</b></a></li>
        <li class="<?php if ($_GET['module'] == 'ujian') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=ujian"><b>UJIAN</b></a></li>
        <li class="<?php if ($_GET['module'] == 'komunitas') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=komunitas"><b>KOMUNITAS</b></a></li>
        <li class="<?php if ($_GET['module'] == 'tugas') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=tugas"><b>QUESTION & ANSWER</b></a></li>
        <li class="<?php if ($_GET['module'] == 'laporan') {echo "open";} ?>"><a style="color:blue;" href="media.php?module=laporan"><b>LAPORAN</b></a></li>
        <?php
        break;

        //Navigasi admin
       case 'admin': ?>
        <li class="<?php if ($_GET['module'] == 'homeadm') {echo "open";} ?>"><a href="media.php?module=homeadm" class="menu-top-active">BERANDA</a></li>
        <li class="<?php if ($_GET['module'] == 'akun') {echo "open";} ?>"><a href="media.php?module=akun">JURUSAN</a></li>
		<li class="<?php if ($_GET['module'] == 'ortu') {echo "open";} ?>"><a href="media.php?module=ortu">ORANG TUA</a></li>
		<li class="<?php if ($_GET['module'] == 'semester') {echo "open";} ?>"><a href="media.php?module=semester">SEMESTER</a></li>
		<li class="<?php if ($_GET['module'] == 'tahun') {echo "open";} ?>"><a href="media.php?module=tahun">TAHUN AJARAN</a></li>
        <li class="<?php if ($_GET['module'] == 'siswa') {echo "open";} ?>"><a href="media.php?module=siswa">SISWA</a></li>
		<li class="<?php if ($_GET['module'] == 'guru') {echo "open";} ?>"><a href="media.php?module=guru">GURU</a></li>
		<li class="<?php if ($_GET['module'] == 'kelas') {echo "open";} ?>"><a href="media.php?module=kelas">KELAS</a></li>
		<li class="<?php if ($_GET['module'] == 'mapel') {echo "open";} ?>"><a href="media.php?module=mapel">MATA PELAJARAN</a></li>
		<li class="<?php if ($_GET['module'] == 'kurikulum') {echo "open";} ?>"><a href="media.php?module=kurikulum">KURIKULUM</a></li>	
		
        <?php
        break;

        //Navigasi Siswa
        case 'siswa': ?>
        <li class="<?php if ($_GET['module'] == 'home') {echo "open";} ?>"><a href="media.php?module=home" >Beranda</a></li>
        <li class="<?php if ($_GET['module'] == 'materi') {echo "open";} ?>"><a href="media.php?module=materi&mp=all" >MATERI</a></li>
        <li class="<?php if ($_GET['module'] == 'tugas') {echo "open";} ?>"><a href="media.php?module=tugas&mp=all" >TUGAS</a></li>
        <li class="<?php if ($_GET['module'] == 'anggota') {echo "open";} ?>"><a href="media.php?module=anggota" >ANGGOTA</a></li>
        
        <?php
        break;

        default:
        echo "Anda belum login";
        break;
    }
    ?>
</ul>

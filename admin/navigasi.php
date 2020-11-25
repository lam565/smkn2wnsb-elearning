<ul id="menu-top" class="nav navbar-nav navbar-right">
    <?php
    switch ($_SESSION['level']) {
        //Navigasi Guru
        case 'guru': ?>

        <li class="<?php if ($_GET['module'] == 'home') {echo "open";} ?>"><a href="media.php?module=home" class="menu-top-active">BERANDA</a></li>

        <li class="<?php if ($_GET['module'] == 'pengumuman') {echo "open";} ?>"><a href="media.php?module=pengumuman">PENGUMUMAN</a></li>
        <li class="<?php if ($_GET['module'] == 'pjj') {echo "open";} ?>"><a href="media.php?module=pjj">PJJ</a></li>
        <li>
            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">UI ELEMENTS <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="ui.html">UI ELEMENTS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">EXAMPLE LINK</a></li>
            </ul>
        </li>
        <li><a href="tab.html">TABS & PANELS</a></li>
        <li><a href="table.html">TABLES</a></li>
        <li><a href="blank.html">BLANK PAGE</a></li>

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

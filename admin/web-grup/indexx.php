<link rel="icon" href="./fav.jpg" type="image/jpg" size="50px">
<script src="./assets/js/ngomen.js"></script>

<?php
include "./inc/config-konek.php";
session_start();
$querypost = mysqli_query($connection, "SELECT*FROM post ORDER BY id_post DESC");
$query1 = mysqli_query($connection, "SELECT*FROM login ORDER BY last DESC");
if (@$_SESSION["username"]) {
$dataliatkomen = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM lihat WHERE user_lihat='$_SESSION[username]' AND apa_lihat='komentar'"));
    mysqli_query($connection, "UPDATE login SET status_user='Online' WHERE user_user='$_SESSION[username]'");
    $query2 = mysqli_query($connection, "SELECT*FROM login WHERE username='$_SESSION[username]'");
    $data2 = mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    a:focus{
        color:#2a6496;
    }
</style>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"></a>
            </div>

            <div class="header-right">
                <a href="./?p=user&user=<?php echo $data2["username"];?>#post" class="btn btn-warning" title="Postingan Kamu">
                <b>
                    <?php
                    $querypostinganuser = mysqli_query($connection, "SELECT*FROM post WHERE penulis_post='$_SESSION[username]'");
                    $cekpostinganuser = mysqli_num_rows($querypostinganuser);
                    echo $cekpostinganuser;
                    ?>
                </b>
                <i class="fa fa-pencil fa-2x"></i></a>
                <a href="./?p=komentar&post_user=<?php echo $data2["username"];?>" class="btn btn-primary" title="Notifikasi Komentar">
                <b>
                    <?php
                    $querykomentaruser = mysqli_query($connection, "SELECT*FROM komentar WHERE penulis_post='$data2[username]' AND penulis_komentar!='$_SESSION[username]'");
                    
                    $cekkomentaruser = mysqli_num_rows($querykomentaruser);
                    
                    echo $cekkomentaruser;
                    
                    ?>
                </b>
                <i class="fa fa-comment-o fa-2x"></i>
                <?php 
                if($dataliatkomen["lihat"] == 1){
                ?>
                <li class="badge" style="color:darkred;position:;">Baru</li>
                <?php
            }
            else{}
                ?>                
            </a>


                <a href="./?p=jempol&post_user=<?php echo $data2["username"];?>" class="btn btn-primary" title="Notifikasi Jempol">
                <b>
                    <?php
                    $queryjempoluser = mysqli_query($connection, "SELECT*FROM suka_post WHERE penulis_post='$data2[username]' AND user_suka!='$_SESSION[username]'");
                    $querylihatjempol = mysqli_query($connection, "SELECT*FROM lihat WHERE user_lihat = '$_SESSION[username]' AND apa_lihat='like'");
                    $datajempoluser = mysqli_fetch_array($querylihatjempol);
                    $cekjempoluser = mysqli_num_rows($queryjempoluser);
                    
                    echo $cekjempoluser;
                    
                    ?>
                </b>    
                <i class="fa fa-thumbs-up fa-2x"></i> <?php 
                if($datajempoluser["lihat"] == 1){
                ?>
                <li class="badge" style="color:darkred;position:;">Baru</li>
                <?php
            }
            else{}
                ?> </a>


                <button onclick="window.location='./login/logout.php';" class="btn btn-danger" title="Minggat"><i class="fa fa-sign-out fa-2x"></i></button>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                        
                         <a  href="./assets/img/user/user.jpg"><img src="assets/img/user/user.jpg" class="img-thumbnail"></a>
                         

                            <div class="inner-text">
                                <a style="color:white" href="./?p=user&user=<?php echo $data2["username"];?>"><?php echo $data2["username"];?></a><br>
                                <?php echo $data2["username"];?>
                            <br />
                           
                            <a href="#" class="btn btn-default btn-circle" style="width:10px;height:10px;"></a> Aktif
                           
                            <br>
                                <small>Login : <?php echo $data2["last"];?> </small>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a title="Halaman Utama" class="active-menu" href="./"><i class="fa fa-home "></i>Beranda</a>
                    </li>
                    <li>
                        <a href="#" title="Tentang Saya"><i class="fa fa fa-user "></i><?php echo $data2["username"];?> <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                         <li>
                                <a title="Profil Saya" href="./?p=user&user=<?php echo $data2["username"];?>"><i class="fa fa-smile-o"></i>Profil</a>
                            </li>
                            <li>
                                <a title="Pengaturan Akun" href="./?p=edit&profil=<?php echo $data2["username"];?>"><i class="fa fa-gears"></i>Pengaturan</a>
                            </li>
                            <li>
                            <a href="./?p=posting&profil=<?php echo $data2["username"];?>"><i class="fa fa-pencil"></i>Buat Postingan</a>
                            </li>
                            <li>
                                <a href="./?p=galeriku&by=<?php echo $data2["username"];?>" title="Foto Dari Semua Postingan Saya"><i class="fa fa-photo"></i>Galeri Saya</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="Tentang Seluruh Pengguna"><i class="fa fa fa-users "></i>Pengguna<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="./?p=daftar_pengguna" title="Pengguna Terdaftar"><i class="fa fa-list"></i>Daftar Pengguna</a>
                            </li>
                           
                        </ul>
                           <li>
                        <a href="#" title="Daftar Pengguna Online"><i class="fa fa fa-circle "></i>Online <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <?php
                                $querypenggunaonline = mysqli_query($connection, "SELECT*FROM login WHERE status_user='Online' ORDER BY last DESC");
                                while ($datapenggunaonline = mysqli_fetch_array($querypenggunaonline)) {
                                ?>
                            <li>
                                <a title="<?php echo $datapenggunaonline["username"];?> Sedang Online" href="./?p=user&user=<?php echo $datapenggunaonline["username"];?>"><i class="fa fa-user"></i><?php echo $datapenggunaonline["username"];?></a>
                            </li>
                                <?php
                                }
                                ?>
                    </li>
                        </ul>
                    </li>
                     <li>
                         <a href="./?p=galeri" title="Semua Foto Di Postingan"><i class="fa fa-photo"></i>Galeri</a>
                     </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <?php
            $user = @$_GET["user"];
            $p = @$_GET["p"];
            if ($user) {
                include 'inc/user.php';
            }
            elseif (empty($p)) {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'beranda') {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'post') {
                include 'inc/read.php';
            }
            elseif ($p == 'daftar_pengguna') {
                include 'inc/member.php';
            }
            elseif ($p == 'edit') {
                include 'inc/edit-user.php';
            }
            elseif ($p == 'komentar') {
                include "inc/komentar-kamu.php";
            }
            elseif ($p == 'posting') {
                include 'inc/newpost.php';
            }
            elseif ($p == 'galeri') {
                include 'inc/galeri.php';
            }
            elseif ($p == 'jempol') {
                include 'inc/jempol.php';
            }
            elseif ($p == 'galeriku') {
                include 'inc/galeriku.php';
            }
            
            elseif ($p == 'diskusi') {
                include 'inc/diskusi.php';
            }
            else{
                echo "<script>window.location='./error';</script>";
            }
            ?>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2016 8.5 Web Grup(q) Gefivenco <span style="float:right;">Design By : <b>Pelajar SMPN 1 Metro</b>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    a:focus{
        color:#2a6496;
    }
</style>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"></a>
            </div>

            <div class="header-right">
                <a href="login" class="btn btn-primary" title="Masuk"><i class="fa fa-sign-in fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div style="height:10px;background:#4380B8">
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="./"><i class="fa fa-home "></i>Beranda</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa fa-users "></i>Pengguna  <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="./login/"><i class="fa fa-reply"></i>Login</a>
                            </li>
                            <li>
                                <a href="./?p=daftar_pengguna"><i class="fa fa-list "></i>Daftar Pengguna</a>
                            </li>
                        </ul>
                    </li>
                           <li>
                        <a href="./?p=galeri"><i class="fa fa-photo"></i>Galeri</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <?php
            $user = @$_GET["user"];
            $p = @$_GET["p"];
            if ($user) {
                include 'inc/user.php';
            }
            elseif (empty($p)) {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'beranda') {
                include 'inc/dashboard.php';
            }
            elseif ($p == 'post') {
                include 'inc/read.php';
            }
            elseif ($p == 'daftar_pengguna') {
                include 'inc/member.php';
            }
            elseif ($p == 'edit') {
                echo "<script>window.location='./error';</script>";
            }
            elseif ($p == 'galeri') {
                include 'inc/galeri.php';
            }
            elseif ($p == 'reg') {
                include 'assets/img/user/reg.php';
            }
            elseif ($p == 'galeriku') {
                include 'inc/galeriku.php';
            }
            else{
                echo "<script>window.location='./error';</script>";
            }
            ?>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
       
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php
}
?>
<!-- CSS -->
<script src="./assets/js/ngomen.js"></script>
<style type="text/css">
.well:hover {
    box-shadow: 0px 2px 10px rgb(190, 190, 190) !important;
}
a {
    color: #666;
}
</style>

<!-- CSS/ -->

<?php
include "config.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>

<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM semester WHERE kd_semester='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE semester SET semester='$_POST[semester]' WHERE kd_semester='$_GET[key]'";
	} else {
		$sql = "INSERT INTO semester VALUES ('$_POST[kd_semester]', '$_POST[semester]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=semester'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=semester'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM semester WHERE kd_semester='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=semester'</script>";
}
?>

<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD SISWA</h4>
                
                            </div>

        </div>
	   <div class="row">
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
			 
 </div>
             
             </div>       

        <?php } ?>
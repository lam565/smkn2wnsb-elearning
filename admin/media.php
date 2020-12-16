<?php
session_start();
//error_reporting(1);
include "../system/timeout.php";
include "../system/koneksi.php";

if($_SESSION['login']==1){
  if(!cek_login()){
    $_SESSION['login'] = 0;
}
}
if($_SESSION['login']==0){
  header('location:../logout.php');
} else {
    if (empty($_SESSION['username']) AND empty($_SESSION['level']) AND $_SESSION['login']==0) {
      echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
  } else{ 
    $qtj="SELECT * FROM tahun_ajar WHERE aktif='Y'";
    $tj=mysqli_fetch_array(mysqli_query($connect,$qtj));
    $kd_tajar=$tj['kd_tajar'];
    $namatajar=$tj['tahun_ajar']." Semester ".$tj['kd_semester'];
    ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>E-Learning SMKN 2 WONOSOBO</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<link href="assets2/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets2/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets2/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="assets2/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets2/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="assets2/css/icheck/flat/green.css" rel="stylesheet">
    <link href="assets2/css/floatexamples.css" rel="stylesheet" />

    <script src="assets2/js/jquery.min.js"></script>
</head>
<body>
 <div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">

                    <img src="assets/img/new_logo.png" width="150" height="110"/>
					<h5 style="color:red;"><b>SMKN 2 WONOSOBO</b></h5>
					
                </a>

        </div>

        <div class="right-div">
            <a href="../logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
        </div>
    </div><br><br>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <?php 
                    include "navigasi.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MENU SECTION END-->

<div class="content-wrapper">
 <div class="container">
 <div class="col-md-12">
    <?php include 'content.php'; ?>
	</div>
</div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             &copy; 2020 by SMK N 2 Wonosobo |<a href="" target="_blank"  > Tahun Ajaran : <?php echo $namatajar ?></a> 
         </div>
     </div>
 </div>
</section>
<!-- FOOTER SECTION END-->
<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY  -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/js/bootstrap-3.3.5.js"></script>
<script type="text/javascript" src="assets/js/malsup-media.js"></script>



        });

        $(document).on('change', '#cbbmapelajar', function(){
            var mapel = $(this).val();
            $('#cbbjurusan').attr('data-mapel',mapel)
        });

        $(document).on('change', '#cbbjurusan', function(){
            var jurusan = $(this).val();
            var kd_mapel = $(this).attr('data-mapel');
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: {
                    act: 'kelasajar',
                    mp: kd_mapel,
                    jrs: jurusan
                },
                success: function (data){
                    $('#kelasajar').html(data);
                }
            });

        });
        
        $(document).on('change', '#cbmapel', function(){
            var mapel = $(this).val();
            var kd_guru = $(this).attr('data-guru');
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: {
                    act: 'kelasmapel',
                    mp: mapel,
                    kdg: kd_guru
                },
                success: function (data){
                    $('#infokls').html(data);
                }
            });
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: {
                    act: 'soalmapel',
                    mp: mapel,
                    kdg: kd_guru
                },
                success: function (data){
                    $('#daftsoal').html(data);
                }
            });

</body>
</html>
<?php }} ?>
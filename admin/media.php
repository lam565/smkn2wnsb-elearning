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
  } else{ ?>

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
                <a class="navbar-brand" href="?module=home">
                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="right-div">
                <a href="../logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
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
        <?php include 'content.php'; ?>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             &copy; 2020 by SMK N 2 Wonosobo |<a href="" target="_blank"  > Designed by : - </a> 
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>
<script type="text/javascript">
    $(function () {
        $(document).on('click', '.pmateri', function (e) {
            e.preventDefault();
            $("#previewmateri").modal('show');
            $(".modal-title").html($(this).attr('data-judul'));
            $.post('modul/mod_materi/dokumen.php',
                {id: $(this).attr('data-id')},
                function (html) {
                    $(".modal-body").html(html);
                }
                );
        });
    });
</script>

</body>
</html>
<?php }} ?>
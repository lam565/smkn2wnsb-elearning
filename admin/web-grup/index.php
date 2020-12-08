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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>E-Learning SMKN 2 WONOSOBO</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<script src="./assets/js/ngomen.js"></script>

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

                    <img src="../assets/img/new_logo.png" width="150" height="110"/>
					SMKN 2 WONOSOBO
					
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
                        include "../navigasi.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
       <div class="container">
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
<!-- CONTENT-WRAPPER SECTION END-->

<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               &copy; 2020 by SMK N 2 Wonosobo |<a href="" target="_blank"  > Tahun Ajaran : </a> 
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
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.pmateri', function (e) {
            e.preventDefault();
            $("#previewmateri").modal('show');
            $(".modal-title").html($(this).attr('data-judul'));
            $.post('modul/mod_materi_siswa/dokumen.php',
                {id: $(this).attr('data-id')},
                function (html) {
                    $(".modal-body").html(html);
                }
                );
        });

        $(document).on('change', '#cbbmapel', function(){
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

        });

        $(document).on('change', '#cbbForL', function(){
            var pil = $(this).val();
            $output="";
            if (pil=='file') {
                $output = "<label>Upload File Materi</label><input class='form-control' type='file' name='filemateri' id='fileupload' />";
            } else if (pil=='link') {
                $output = "<label>Upload Link Materi</label><input class='form-control' type='text' name='linkmateri' id='fileupload' />";
            }
            $("#ForL").html($output);
        });

        $("#fileupload").change(function () {
            var fileExtension = ['pdf','jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $(this).val('');
                $(".warningnya").html("Ekstensi file harus: "+fileExtension.join(', '));
            } else {
                $(".warningnya").html("");
            }
        });
        
    });
</script>

</body>
</html>
<?php
}
?>
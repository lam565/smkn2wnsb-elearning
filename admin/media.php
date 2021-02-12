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

        </div><br>
		
	
        <div class="right-div">
		<?php
		if($_SESSION['level']=='guru'){
		?>
            <a href="../logout.php" onclick = "return confirm('Pastikan Anda Sudah Mengisi Jurnal Harian!! ');" class="btn btn-danger pull-right">LOG ME OUT</a>
        <?php
		} else {
		?>
		 <a href="../logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
       <?php
		}
		?>
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
    <?php include 'content.php'; ?>
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

        $(document).on('change', '#cbbketergantungan', function(){
            var pil = $(this).val();
            var kd_soal = $(this).attr('data-soal');
            var kd_det_soal = $(this).attr('data-detail');
            if (pil=="Child"){
                $.ajax({
                    url: 'modul/mod_banksoal/getchild.php',
                    type: 'post',
                    data: {
                        kds : kd_soal,
                        kdd : kd_det_soal
                    },
                    success: function (data){
                        $('#child').html(data);
                    }
                });
            } else {
                $('#child').html("");
            }

        });
        $(document).on('change', '#jfile', function(){
            var jfile = $(this).val();
            var i;
            var inputfile = "";
            for (i=1;i<=jfile;i++){
                inputfile = inputfile + "<input class='form-control' type='FILE' name='ftugas"+i+"'  required='required'><br>";
            }
            $('#hjfile').val(jfile);
            $('#Uploadj').html(inputfile);
            
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

        $(document).on('change', '#cbbmapelajar', function(){
            var mapel = $(this).val();
            $('#cbbjurusan').attr('data-mapel',mapel)
        });

        $(document).on('change', '#cbbkls', function(){
            var kd_kelas = $(this).val();
            var lokasi = "?module=rombel&kls="+kd_kelas;

            $(location).attr('href', lokasi);
        });

        $(document).on('change', '#cbbmapelsil', function(){
            var mapel = $(this).val();
            var kd_guru = $(this).attr('data-guru');
            
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: {
                    act: 'tingkatjurusan',
                    mp: mapel,
                    gru: kd_guru
                },
                success: function (data){
                    $('#tingkatjurusan').html(data);
                }
            });
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
            var fileExtension = ['pdf','jpeg', 'jpg', 'png', 'ppt', 'docx', 'xlsx' ,'pptx', 'mp4', 'rar'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $(this).val('');
                $(".warningnya").html("Ekstensi file harus: "+fileExtension.join(', '));
            } else {
                $(".warningnya").html("");
            }
        });

        $("#filemateri").change(function () {
            var fileExtension = ['pdf','jpeg', 'jpg', 'png', 'ppt', 'docx', 'xlsx' ,'pptx', 'mp4', 'rar'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                $(this).val('');
                $(".warningnya").html("Ekstensi file harus: "+fileExtension.join(', '));
            } else {
                if ( this.files[0].size/1024/1024 > 50 ){
                    $(this).val('');
                    $(".warningnya").html("Ukuran maksimum hanya 30MB");
                } else {
                    $(".warningnya").html("");
                }
                
            }
        });

        $(document).on('click','#openmodal',function(){
            var id = $(this).attr('data-kds');
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: {
                    act: 'mdlslb',
                    kd: id
                },
                success: function (data){
                    $('#modalsilabus').html(data);
                }
            });
            $('#modalupdsilabus').modal({show:true});
        });
        
    });
</script>

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
function validateForm()
{
    function hasExtension(inputID, exts) {
        var fileName = document.getElementById(inputID).value;
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }
    if(!hasExtension('filesoal', ['.xls'])){
        alert("Hanya file XLS yang diijinkan.");
        return false;
    }
}
function validatetugas()
{
    function hasExtension(inputID, exts) {
        var fileName = document.getElementById(inputID).value;
        return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    }
    if(!hasExtension('filesoal', ['.xls'])){
        alert("Hanya file XLS yang diijinkan.");
        return false;
    }
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
/** Membuat Waktu Mulai Hitung Mundur Dengan 
* var detik = 0,
* var menit = 1,
* var jam = 1
*/
var detik = document.getElementById("detik").value;
var menit = document.getElementById("menit").value;
var jam   = document.getElementById("jam").value;

/**
* Membuat function hitung() sebagai Penghitungan Waktu
*/
function hitung() {
/** setTimout(hitung, 1000) digunakan untuk 
* mengulang atau merefresh halaman selama 1000 (1 detik) 
*/
setTimeout(hitung,1000);

/** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
if(menit < 10 && jam == 0){
    var peringatan = 'style="color:red"';
};

/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
$('#timer').html(
    '<h3 align="center"'+peringatan+'>' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h3>'
    );

/** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
detik --;

/** Jika var detik < 0
* var detik akan dikembalikan ke 59
* Menit akan Berkurang 1
*/
if(detik < 0) {
    detik = 59;
    menit --;

/** Jika menit < 0
* Maka menit akan dikembali ke 59
* Jam akan Berkurang 1
*/
if(menit < 0) {
    menit = 59;
    jam --;

/** Jika var jam < 0
* clearInterval() Memberhentikan Interval dan submit secara otomatis
*/
if(jam < 0) {                                                                 
    clearInterval(); 
    var frmSoal = document.getElementById("flembarujian");
    frmSoal.submit();                           
} 
} 
} 
}           
/** Menjalankan Function Hitung Waktu Mundur */
hitung();
}); 
// ]]>
</script>
<!-- CORE JQUERY  -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- DATATABLE SCRIPTS  -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php }} ?>
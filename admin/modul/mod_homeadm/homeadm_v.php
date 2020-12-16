<!-- CSS -->

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


if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>



	   <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>               
            </div>

        </div>
             
             <div class="row">
            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <img src="assets/img/siswa.png" width="100" height="100"/>
                          
                          <a href="media.php?module=siswa"> Data Siswa</a>
                        </div>
                    </div>
              <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                             <img src="assets/img/kelas.png" width="100" height="100"/>
                           
                            <a href="media.php?module=kelas">Data Kelas</a>
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                             <img src="assets/img/jurusan.jpeg" width="100" height="100"/>
                            
                           <a href="media.php?module=akun">Data Jurusan</a>
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <img src="assets/img/guru.png" width="100" height="100"/>
                            
                            <a href="media.php?module=guru">Data Guru</a>
                        </div>
                    </div>

        </div>              
             <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                   <img src="assets/img/sklh.jpeg" width="1140" height="500"/>
              </div>
                 
                 
             
                 </div>
            

            

    </div>
    </div>
       

        <?php } ?>
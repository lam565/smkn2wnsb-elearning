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
                            
                             <a href="media.php?module=siswa"> Data Kelas</a>
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                             <img src="assets/img/jurusan.jpeg" width="100" height="100"/>
                           
                            <a href="media.php?module=siswa"> Data Jurusan</a>
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <img src="assets/img/guru.png" width="100" height="100"/>
                            
                             <a href="media.php?module=siswa"> Data Guru</a>
                        </div>
                    </div>

        </div>              
             <div class="row">

              <div class="col-md-8 col-sm-8 col-xs-12">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="assets/img/1.jpg" alt="" />
                           
                        </div>
                        <div class="item">
                            <img src="assets/img/2.jpg" alt="" />
                          
                        </div>
                        <div class="item">
                            <img src="assets/img/3.jpg" alt="" />
                           
                        </div>
                    </div>
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
              </div>
                 
                 <div class="col-md-4 col-sm-4 col-xs-12">
                 <div class="panel panel-primary ">
                        <div class="panel-heading">
                            Pengumuman
                        </div>
                        <div class="panel-body chat-widget-main">
                            <div class="chat-widget-left">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor.
                            </div>
                            <div class="chat-widget-name-left">
                                <img class="media-object img-circle img-left-chat" src="assets/img/user2.png" />
                                <h4>  Amanna Seiar</h4>
                                <h5>Time 2:00 pm at 25th july</h5>
                            </div>
                            <hr />
                            <div class="chat-widget-right">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet.
                            </div>
                            <div class="chat-widget-name-right">
                                 <img class="media-object img-circle img-right-chat" src="assets/img/user2.png" />
                                <h4>  Amanna Seiar</h4>
                                <h5>Time 2:00 pm at 25th july</h5>
                            </div>
                            <hr />
                            <div class="chat-widget-left">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet.
                            </div>
                            <div class="chat-widget-name-left">
                                 <img class="media-object img-circle img-left-chat" src="assets/img/user2.png" />
                                <h4>  Amanna Seiar</h4>
                                <h5>Time 2:00 pm at 25th july</h5>
                            </div>
                            <hr />
                            <div class="chat-widget-right">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                           Lorem ipsum dolor sit amet.
                            </div>
                            <div class="chat-widget-name-right">
                               <img class="media-object img-circle img-right-chat" src="assets/img/user2.png" />
                                <h4>  Amanna Seiar</h4>
                                <h5>Time 2:00 pm at 25th july</h5>
                            </div>
                            <hr />
                        </div>

                    </div>
             </div>
             
                 </div>
            

            

    </div>
    </div>
       

        <?php } ?>
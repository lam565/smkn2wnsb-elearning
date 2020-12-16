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
include "config.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>



<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
			 <?php
	$sql1 = $connection->query("SELECT * FROM guru
	WHERE username='$_SESSION[username]'");
	$row1 = $sql1->fetch_assoc();
	?>
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD <?=$row1['nama']?></h4>
                
                            </div>

        </div>
	   <div class="row">
	  
	<?php
	$sql = $connection->query("SELECT * FROM guru,pengajaran,mapel 
	WHERE guru.kd_guru=pengajaran.kd_guru and mapel.kd_mapel=pengajaran.kd_mapel
	and guru.kd_guru='$row1[kd_guru]'");
	while($row = $sql->fetch_assoc()):

?>
                  <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <img src="assets/img/frm.png" width="200" height="120"/>
							 
                            <h3><a href="web-grup/?p=beranda&id_det_kurikulum=<?=$row['kd_pengajaran']?>"><?=$row['nama_mapel']?><br><?=$row['kd_kelas']?></a></h3>
                          
                        </div>
                    </div>
	<?php endwhile ?>
					
             
             </div>
			  
 </div>
             
             </div>       

        <?php } ?>
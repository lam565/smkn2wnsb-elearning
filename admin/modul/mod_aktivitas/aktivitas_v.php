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
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">
            
                <?php 
				$tg=date('Y-m-d');
				$query = $connection->query("
				SELECT * FROM jurnal,kelas,guru,mapel,pengajaran 
				where jurnal.kd_guru=guru.kd_guru 
				and jurnal.kd_mapel=mapel.kd_mapel
				and pengajaran.kd_guru=guru.kd_guru
				and pengajaran.kd_kelas=kelas.kd_kelas
				and jurnal.tanggal='$tg'				
				order by id_jurnal DESC"); ?>
	            <?php while($row = $query->fetch_assoc()): ?>
							
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-briefcase fa-5x"></i><br>
Jam Ke : <?=$row['jam_ke']?> (<?=$row['tanggal']?>) <br>
                            Kelas : <?=$row['nama_kelas']?> <br>
							Mata Pelajaran : <?=$row['nama_mapel']?> <br>
							Siswa Hadir : <?=$row['jml_siswa']?> <br>
                            Pengampu : <?=$row['nama']?>
                        </div>
                    </div>
				<?php endwhile ?>

        </div>              
          


            </div>

    </div>
    </div>

<?php } ?>
<?php
if ($_SESSION["username"]) {
    
?>
<title><?php echo $data2["username"];?> | </title>
<?php
}
else{
    ?>
<title>Beranda</title>

    <?php
}
?>


           
			<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
								<div class="filter">
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div id="page-inner">
                <?php
$idpost = @$_GET["id"];
$querypost = mysqli_query($connection, "SELECT*FROM post WHERE id_post='$idpost' AND penulis_post='$_GET[post_by]'");
$datapost = mysqli_fetch_array($querypost);
$cekapakahpostinganiniadaatautidak = mysqli_num_rows($querypost);
if (empty($cekapakahpostinganiniadaatautidak)) {
    echo "<div class='alert alert-danger'><h4>Postingan Ini Tidak Ada.</h4>Mungkin Sudah Di Hapus Atau Di Perbarui. <a href='./?p=beranda'>Kembali Ke Halaman Utama</a></div>";
}
else{
?>
<title><?php echo $datapost["judul_post"];?> | Post </title>
<div id="page-inner">
<div class="alert alert-info">
    <h2><?php echo $datapost["judul_post"];?></h2>
	
	<?php
								$sq = mysqli_query($connection, "SELECT*FROM login 
								where username='$_SESSION[username]'");           
								$dq = mysqli_fetch_array($sq);
						?>
						<?php
                        if ($dq["level"]=='siswa') {
                        ?>
						<?php
								$sx = mysqli_query($connection, "SELECT*FROM siswa 
								where username='$dq[username]'");           
								$dx = mysqli_fetch_array($sx);
						?>
    <a>Penulis : @<?php echo $dx["nama"];?> | Pada : <u><?php echo $datapost["tanggal_post"];?></u> <span style="float:right;"><i class="fa fa-thumbs-up"></i> : <?php echo $datapost["suka_post"];?></a> 
	<?php
                        }
                        else{
                            ?>
							<?php
								$sm = mysqli_query($connection, "SELECT*FROM guru 
								where username='$dq[username]'");           
								$dm = mysqli_fetch_array($sm);
						?>
						<a>Penulis : @<?php echo $dm["nama"];?> | Pada : <u><?php echo $datapost["tanggal_post"];?></u> <span style="float:right;"><i class="fa fa-thumbs-up"></i> : <?php echo $datapost["suka_post"];?> </a>
	 <?php
                        }
                        ?>
	
	
    <?php
    $datasukapost = @mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$idpost' AND user_suka='$_SESSION[username]'"));
    if (empty($_SESSION["username"])) {
    }
    elseif ($datasukapost["post_suka"] == 1) {
        ?>
    <a style="color:darkred;" href="#" onclick="window.location='./inc/unlike.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">Tarik Jempol</a>

        <?php
    }
    else{
    ?>
    <a href="#" onclick="window.location='./inc/like.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">Kasih Jempol</a>
<?php
}
?>
    </span> 
</div>
<div>
<?php
if (@$datapost["gambar_post"]) {
?>
    <a href="./assets/img/post/<?php echo $datapost["gambar_post"];?>"><img src="assets/img/post/<?php echo $datapost["gambar_post"];?>" class="img-thumbnail" style="margin-bottom:10px;"></a>
    </div>

<div>
    <p style="font-size:20px;"><?php echo $datapost["isi_post"];?></p>
</div>
<?php
}
else{
?>
</div>

<div style="margin-bottom:100px;">
    <p style="font-size:20px;"><?php echo $datapost["isi_post"];?></p>
</div>
<?php
}


if (@$_SESSION["username"]) {

?>
        <form method="post" action="./inc/ngomen.php?p=<?php echo $datapost["id_post"];?>&a=<?php echo $datapost["penulis_post"];?>" id="komentar" style="margin-top:35px;">
            <input type="text" placeholder="komentari postingan ini..." name="komentari" style="height:34px;width:100%;">
        </form>
<?php
}
else{
    ?>
    <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datapost["id_post"];?>&post_by=<?php echo $datapost["penulis_post"];?>"><i class="fa fa-sign-in"></i> Masuk Untuk Ngomen!</a>
    <?php
}
?>
    <div class="alert alert-warning" style="margin-top:35px;">
        <b>
        <?php
    $batas  = 15;

if (isset($_GET["hal"])) {
    $hal = $_GET["hal"];
    $posisi = ($hal-1)*$batas;
}
else{
    $hal = 1;
    $posisi = 0;
}
        $querykomentar = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$idpost' ORDER BY id_komentar ASC LIMIT $posisi, $batas");
        $querykomentar2 = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$idpost'");
        $totalkomentar = mysqli_num_rows($querykomentar2);
        echo $totalkomentar;
        ?>
        </b>
         Komentar Pada Postingan : <b>"<?php echo $datapost["judul_post"];?>" :</b>
    </div>
    <?php
    if ($totalkomentar > 0) {
        echo "Urutan Komentar : ";
    }
$totalkomentar2 = mysqli_num_rows($querykomentar2);
$bagi = ceil($totalkomentar2/$batas);
for ($i=1; $i <= $bagi ; $i++) { 
                    if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?p=post&id=$idpost&post_by=$datapost[penulis_post]&hal=$i#komentar'><span class='badge'>$i</span></a> ";
                                }
                }
    ?>
    <div class="alert alert-warning">
    <?php

if ($totalkomentar >= 0) {

    while ($datakomentar = mysqli_fetch_array($querykomentar)) {
    ?>
        <small id="komentar_<?php echo $datakomentar["id_komentar"];?>"><?php echo $datakomentar["tanggal_komentar"];?></small><br>
        <b>
        <a>
        
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
       <?php
        
        $dataygngomen = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM login WHERE username = '$datakomentar[penulis_komentar]'"));
        ?>
		
						<?php
                        if ($dq["level"]=='siswa') {
                        ?>
						<?php
								$sx = mysqli_query($connection, "SELECT*FROM siswa 
								where username='$dataygngomen[username]'");           
								$dx = mysqli_fetch_array($sx);
						?>
        <?php echo $dx["nama"];?></a> :</b> <?php echo $datakomentar["isi_komentar"];?>
		
		<?php
                        }
                        else{
                            ?>
							<?php
								$sm = mysqli_query($connection, "SELECT*FROM guru 
								where username='$dataygngomen[username]'");           
								$dm = mysqli_fetch_array($sm);
						?>
		<?php echo $dm["nama"];?></a> :</b> <?php echo $datakomentar["isi_komentar"];?>
			<?php
                        }
                        ?>
<style>
.abc{
    color: grey;
    text-decoration: none;
    transition: color 0.2s;
}
.abc:hover{
    color:darkgrey;
    text-decoration: none;
}
</style>
        <?php
        if (@$_SESSION["username"] == @$datapost["penulis_post"]) {
            ?><a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Ini Dari Postingan Kamu?')">X</a><?php
        }
        elseif(@$datakomentar["penulis_komentar"] == @$data2["user_user"]){
            ?><a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Kamu?')">X</a><?php
        }
        ?>        
        
        <hr>
    <?php
    }
}
else{
    echo "<div class='alert alert-danger'>Tidak Ada Komentar</div>";
}

    ?>
    </div>
</div>
           
            <?php
}
            ?>

                </div>
                                       

                                    </div>

                                   <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div>
                                            <div class="x_title">
                                                <h2>Anggota</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <ul class="">
                                              <?php
												$sx = mysqli_query($connection, "SELECT*FROM siswa,kelas,pengajaran,rombel 
												where pengajaran.kd_kelas=kelas.kd_kelas
												and siswa.nis=rombel.nis
												and rombel.kd_kelas=kelas.kd_kelas and
												pengajaran.kd_pengajaran='$_GET[id_det_kurikulum]'");           
												while($dx = mysqli_fetch_array($sx)){
											?>
                                                <li class="media event">
                                                    <a class="pull-left border-green profile_thumb">
                                                        <i class="fa fa-user green"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <p><?php echo $dx["nama"];?></p>
                                                        <p>NIS:<?php echo $dx["nis"];?></p>
                                                       
                                                        </p>
                                                    </div>
                                                </li>
												<?php
												}
												?>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
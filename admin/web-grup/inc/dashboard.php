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
								<?php
								$s = mysqli_query($connection, "SELECT*FROM pengajaran where kd_pengajaran='$_GET[id_det_kurikulum]'");           
								$d = mysqli_fetch_array($s);
								?>
                                    <h2>Forum Kelas: <?php echo $d["kd_kelas"];?> | Mata Pelajaran:<?php echo $d["kd_mapel"];?></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        
                        <h3 class="page-subhead-line"><li class="fa fa-folder"></li> Halo! 
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $d = time();
                        $date = date("G", $d);
                        if ($date >= 0 && $date <= 10) {
                            echo "Selamat Pagi";
                        }
                        elseif ($date >= 11 && $date <= 14) {
                            echo "Selamat Siang";
                        }
                        elseif ($date >= 15 && $date <= 17) {
                            echo "Selamat Sore";
                        }
                        elseif ($date >= 18 && $date <= 23) {
                            echo "Selamat Malam";
                        }
                        ?>

                        <?php
                        if (@$_SESSION["username"]) {
                        ?>
                        <b><?php echo $data2["username"];?> (<?php echo $data2["username"];?>)</b>! <a href="./?p=posting&profil=<?php echo $data2["username"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>"><li class="fa fa-pencil"></li> Buat Postingan</a> Di Forum Kelas
                        <?php
                        }
                        else{
                            ?>
                            <b><?php echo $data2["username"];?></b>!
                            <?php
                        }
                        ?>
                        </h3>

                       
                    </div>
                </div>
<?php
                    if (@$_POST["komenin"]) {
                    $komentarbla = mysqli_real_escape_string($db, $_POST["ngomen"]);
                    date_default_timezone_set("Asia/Jakarta");
                    $tglkmn = date("G:i d/m/Y");
                    $berhasil = mysqli_query($db, "INSERT INTO komentar VALUES ('','$_SESSION[user]','$komentarbla','$tglkmn','$datasqlpost[id_post]','$data2[pp_user]','$datasqlpost[penulis_post]','1')");
                    if ($berhasil) {
                        # code...
                    echo "<script>window.location='./?p=beranda#post$datasqlpost[id_post]';</script>";
                    echo "<script>autoload();</script>";
                    }
                    }
                    ?>
					
                <?php
				
                $sqlpost = mysqli_query($connection, "SELECT*FROM post,pengajaran where post.kd_pengajaran=pengajaran.kd_pengajaran and post.kd_pengajaran='$_GET[id_det_kurikulum]' ORDER BY post.id_post DESC");
                
				while ($datasqlpost = mysqli_fetch_array($sqlpost)) {
                    $datauserpost = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM login WHERE username='$datasqlpost[penulis_post]'"));
                ?>
                <div class="alert alert-info" id="post<?php echo $datasqlpost["id_post"];?>">
                <span style="float:right;"><?php echo $datasqlpost["tanggal_post"];?></span>
                <a href="./?p=post&id=<?php echo $datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>"><h2><b><?php echo $datasqlpost["judul_post"];?></b></h2></a>
                
                <a ><img src="./assets/img/user/user.jpg" style="width:40px;height:40px;border-radius:100%;"> <b><?php echo $datauserpost["username"];?></b></a>
                
                <span style="float:right"><i class="fa fa-comment"></i> : <?php $totalkomentarpost = mysqli_num_rows(mysqli_query($connection,"SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'")); echo $totalkomentarpost;?></span>
                <hr>
 
                    <?php
                    if ($datasqlpost["gambar_post"] !== '') {
                    ?>
                    <center><a href="./assets/img/post/<?php echo $datasqlpost["gambar_post"];?>"><i class="fa fa-paperclip"></i> <?php echo $datasqlpost["gambar_post"];?></a></center>
                    <?php
                    }
                    else{

                    }
                    echo $datasqlpost["isi_post"];
                    ?><hr>

                <?php
                $sqllike = mysqli_query($connection, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]'");
                $siapayglike = mysqli_fetch_array($sqllike);
                
                ?>
                <i class="fa fa-thumbs-up"></i> : <?php echo $datasqlpost["suka_post"];?>
                <br><br>
                    <?php
                    $komentarnya = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]' ORDER BY id_komentar ASC LIMIT 3");
                    
                    while ($datakomentarnya = mysqli_fetch_array($komentarnya)) {
                    $ygomen = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM login WHERE username = '$datakomentarnya[penulis_komentar]'"));
                    ?>
                    <img src="./assets/img/user/user.jpg" style="width:20px;height:20px;border-radius:100%"><b><a><?php echo $ygomen["username"];?></a></b> : <?php echo $datakomentarnya["isi_komentar"];?><font style="float:right;"></font><br>
                    
                    <?php
                    
                }
                $lala = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'");
                    if (mysqli_num_rows($lala) >= 4) {
                    	$totalngomeng = mysqli_num_rows(mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'"));
                    	$dikurang = $totalngomeng - 3;
                    echo "<a href='./?p=post&id=$datasqlpost[id_post]&post_by=$datasqlpost[penulis_post]'>Lihat ($dikurang) Komentar Lagi...</a><br>";
                    }
                    if (@$_SESSION["username"]) {
                    ?>
                    <span>
                    <br>
                    <?php
                    $datasukapost = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]' AND user_suka='$_SESSION[username]'"));
                    if ($datasukapost["post_suka"] == 1) {
        ?>
					<?php
					$sql3 = $connection->query("SELECT * FROM post
					WHERE kd_pengajaran='$_GET[id_det_kurikulum]'");
					$row3 = $sql3->fetch_assoc();
					?>
					<?php
					if($row3['laporkan']=='1'){ 
					?>
					<button class="btn btn-danger"  disabled="disabled" onclick="window.location='./inc/unlike.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>';"><i class="fa fa-thumbs-o-up"></i>Dislike</button>
                    <?php
					}
					else{
					?>
					<button class="btn btn-danger"  onclick="window.location='./inc/unlike.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>';"><i class="fa fa-thumbs-o-up"></i>Dislike</button>
					<?php
					}
					?>
        <?php
    }
    else{
    ?>
	<?php
					$sql5 = $connection->query("SELECT * FROM post
					WHERE kd_pengajaran='$_GET[id_det_kurikulum]'");
					$row5 = $sql5->fetch_assoc();
					?>
	<?php
					if($row5['laporkan']=='1'){ 
					?>
					<button class="btn btn-danger" disabled="disabled" onclick="window.location='./inc/like.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>';"><i class="fa fa-thumbs-o-up"></i>Like</button>
                    <?php
					}
					else{
					?>
					<button class="btn btn-primary" onclick="window.location='./inc/like.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>';"><i class="fa fa-thumbs-o-up"></i>Like</button>
					<?php
					}
					?>
					
     
<?php
}
?>
                                    <script>
                $(document).ready(function(){
                    $(".btn<?php echo $datasqlpost["id_post"];?>").click(function(){
                        $("blabla<?php echo $datasqlpost["id_post"];?>").show();
                    });
                });
                </script>
				
					<?php
					$sql1 = $connection->query("SELECT * FROM post
					WHERE kd_pengajaran='$_GET[id_det_kurikulum]'");
					$row1 = $sql1->fetch_assoc();
					?>
					<?php
					if($row1['laporkan']=='1'){ 
					?>
					<button disabled="disabled" class="btn btn-danger btn<?php echo $datasqlpost["id_post"];?>"><i class="fa fa-comment-o"></i> Komentar ini dinonaktifkan</button></span><br><br>
					<?php
					}
					else{
					?>
					<button class="btn btn-info btn<?php echo $datasqlpost["id_post"];?>"><i class="fa fa-comment-o"></i> Komentar</button></span><br><br>					
					<?php
					}
					?>
                    <blabla<?php echo $datasqlpost["id_post"];?> hidden>
                    <form method="post" action="./inc/ngomen.php?p=<?php echo $datasqlpost["id_post"];?>&a=<?php echo $datasqlpost["penulis_post"];?>">
                    
                    <input autofocus required style="border:none;width:100%" name="komentari" placeholder="masukan komentar..." type="text"> <input hidden type="submit">
                    </form>

                    </blabla>
                    
                    <?php
                    }
                    else{
                    ?>
                    <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>&id_det_kurikulum=<?php echo $_GET["id_det_kurikulum"];?>"><i class="fa fa-sign-in"></i> Masuk Untuk Ngomen Atau Ngasih Jempol</a>
                    <?php
                    }
                    ?>
                    
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
                                            <ul class="list-unstyled top_profiles scroll-view">
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
                                                        <a class="title" href="#"><?php echo $dx["nama"];?></a>
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
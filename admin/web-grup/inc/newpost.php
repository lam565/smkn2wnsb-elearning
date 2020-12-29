<?php
    $useruser = @$_GET["profil"];
    $userquery = mysqli_query($connection, "SELECT*FROM login WHERE username='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["username"];?> | Tambah Postingan </title>
<?php
$cekpengguna = mysqli_num_rows($userquery);
if (@$_SESSION["username"] == $useruser) {
?>


           
			<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
								<?php
								$s = mysqli_query($connection, "SELECT*FROM pengajaran,kelas,mapel 
								where pengajaran.kd_kelas=kelas.kd_kelas 
								and pengajaran.kd_mapel=mapel.kd_mapel 
								and pengajaran.kd_pengajaran='$_GET[id_det_kurikulum]'");           
								$d = mysqli_fetch_array($s);
								?>
                                    <h2>Forum Kelas: <?php echo $d["nama_kelas"];?> | Mata Pelajaran:<?php echo $d["nama_mapel"];?></h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div id="page-inner">
                 <form method="post" action="" enctype="multipart/form-data">
            <?php
            if (@$_POST["submit"]) {
            date_default_timezone_set("Asia/Jakarta");
                $dt = date("Ymd_Gis");
            $gambar = @$_FILES["gambar"]["tmp_name"];
            $alamat_gambar = @$_FILES["gambar"]["name"];
            $folder = "assets/img/post/";
            $foldermin = "assets/img/post-admin-herp-id/";

            $pindah = move_uploaded_file($gambar, $folder.$dt.$alamat_gambar);

            $judul = mysqli_real_escape_string($connection, $_POST["judul"]);
            $isi = mysqli_real_escape_string($connection, $_POST["isi"]);

            $date = date("G:i d/m/Y");

            if ($pindah) {
                mysqli_query($connection, "INSERT INTO post VALUES('','$_GET[id_det_kurikulum]','$judul','$isi','$useruser','$date','$dt$alamat_gambar','0','0','')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=beranda&id_det_kurikulum=$_GET[id_det_kurikulum]'>Lihat Semua Postingan Kamu</a></div>";
            }
            else{
                mysqli_query($connection, "INSERT INTO post VALUES('','$_GET[id_det_kurikulum]','$judul','$isi','$useruser','$date','','0','0','')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=beranda&id_det_kurikulum=$_GET[id_det_kurikulum]'>Lihat Semua Postingan Kamu</a></div>";
            }
            }
            ?>
            <div>
                <input type="file" name="gambar">
                <label>Tambah Gambar/File (*Tidak Wajib)</label>
            </div><hr>
            <div style="margin-top:20px;">
                <input title="Masukan Judul Postingan" required type="text" name="judul" placeholder="Masukan Judul..." style="border:none;height:50px;width:100%;font-size:20px;">
                <hr>
                <div style="margin-top:20px;">
                    <textarea class="form-control"  name="isi" id="text-editor" rows="8"></textarea>
					<script>CKEDITOR.replace('text-editor');</script>
				</div><br>
                <div><input type="submit" name="submit" value="Posting" class="btn btn-primary" style="width:100%;"></div>
            </form>

                </div>
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
					<?php
}
else{
?>
<script>window.location='.?p=beranda&id_det_kurikulum=<?php echo $_GET['id_det_kurikulum'];?>';</script>
            <?php
}
            ?>
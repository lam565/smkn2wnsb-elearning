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
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>
                
                            </div>

        </div>
	   <div class="row">
              <div class="right_col" role="main">

								<!-- top tiles -->
								<div class="row tile_count">
									<div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
										<div class="left"></div>
										<div class="right">
											<span class="count_top"><i class="fa fa-user"></i> JUMLAH SISWA</span>
											<?php
											$q=mysqli_query($connection,"SELECT count(nis) AS jumlah FROM siswa");
											$dt=mysqli_fetch_array($q);
											$jdt=$dt['jumlah'];
											?>
											<div class="count"><?php echo $dt['jumlah']; ?></div>
											<span class="count_bottom"><i class="green"></i> Orang</span>
										</div>
									</div>
									<div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
										<div class="left"></div>
										<div class="right">
											<span class="count_top"> JUMLAH LAKI - LAKI</span>
											<?php
											$q=mysqli_query($connection,"SELECT count(nis) AS jumlah FROM siswa WHERE kelamin='l'");
											$dt=mysqli_fetch_array($q);
											?>
											<div class="count"><?php echo $dt['jumlah']; ?></div>
											<span class="count_bottom"> JIWA</span>
										</div>
									</div>
									<div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
										<div class="left"></div>
										<div class="right">
											<span class="count_top"> JUMLAH PEREMPUAN</span>
											<?php
											$q=mysqli_query($connection,"SELECT count(nis) AS jumlah FROM siswa WHERE kelamin='p'");
											$dt=mysqli_fetch_array($q);
											?>
											<div class="count"><?php echo $dt['jumlah']; ?></div>
											<span class="count_bottom"> JIWA</span>
										</div>
									</div>
									

								</div>
								<!-- /top tiles -->

								<div class="row">


									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="x_panel tile fixed_height_500">
											<div class="x_title">
												<h2>PENDIDIKAN</h2>
												
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												<h4>Pendidikan Warga</h4>
												
												<?php
												$qagama=mysqli_query($connect,"SELECT pendidikan,COUNT(*) AS JML FROM biodata_wni,pendidikan_terakhir WHERE biodata_wni.PDDK_AKH=pendidikan_terakhir.PDDK_AKH GROUP BY biodata_wni.PDDK_AKH");
												while ($dt=mysqli_fetch_array($qagama)){
													$perc=$dt['JML']/$jdt*100;
													?>
													<div class="widget_summary">
														<div class="w_left w_25">
															<span><?php echo $dt['pendidikan'] ?></span>
														</div>
														<div class="w_center w_55">
															<div class="progress">
																<div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $perc ?>" aria-valuemin="0" aria-valuemax="<?php echo $jdt ?>" style="width: <?php echo $perc ?>%;">
																	<span class="sr-only"><?php echo $perc ?>% Complete</span>
																</div>
															</div>
														</div>
														<div class="w_right w_20">
															<span><?php echo $dt['JML'] ?></span>
														</div>
														<div class="clearfix"></div>
													</div>
													<?php
												}
												?>

										</div>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="x_panel tile fixed_height_500 overflow_hidden">
										<div class="x_title">
											<h2>AGAMA WARGA</h2>

											<div class="clearfix"></div>
										</div>
										<div class="x_content">

											<table class="" style="width:100%">
												<tr>
													<th style="width:37%;">
														<p>Grafik Pemeluk (%)</p>
													</th>
													<th>
														<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
															<p class="">Agama</p>
														</div>
														<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
															<p class="">Jumlah</p>
														</div>
													</th>
												</tr>
												<tr>
													<td>
														<canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
													</td>
													<td>
														<table class="tile_info">
															<?php
															$colors=array("blue","green","purple","aero","red","primary","success");
															$qagama=mysqli_query($connect,"SELECT nama_agama,COUNT(*) AS JML FROM biodata_wni,agama WHERE biodata_wni.AGAMA=agama.AGAMA GROUP BY biodata_wni.AGAMA");
															$i=0;
															$tot=0;
															while ($dt=mysqli_fetch_array($qagama)){
																$perc=$dt['JML']/$jdt*100;
																?>
																<tr>
																	<td>
																		<input type="hidden" name="" id="<?php echo $colors[$i] ?>" value="<?php echo $perc ?>">
																		<p><i class="fa fa-square <?php echo $colors[$i] ?>"></i><?php echo $dt['nama_agama']; ?> </p>
																	</td>
																	<td><?php echo $dt['JML']; ?> </td>
																</tr>
																<?php
																$i++;
															}
															?>
														</table>
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
 </div>
             
             </div>       

        <?php } ?>
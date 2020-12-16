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



	   
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>               
            </div>

        </div>
             
             <div class="row">
            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="tile-stats">
                                <div class="icon"><i class="fa fa-users"></i>
                                </div>
								<?php 
								$siswa = $connection->query("SELECT * FROM siswa"); 
								$dtsiswa = mysqli_num_rows($siswa); 
								?>
                                <div class="count"><?=$dtsiswa?></div>

                                <h3>Data Siswa</h3>
                                <p>Lorem ipsum psdea itgum rixt.</p>
                            </div>
                    </div>
              <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="tile-stats">
                                <div class="icon"><i class="fa fa-bank"></i>
                                </div>
								<?php 
								$kelas = $connection->query("SELECT * FROM kelas"); 
								$dtkelas = mysqli_num_rows($kelas); 
								?>
                                <div class="count"><?=$dtkelas?></div>

                                <h3>Data Kelas</h3>
                                <p>Lorem ipsum psdea itgum rixt.</p>
                            </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="tile-stats">
                                <div class="icon"><i class="fa fa-paper-plane"></i>
                                </div>
								<?php 
								$jurusan = $connection->query("SELECT * FROM jurusan"); 
								$dtjurusan = mysqli_num_rows($jurusan); 
								?>
                                <div class="count"><?=$dtjurusan?></div>

                                <h3>Data Jurusan</h3>
                                <p>Lorem ipsum psdea itgum rixt.</p>
                            </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="tile-stats">
                                <div class="icon"><i class="fa fa-user"></i>
                                </div>
								<?php 
								$guru = $connection->query("SELECT * FROM guru"); 
								$dtguru = mysqli_num_rows($guru); 
								?>
                                <div class="count"><?=$dtguru?></div>

                                <h3>Data Guru</h3>
                                <p>Lorem ipsum psdea itgum rixt.</p>
                            </div>
                    </div>

        </div>              
             
				 <div class="row">
				
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                                    <div class="filter">
                                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
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
															$qagama=mysqli_query($connect,"SELECT kelamin,COUNT(*) AS JML FROM siswa GROUP BY kelamin");
															$i=0;
															$tot=0;
															while ($dt=mysqli_fetch_array($qagama)){
																$perc=$dt['JML']*100;
																?>
																<tr>
																	<td>
																		<input type="hidden" name="" id="<?php echo $colors[$i] ?>" value="<?php echo $perc ?>">
																		<p><i class="fa fa-square <?php echo $colors[$i] ?>"></i><?php echo $dt['kelamin']; ?> </p>
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

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div>
                                            <div class="x_title">
                                                <h2>Top Profiles</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <ul class="list-unstyled top_profiles scroll-view">
                                                <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-user aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">Ms. Mary Jane</a>
                                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                                        <p> <small>12 Sales Today</small>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="media event">
                                                    <a class="pull-left border-green profile_thumb">
                                                        <i class="fa fa-user green"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">Ms. Mary Jane</a>
                                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                                        <p> <small>12 Sales Today</small>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="media event">
                                                    <a class="pull-left border-blue profile_thumb">
                                                        <i class="fa fa-user blue"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">Ms. Mary Jane</a>
                                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                                        <p> <small>12 Sales Today</small>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb">
                                                        <i class="fa fa-user aero"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">Ms. Mary Jane</a>
                                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                                        <p> <small>12 Sales Today</small>
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="media event">
                                                    <a class="pull-left border-green profile_thumb">
                                                        <i class="fa fa-user green"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#">Ms. Mary Jane</a>
                                                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                                                        <p> <small>12 Sales Today</small>
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Weekly Summary <small>Activity shares</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                        <div class="col-md-7" style="overflow:hidden;">
                                            <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                                            <h4 style="margin:18px">Weekly sales progress</h4>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Bounce Rates</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">New Traffic</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Device Share</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Top Profiles <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item One Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Three Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Top Profiles <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item One Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Three Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Top Profiles <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item One Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Two Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">April</p>
                                            <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#">Item Three Tittle</a>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				 </div>
        <?php } ?>
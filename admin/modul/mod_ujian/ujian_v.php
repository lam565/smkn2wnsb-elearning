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
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD GURU</h4>
                
                            </div>

        </div>
	   <div class="row">
                 <div class="col-md-4 col-sm-4 col-xs-12">
 <div class="panel panel-default">
                        <div class="panel-heading">
                           Ujian Online
                        </div>
                        <div class="panel-body text-center recent-users-sec">
<form role="form">
                                       
                                 <div class="form-group">
                                            <label>Nama Ujian</label>
                                            <input class="form-control" type="text" />
                                        </div>
                               
                                       
                                        <div class="form-group">
                                            <label>Tanggal </label>
                                            <input class="form-control" type="text" />
                                        </div>
										
										<div class="form-example-int form-horizental">
                            <div class="form-group">
                                 <div class="row">
								 
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn">
                                    <h5>Jam</h5>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select required="required" class="form-control" name="jam">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h5>Menit</h5>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select required="required" class="form-control" name="menit">
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="40">40</option>
											<option value="50">50</option>
											
										</select>
                                </div>
                            </div>
							 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h5>Detik</h5>
                                </div>
                                <div class="chosen-select-act fm-cmp-mg">
                                    <select required="required" class="form-control" name="detik">
											<option value="0">0</option>
											<option value="20">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="40">40</option>
											<option value="50">50</option>
											<option value="60">60</option>
										</select>
                                </div>
                            </div>
                            
                           
                        </div>
                            </div>
                        </div>
                                        
                                        <div class="form-group">
                                            <label>Kelas </label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />VII 
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />VIII
                                                </label>
                                            </div>
                                            
                                        </div>
										 <div class="form-group">
                                            <label>Mata Pelajaran</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />VII 
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />VIII
                                                </label>
                                            </div>
                                            
                                        </div>
                                        
                                       
                                        <button type="submit" class="btn btn-success">Simpan </button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

                                    </form>
                        </div>
     </div>
             </div>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                           Hasil Ujian Online
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Ujian</th>
                                           <th>Mata Pelajaran</th>
										   <th>Jumlah Soal</th>
                                             <th>Waktu</th>
											 
											<th>Pengerjaan Soal</th>
											 <th>Kelas</th>
											 <th>Aksi</th>
											 
											 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
											 <td>Otto</td>
											 <td>Mark</td>
                                            <td>Otto</td>
											<td>Mark</td>
                                            <td>Otto</td>
											 
                                           
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             </div>
             
             </div>
 </div>
             
             </div>       

        <?php } ?>
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
<label class="control-label col-md-3 col-sm-3 col-xs-12"> Bulan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
											<?php
											$sekarang=getdate();
											
											?>
<select class="form-control" name="bln" id="bln">
<?php
if ($sekarang["month"]=="January")
{
echo '<option value="1" selected>Januari</option>';
}else
{
echo '<option value="1">Januari</option>';
}

if ($sekarang["month"]=="February")
{
echo '<option value="2" selected>Februari</option>';
}else
{
echo '<option value="2">Februari</option>';
}

if ($sekarang["month"]=="March")
{
echo '<option value="3" selected>Maret</option>';
}else
{
echo '<option value="3">Maret</option>';
}

if ($sekarang["month"]=="April")
{
echo '<option value="4" selected>April</option>';
}else
{
echo '<option value="4">April</option>';
}

if ($sekarang["month"]=="May")
{
echo '<option value="5" selected>Mei</option>';
}else
{
echo '<option value="5">Mei</option>';
}

if ($sekarang["month"]=="June")
{
echo '<option value="6" selected>Juni</option>';
}else
{
echo '<option value="6">Juni</option>';
}

if ($sekarang["month"]=="July")
{
echo '<option value="7" selected>Juli</option>';
}else
{
echo '<option value="7">Juli</option>';
}

if ($sekarang["month"]=="August")
{
echo '<option value="8" selected>Agustus</option>';
}else
{
echo '<option value="8">Agustus</option>';
}

if ($sekarang["month"]=="September")
{
echo '<option value="9" selected>September</option>';
}else
{
echo '<option value="9">September</option>';
}

if ($sekarang["month"]=="Oktober")
{
echo '<option value="10" selected>Oktober</option>';
}else
{
echo '<option value="10">Oktober</option>';
}

if ($sekarang["month"]=="November")
{
echo '<option value="11" selected>November</option>';
}else
{
echo '<option value="11">November</option>';
}

if ($sekarang["month"]=="Desember")
{
echo '<option value="12" selected>Desember</option>';
}else
{
echo '<option value="12">Desember</option>';
}
?>

</select>
</div>
</div>
                               
                                       <br><br>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="thn" class="form-control col-md-7 col-xs-12" name="thn" placeholder="Inputkan Tahun" value="<?php echo $sekarang['year']?>" required="required">
                                            </div>
                                        </div>
										<br>
										
										                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Laporan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="thn" class="form-control col-md-7 col-xs-12" name="thn" placeholder="Ujian Online" >
                                            </div>
                                        </div>
										
										<br><br>
                                        
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
                                           
                                             <th>Tanggal</th>
											 <th>Lama</th>
											 <th>Kelas</th>
											 <th>Mata Pelajaran</th>
											 
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
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
                 Upload Silabus
             </div>
             <div class="panel-body text-center recent-users-sec">
                <form role="form">
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran</label>
                        <select class="form-control">
                            <option selected="selected">Pilih Mata Pelajaran</option>
                            <?php

                            $qmapel="SELECT g.kd_guru,g.nama,m.nama_mapel 
                            FROM kurikulum as k, detail_kurikulum as dk, guru as g, kelas as kls, mapel as m 
                            WHERE k.kd_kurikulum=dk.kd_kurikulum AND g.kd_guru=dk.kd_guru AND m.kd_mapel=dk.kd_mapel AND k.Aktif='Y' AND g.username='$_SESSION[username]' 
                            GROUP BY dk.kd_mapel";

                            $datamapel=mysqli_query($connect,$qmapel);
                            while ($mapel=mysqli_fetch_array($datamapel)){
                                echo "<option value=''>$mapel[nama_mapel]</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />Checkbox Example One
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <input class="form-control" type="text" />
                    </div>

                    <div class="form-group">
                        <label>Upload File </label>
                        <input type="file" />
                    </div>

                    <div class="form-group">
                        <label>Mata Pelajaran </label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />IPA 
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" />IPS
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
         Hasil Upload Silabus
     </div>
     <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Upload</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Jenis File</th>
                        <th>Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>100090</td>
                        <td>100090</td>
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
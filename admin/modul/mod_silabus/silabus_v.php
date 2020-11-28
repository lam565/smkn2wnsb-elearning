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
                <form role="form" method="POST" enctype="multipart/form-data" action="modul/mod_silabus/update.php">
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran</label>
                        <select name="mapel" class="form-control" id="cbbmapel">
                            <option selected="selected">Pilih Mata Pelajaran</option>
                            <?php

                            $qmapel="SELECT m.nama_mapel,m.kd_mapel 
                            FROM kurikulum as k, detail_kurikulum as dk, mapel as m 
                            WHERE k.kd_kurikulum=dk.kd_kurikulum AND m.kd_mapel=dk.kd_mapel AND k.Aktif='Y' AND dk.kd_guru='$_SESSION[kode]' 
                            GROUP BY dk.kd_mapel";

                            $datamapel=mysqli_query($connect,$qmapel);
                            while ($mapel=mysqli_fetch_array($datamapel)){
                                echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <!-- y
                    <div class="form-group">
                        <label>Kelas</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="" checked="" />Semua
                            </label>
                        </div>

                        <?php
                        $qkelas="SELECT kls.kd_kelas,kls.nama_kelas 
                        FROM kurikulum as k, detail_kurikulum as dk, guru as g, kelas as kls 
                        WHERE k.kd_kurikulum=dk.kd_kurikulum AND g.kd_guru=dk.kd_guru AND kls.kd_kelas=dk.kd_kelas AND k.Aktif='Y' AND g.username='$_SESSION[username]' ";

                        $datakelas=mysqli_query($connect,$qkelas);
                        while ($kelas=mysqli_fetch_array($datakelas)){
                            echo "<div class=\"checkbox\"> <label>
                            <input type=\"checkbox\" value=\"$kelas[kd_kelas]\" />$kelas[nama_kelas]
                            </label></div>";
                        }
                        ?>

                    </div>
                -->
                <div class="form-group">
                    <label>Judul Silabus</label>
                    <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>">
                    <input class="form-control" type="text" name="judul" />
                </div>
                <div class="form-group">
                    <label>FILE Silabus</label>
                    <input type="file" name="silabusfile" />
                </div>

                <button type="submit" class="btn btn-success">Simpan </button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="panel panel-success">
    <div class="panel-heading">
       SILABUS ANDA
   </div>
   <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Silabus</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>File</th>
                    <th>Tanggal Upload </th>
                </tr>
            </thead>
            <tbody>                
                <?php
                $sql="SELECT silabus.judul, silabus.nama_file,kelas.nama_kelas, mapel.nama_mapel, silabus.tanggal_upload 
                FROM detail_kurikulum as dk, kurikulum, mapel, silabus, kelas 
                WHERE dk.kd_kurikulum=kurikulum.kd_kurikulum AND dk.kd_silabus=silabus.kd_silabus AND dk.kd_kelas=kelas.kd_kelas AND dk.kd_silabus IN (SELECT kd_silabus FROM silabus ) AND dk.kd_mapel=mapel.kd_mapel AND dk.kd_guru='$_SESSION[kode]'";
                $silabus=mysqli_query($connect,$sql);
                $n=1;
                while ($rsilabus=mysqli_fetch_array($silabus)) {
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$rsilabus[judul]</td>
                    <td>$rsilabus[nama_mapel]</td>
                    <td>$rsilabus[nama_kelas]</td>
                    <td><a href='files/silabus/$rsilabus[nama_file]'>$rsilabus[nama_file]</a></td>
                    <td>$rsilabus[tanggal_upload]</td>";
                    echo "</tr>";
                    $n++;
                }
                ?>
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
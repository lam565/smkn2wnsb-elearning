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
                <h4 class="header-line">MANAJEMEN SILABUS</h4>
                
            </div>

        </div>
        <div class="row">
         <div class="col-md-4 col-sm-4 col-xs-12">
             <div class="panel panel-default">
                <div class="panel-heading">
                   Upload Silabus
               </div>
               <div class="panel-body text-center recent-users-sec">
                <form role="form" method="POST" enctype="multipart/form-data" action="modul/mod_silabus/update.php?act=add">
                    <div class="form-group">
                        <label>Pilih Mata Pelajaran</label>
                        <select name="mapel" class="form-control" id="cbbmapelsil" data-guru="<?php echo $_SESSION['kode'] ?>" required="required">
                            <option selected="selected">Pilih Mata Pelajaran</option>
                            <?php

                            $qmapel="SELECT m.nama_mapel,m.kd_mapel 
                            FROM pengajaran as p, mapel as m 
                            WHERE m.kd_mapel=p.kd_mapel AND p.kd_guru LIKE '%$_SESSION[kode]%' 
                            GROUP BY p.kd_mapel";

                            $datamapel=mysqli_query($connect,$qmapel);
                            while ($mapel=mysqli_fetch_array($datamapel)){
                                echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
                            }

                            ?>
                        </select>
                    </div>
                    
                    <div id="tingkatjurusan"></div>
                    
                    <div class="form-group">
                        <label>Judul Silabus</label>
                        <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>">
                        <input class="form-control" type="text" name="judul" required="required" />
                    </div>
                    <div class="form-group">
                        <label>FILE Silabus</label>
                        <input type="file" name="silabusfile" required="required" id="fileupload" />
                        <p class="warningnya text-danger text-left"></p>
                    </div>

                    <button type="submit" class="btn btn-success">Tambah Silabus</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading">
           Silabus Mata Pelajaran Anda
       </div>
       <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Silabus</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                
                    <?php
                    $sql="SELECT silabus.judul, silabus.nama_file,kelas.nama_kelas, mapel.nama_mapel, silabus.tanggal_upload, pengajaran.kd_pengajaran 
                    FROM pengajaran, mapel, silabus, kelas 
                    WHERE pengajaran.kd_silabus=silabus.kd_silabus AND pengajaran.kd_kelas=kelas.kd_kelas AND pengajaran.kd_silabus IN (SELECT kd_silabus FROM silabus ) AND pengajaran.kd_mapel=mapel.kd_mapel AND pengajaran.kd_guru LIKE '%$_SESSION[kode]%' ORDER BY pengajaran.kd_kelas";
                    $silabus=mysqli_query($connect,$sql);
                    $n=1;
                    while ($rsilabus=mysqli_fetch_array($silabus)) {
                        echo "<tr>";
                        echo "<td>$n</td>
                        <td>$rsilabus[judul]</td>
                        <td>$rsilabus[nama_mapel]</td>
                        <td>$rsilabus[nama_kelas]</td>
                        <td><a href='files/silabus/$rsilabus[nama_file]' target='_blank' class='btn btn-info btn-xs'>Lihat File</a></td>
                        <td><a class='btn btn-xs btn-warning' id='openmodal' data-kds='$rsilabus[kd_pengajaran]'>ubah</a></td>";
                        echo "</tr>";
                        $n++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="modalupdsilabus" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">UBAH SILABUS MATAPELAJARAN</h4>
                        </div>
                        <form method="POST" action="modul/mod_silabus/update.php?act=upd">
                            <div class="modal-body" id="modalsilabus">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">UBAH</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-success">
    <div class="panel-heading">
        Daftar Silabus Yang Diupload
   </div>
   <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Silabus</th>
                    <th>Mata Pelajaran</th>
                    <th>Tingkat</th>
                    <th>Jurusan</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>                
                <?php
                $sql="SELECT silabus.judul, silabus.nama_file, mapel.nama_mapel, silabus.tingkat, jurusan.nama_jurusan
                FROM mapel, silabus, jurusan 
                WHERE silabus.kd_mapel=mapel.kd_mapel AND silabus.kd_jurusan=jurusan.kd_jurusan AND silabus.kd_mapel IN (SELECT m.kd_mapel 
                            FROM pengajaran as p, mapel as m 
                            WHERE m.kd_mapel=p.kd_mapel AND p.kd_guru LIKE '%$_SESSION[kode]%' 
                            GROUP BY p.kd_mapel)";
                $silabus=mysqli_query($connect,$sql);
                $n=1;
                if (mysqli_num_rows($silabus)) {
                    # code...
                } else {
                    echo "<tr>
                            <td colspan='6'>Belum ada silabus diupload</d>
                    </tr>";
                }
                while ($rsilabus=mysqli_fetch_array($silabus)) {
                    echo "<tr>";
                    echo "<td>$n</td>
                    <td>$rsilabus[judul]</td>
                    <td>$rsilabus[nama_mapel]</td>
                    <td>$rsilabus[tingkat]</td>
                    <td>$rsilabus[nama_jurusan]</td>
                    <td><a href='files/silabus/$rsilabus[nama_file]' target='_blank' class='btn btn-info btn-xs'>Lihat File</a></td>
                    <td><a class='btn btn-xs btn-warning'>Hapus</a></td>";
                    echo "</tr>";
                    $n++;
                }
                ?>
            </tbody>
        </table>
        <div class="modal fade" id="modalupdsilabus" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">UBAH SILABUS MATAPELAJARAN</h4>
                    </div>
                    <form method="POST" action="modul/mod_silabus/update.php?act=upd">
                        <div class="modal-body" id="modalsilabus">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">UBAH</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
</div>

</div>       

<?php } ?>
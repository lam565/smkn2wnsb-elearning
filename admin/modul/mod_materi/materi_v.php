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
                <h4 class="header-line">MANAJEMEN MATERI PELAJARAN</h4>
                
            </div>

        </div>
        <div class="row">
           <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Upload Materi
             </div>
             <div class="panel-body text-center recent-users-sec">
                <form role="form" name="fupmateri" method="POST" action="modul/mod_materi/simpan_materi.php" enctype="multipart/form-data">
                   <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" class="form-control" id="cbbmapel" data-guru="<?php echo $_SESSION['kode'] ?>">
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
                <div class="form-group">
                    <label>Untuk Kelas</label>
                    <div id="infokls">-</div>
                </div>
                <div class="form-group">
                    <label>Pertemuan ke</label>
                    <input class="form-control" type="text" name="pertemuan" />
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control" type="text" name="nama_materi" />
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>File Atau Link</label>
                    <select name="ForL" class="form-control" id="cbbForL">
                        <option value="file" selected="selected">FILE</option>
                        <option value="link">LINK</option>
                    </select>
                </div>
                <div class="form-group">
                    <div id="ForL">
                        <label>Upload File Materi</label>
                        <input class="form-control" type="file" name="filemateri" id="fileupload" />
                    </div>
                    <p class="warningnya text-danger text-left"></p>
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode'] ?>">
                    <input type="hidden" name="act" value="tbmateri">

                </div>
                <button type="submit" class="btn btn-success">Simpan </button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="panel panel-success">
    <div class="panel-heading">
     Hasil Upload Materi
 </div>
 <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pertemuan</th>
                    <th>Judul</th>
                    <th>Kelas</th>
                    <th>Pelajaran</th>
                    <th>File</th>
                    <th>Tanggal Posting</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <div id="bag-data">
                    <?php 
                    $q="SELECT materi.nama_materi, materi.file, materi.pertemuan, materi.tgl_up, mapel.nama_mapel, materi.kd_materi, kelas.nama_kelas 
                    FROM kurikulum, materi, detail_kurikulum as dk, mapel, kelas 
                    WHERE kurikulum.kd_kurikulum=dk.kd_kurikulum AND kurikulum.aktif='Y' AND dk.kd_mapel=materi.kd_mapel AND materi.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=materi.kd_kelas AND dk.kd_kelas=kelas.kd_kelas AND materi.kd_guru=dk.kd_guru AND materi.kd_guru='$_SESSION[kode]'";
                    $materi=mysqli_query($connect,$q);
                    if (mysqli_num_rows($materi)>0){
                        $n=1;
                        while ($rmateri=mysqli_fetch_array($materi)) {
                            echo "<tr>

                            <td>$n</td>
                            <td>$rmateri[pertemuan]</td>
                            <td>$rmateri[nama_materi]</td>";
                            echo "<td>$rmateri[nama_kelas]</td>";
                            echo "<td>$rmateri[nama_mapel]</td>
                            <td><a href='files/materi/$rmateri[file]'>$rmateri[file]</a></td>
                            <td>$rmateri[tgl_up]</td>
                            <td><a href='modul/mod_materi/hapus_materi.php?id=$rmateri[kd_materi]' class='btn btn-warning' onclick='return confirm(\"Yakin Hapus?\")'>Hapus<a></td>

                            </tr>";
                            $n++;
                        }
                    } else {
                        echo "<tr><td colspan='7'>Belum ada materi diupload</td></tr>";
                    }
                    ?>
                </div>
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
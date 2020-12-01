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
                <h4 class="header-line">MANAJEMEN TUGAS</h4>
                
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     BUAT TUGAS
                 </div>
                 <div class="panel-body text-center recent-users-sec">
                    <form role="form" name="fupmateri" method="POST" action="modul/mod_tugas/aksi.php?act=add" enctype="multipart/form-data">
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
                        <label>Tugaskan Untuk Kelas</label>
                        <div id="infokls">-</div>
                    </div>
                    <div class="form-group">
                        <label>Judul Tugas</label>
                        <input class="form-control" type="text" name="judul_tugas" />
                    </div>
                    <div class="form-group">
                        <label>Deskripsi/Petunjuk</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Batas Pengerjaan</label>
                        <input class="form-control" type="date" name="batas" />
                    </div>
                    <div class="form-group">
                        <label>Upload File Tugas</label>
                        <input class="form-control" type="file" name="fuptugas" id="fileupload" />
                        <p class="warningnya text-danger text-left"></p>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode'] ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading">
         DAFTAR TUGAS SISWA
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
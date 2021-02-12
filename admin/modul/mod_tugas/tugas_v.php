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
                <?php
                if (isset($_GET['eid'])){
                    $id=$_GET['eid'];
                    $qw="SELECT tugas.*, mapel.nama_mapel, kelas.nama_kelas, mapel.kd_mapel 
                    FROM tugas, pengajaran as p, mapel, kelas 
                    WHERE p.kd_mapel=tugas.kd_mapel AND tugas.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=tugas.kd_kelas AND p.kd_kelas=kelas.kd_kelas AND tugas.kd_guru=p.kd_guru AND tugas.kd_tugas='$id'";
                    $tugas=mysqli_query($connect,$qw);
                    $etugas=mysqli_fetch_array($tugas);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         UBAH TUGAS
                     </div>
                     <div class="panel-body text-center recent-users-sec">
                        <form role="form" name="fupmateri" method="POST" action="modul/mod_tugas/aksi.php?act=edit" enctype="multipart/form-data">
                           <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input class="form-control" type="txt" name="mpl" value="<?php echo $etugas['nama_mapel'] ?>" disabled="disabled">
                            <input type="hidden" name="mapel" value="<?php echo $etugas['kd_mapel'] ?>">
                            <input type="hidden" name="kd_tugas" value="<?php echo $id ?>">
                        </div>
                        <div class="form-group">
                            <label>Tugaskan Untuk Kelas</label>
                            <div id="infokls">
                                <input class="form-control" type="txt" name="kls" value="<?php echo $etugas['nama_kelas'] ?>" disabled="disabled">
                                <input type="hidden" name="kd_kls" value="<?php echo $etugas['kd_kelas'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul Tugas</label>
                            <input class="form-control" type="text" name="judul_tugas" value="<?php echo $etugas['nama_tugas'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi/Petunjuk</label>
                            <textarea class="form-control" name="deskripsi" rows="3"><?php echo $etugas['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group">
                           <label>Awal Pengerjaan</label>
                           <input class="form-control" type="date" name="awaltgl" value="<?php echo substr($etugas['batas_awal'],0,10) ?>"/>
                           <input class="form-control" type="time" name="awaljam" value="<?php echo substr($etugas['batas_awal'],11,5) ?>"/>
                       </div>
                       <div class="form-group">
                           <label>Batas Akhir Pengerjaan</label>
                           <input class="form-control" type="date" name="ahirtgl" value="<?php echo substr($etugas['batas_ahir'],0,10) ?>"/>
                           <input class="form-control" type="time" name="ahirjam" value="<?php echo substr($etugas['batas_ahir'],11,5) ?>"/>
                       </div>
                       <div class="form-group">
                        <label>Ubah File Tugas</label>
                        <input class="form-control" type="file" name="fuptugas" id="fileupload" />
                        <p class="warningnya text-danger text-left">Kosongkan jika tidak mengubah file</p>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode'] ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Update </button>
                </form>
            </div>
        </div>

        <?php    
    } else { ?>
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
                    FROM pengajaran as p, mapel as m 
                    WHERE m.kd_mapel=p.kd_mapel AND p.kd_guru='$_SESSION[kode]' 
                    GROUP BY p.kd_mapel";

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
               <label>Awal Pengerjaan</label>
               <input class="form-control" type="date" name="awaltgl" />
               <input class="form-control" type="time" name="awaljam" />
           </div>
           <div class="form-group">
               <label>Batas Akhir Pengerjaan</label>
               <input class="form-control" type="date" name="ahirtgl" />
               <input class="form-control" type="time" name="ahirjam" />
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

<?php
}
?>

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
                    <th>Nama Tugas</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Belum</th>
                    <th>Dikoreksi</th>
                    <th>Dinilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                function jmlSiswa ($kd,$cn,$sts){
                    $a="SELECT nis FROM kerja_tugas WHERE kd_tugas='$kd' AND status_kerja='$sts'";
                    $j=mysqli_num_rows(mysqli_query($cn,$a));
                    return $j;
                }
                $q="SELECT tugas.nama_tugas, tugas.file, tugas.batas_ahir, tugas.tgl_up, mapel.nama_mapel, tugas.kd_tugas, tugas.deskripsi, kelas.nama_kelas 
                FROM tugas, pengajaran as p, mapel, kelas 
                WHERE p.kd_mapel=tugas.kd_mapel AND tugas.kd_mapel=mapel.kd_mapel AND kelas.kd_kelas=tugas.kd_kelas AND p.kd_kelas=kelas.kd_kelas AND p.kd_guru LIKE '%$_SESSION[kode]%'";
                
                if ( isset($_GET['mp']) AND isset($_GET['kls'])){
                        $q .= " AND tugas.kd_mapel='$_GET[mp]' AND tugas.kd_kelas='$_GET[kls]'";
                    }

                $tugas=mysqli_query($connect,$q);
                if (mysqli_num_rows($tugas)>0){
                    $n=1;
                    while ($rtugas=mysqli_fetch_array($tugas)) {
                        echo "<tr>

                        <td>$n</td>
                        <td><a href='#' data-toggle='modal' data-target='#myModal$rtugas[kd_tugas]'>$rtugas[nama_tugas]</a></td>
                        <td>$rtugas[nama_mapel]</td>
                        <td>$rtugas[nama_kelas]</td>";
                        $jb=jmlSiswa($rtugas['kd_tugas'],$connect,'T');
                        $jk=jmlSiswa($rtugas['kd_tugas'],$connect,'K');
                        $jn=jmlSiswa($rtugas['kd_tugas'],$connect,'N');
                        echo "<td>$jb </td>";
                        echo "<td>$jk </td>";
                        echo "<td>$jn </td>
                        <td><a href='modul/mod_tugas/aksi.php?act=del&id=$rtugas[kd_tugas]'>Hapus</a> | <a href='?module=tugas&eid=$rtugas[kd_tugas]'>Edit</a> | <a href='?module=detailtugas&kd=$rtugas[kd_tugas]'>Penilaian</a>  </td>
                        </tr>";
                        ?>
                        <div class="modal fade" id="myModal<?php echo $rtugas['kd_tugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo $rtugas['nama_tugas']; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $rtugas['deskripsi']; ?>
                                        <hr>
                                        <strong>Lihat File: <a href="files/tugas/<?php echo $rtugas['file']; ?>" target="_blank"><?php echo $rtugas['nama_tugas']; ?></a></strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $n++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Belum ada materi diupload</td></tr>";
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
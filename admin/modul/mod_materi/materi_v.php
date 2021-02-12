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
<?php
  $update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
  if ($update) {
   $sql = $connection->query("SELECT * FROM materi WHERE kd_materi='$_GET[key]'");
   $row = $sql->fetch_assoc();
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($update) {
    $sql = "UPDATE kelas SET nama_kelas='$_POST[nama_kelas]',tingkat='$_POST[tingkat]',kd_jurusan='$_POST[kd_jurusan]' WHERE kd_kelas='$_GET[key]'";
  } else {
    $sql = "INSERT INTO kelas VALUES ('$_POST[kd_kelas]', '$_POST[nama_kelas]', '$_POST[tingkat]', '$_POST[kd_jurusan]')";
  }
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
  } else {
    echo "<script>alert('Gagal'); window.location = 'media.php?module=kelas'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM kelas WHERE kd_kelas='$_GET[key]'");
  echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
}
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
            <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
                <div class="panel-heading">
                 <?= ($update) ? "EDIT" : "TAMBAH" ?>  Upload Materi
               </div>
               <div class="panel-body text-center recent-users-sec">
                <form role="form" name="fupmateri" method="POST" action="<?=$_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
                 <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <select name="mapel" class="form-control" id="cbbmapel" data-guru="<?php echo $_SESSION['kode'] ?>">
                        <option selected="selected">Pilih Mata Pelajaran</option>
                        <?php

                        $qmapel="SELECT m.nama_mapel,m.kd_mapel 
                        FROM pengajaran as p, mapel as m 
                        WHERE m.kd_mapel=p.kd_mapel AND p.kd_guru LIKE '%$_SESSION[kode]%' 
                        GROUP BY p.kd_mapel";

                        $datamapel=mysqli_query($connect,$qmapel);
                        while ($mapel=mysqli_fetch_array($datamapel)){?>
                            <option value="<?=$mapel["kd_mapel"]?>" <?= (!$update) ?: (($mapel["kd_mapel"] != $mapel["kd_mapel"]) ?: 'selected="on"') ?>><?=$mapel["kd_mapel"]?></option>
						<?php
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
                    <input class="form-control" type="text" name="pertemuan" required="" <?= (!$update) ?: 'value="'.$row["pertemuan"].'"' ?>/>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input class="form-control" type="text" name="nama_materi" required="" <?= (!$update) ?: 'value="'.$row["nama_materi"].'"' ?>/>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required="" ><?= (!$update) ?: ''.$row["deskripsi"].'' ?></textarea>
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
                        <input class="form-control" type="file" name="filemateri" id="filemateri" />
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
                     
                    $q="SELECT materi.ForL, materi.nama_materi, materi.file, materi.pertemuan, 
					materi.tgl_up, mapel.nama_mapel, materi.kd_materi, kelas.nama_kelas 
                    FROM materi, pengajaran as p, mapel, kelas 
                    WHERE p.kd_mapel=materi.kd_mapel AND materi.kd_mapel=mapel.kd_mapel 
					AND kelas.kd_kelas=materi.kd_kelas AND p.kd_kelas=kelas.kd_kelas 					
					and p.kd_guru like '%$_SESSION[kode]%'
					";

                    if ( isset($_GET['mp']) AND isset($_GET['kls'])){
                        $q .= " AND materi.kd_mapel='$_GET[mp]' AND materi.kd_kelas='$_GET[kls]'";
                    }

                    $materi=mysqli_query($connect,$q);
                    if (mysqli_num_rows($materi)>0){
                        $n=1;
                        while ($rmateri=mysqli_fetch_array($materi)) {
                            echo "<tr>

                            <td>$n</td>
                            <td>$rmateri[pertemuan]</td>
                            <td>$rmateri[nama_materi]</td>";
                            echo "<td>$rmateri[nama_kelas]</td>";
                            echo "<td>$rmateri[nama_mapel]</td>";
                            if ($rmateri['ForL']=='file') {
                                echo "<td><a href='download.php?file=materi/$rmateri[file]' class='btn btn-info btn-xs'>Lihat Materi</a></td>";
                            } else {
                                echo "<td><a href='$rmateri[file]' class='btn btn-primary btn-xs' target='_blank'>Lihat Materi</a></td>";
                            }
                            
                            echo "<td>$rmateri[tgl_up]</td>
                            <td> <a href='?module=materi&action=update&key=$rmateri[kd_materi]' class='btn btn-warning btn-xs'>Edit</a> | <a href='modul/mod_materi/hapus_materi.php?id=$rmateri[kd_materi]' class='btn btn-warning btn-xs' onclick='return confirm(\"Yakin Hapus?\")'>Hapus<a></td>

                            </tr>";
                            $n++;
                        }
                    } else {
                        echo "<tr><td colspan='8'>Belum ada materi diupload</td></tr>";
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
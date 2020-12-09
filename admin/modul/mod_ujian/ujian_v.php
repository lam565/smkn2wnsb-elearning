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
                <h4 class="header-line">MANAJEMEN SOAL/UJIAN SISWA</h4>
            </div>

        </div>
        <div class="row">
           <div class="col-md-4 col-sm-4 col-xs-12">
            <?php 
            if (isset($_GET['eid'])){
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Ujian eid
                   </div>
                   <div class="panel-body text-center recent-users-sec">
                    <form role="form">

                     <div class="form-group">
                        <label>Nama Ujian</label>
                        <input name="nama_ujian" class="form-control" type="text" />
                    </div>


                    <div class="form-group col-xs-6">
                        <label>Tanggal </label>
                        <input class="form-control" type="date" />
                    </div>
                    <div class="form-group col-xs-6">
                        <label>Tanggal </label>
                        <input class="form-control" type="date" />
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

<?php 
} else {

   ?>
   <div class="panel panel-default">
    <div class="panel-heading">
     Tambah Ujian Online
 </div>
 <div class="panel-body text-center recent-users-sec">
    <form role="form" method="POST" action="modul/mod_ujian/aksi.php?act=add">
       <div class="form-group">
        <label>Nama Ujian</label>
        <input class="form-control" name="nama_ujian" type="text" />
        <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>">

    </div>
    <div class="form-group">

        <label>Mata Pelajaran</label>
        <select name="mapel" class="form-control" id="cbmapel" data-guru="<?php echo $_SESSION['kode'] ?>">
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
        <label>Soal Ujian</label>
        <div id="daftsoal"></div>
    </div>
    <div class="form-group">
        <label>Ujian Untuk Kelas</label>
        <div id="infokls">-</div>
    </div>

    <div class="form-group col-xs-6">
        <label>Dimulai Tanggal </label>
        <input class="form-control" name="tgl_mulai" type="date" />
    </div>
    <div class="form-group col-xs-6">
        <label>Pukul </label>
        <input class="form-control" name="jam_mulai" type="time" />
    </div>
    <div class="form-group">
        <label>Durasi</label>
    </div>

    <div class="form-example-int form-horizental">
        <div class="row">
            <div class="form-group">
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
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                        <h5>Menit</h5>
                    </div>
                    <div class="chosen-select-act fm-cmp-mg">
                        <select required="required" class="form-control" name="menit">
                            <option value="00">00</option>
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
                            <option value="00">00</option>
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
        <label>Deskripsi Ujian</label>
        <textarea class="form-control" name="deskripsi" rows="5"></textarea>
    </div>
    <hr>
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
                    <th>Kelas</th>
                    <th>Jumlah Soal</th>
                    <th>Waktu</th>
                    <th>Mengerjakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                function jumSoal($kd,$conn){
                    $q=mysqli_query($conn,"SELECT kd_detail_soal FROM detail_soal WHERE kd_soal='$kd'");
                    $n=mysqli_num_rows($q);
                    return $n;
                }

                $qsoal="SELECT ujian.nama_ujian,mapel.nama_mapel,kelas.nama_kelas,ujian.tgl_ujian,ujian.kd_soal
                FROM ujian,mapel,kelas
                WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_kelas=kelas.kd_kelas AND ujian.kd_guru='$_SESSION[kode]'";
                $esoal=mysqli_query($connect,$qsoal);
                $num=mysqli_num_rows($esoal);

                if ($num>0) {
                    $no=1;
                    while ($rsoal=mysqli_fetch_array($esoal)) {

                        $js=jumSoal($rsoal['kd_soal'],$connect);
                        $a="SELECT nis FROM nilai_ujian WHERE kd_ujian='$rsoal[kd_ujian]'";
                        $j=mysqli_num_rows(mysqli_query($cn,$a));
                        return $j;

                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$rsoal[nama_ujian]</td>";
                        echo "<td>$rsoal[nama_mapel]</td>";
                        echo "<td>$rsoal[nama_kelas]</td>";
                        echo "<td>$js</td>";
                        echo "<td>$rsoal[tgl_ujian]</td>";
                        echo "<td></td>";
                        echo "<td><a href='' class='btn btn-primary btn-xs'>Edit</a><a href='' class='btn btn-warning btn-xs'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Belum ada data</td></tr>";
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
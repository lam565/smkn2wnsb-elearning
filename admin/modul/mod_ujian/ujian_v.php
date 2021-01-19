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
else {

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
                        $kd=$_GET['eid'];
                        $qed="SELECT * FROM ujian,kelas WHERE kelas.kd_kelas=ujian.kd_kelas AND kd_ujian='$kd'";
                        $eujian=mysqli_fetch_array(mysqli_query($connect,$qed));

                        ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Ubah Ujian Online
                            </div>
                            <div class="panel-body text-center recent-users-sec">
                                <form role="form" method="POST" action="modul/mod_ujian/aksi.php?act=edit">
                                    <div class="form-group">
                                        <label>Nama Ujian</label>
                                        <input class="form-control" name="nama_ujian" type="text" value="<?php echo $eujian['nama_ujian']; ?>"/>
                                        <input type="hidden" name="kd_guru" value="<?php echo $_SESSION['kode']; ?>">
                                        <input type="hidden" name="kd_ujian" value="<?php echo $_GET['eid']; ?>">

                                    </div>
                                    <div class="form-group">

                                        <label>Mata Pelajaran</label>
                                        <select name="mapel" class="form-control" id="cbmapel" data-guru="<?php echo $_SESSION['kode'] ?>">
                                            <option selected="selected">Pilih Mata Pelajaran</option>
                                            <?php
                                            $qmapel="SELECT m.nama_mapel,m.kd_mapel 
                                            FROM pengajaran as p, mapel as m 
                                            WHERE m.kd_mapel=p.kd_mapel AND p.kd_guru='$_SESSION[kode]' 
                                            GROUP BY p.kd_mapel";

                                            $datamapel=mysqli_query($connect,$qmapel);
                                            while ($mapel=mysqli_fetch_array($datamapel)){
                                                if ($eujian['kd_mapel']==$mapel['kd_mapel']){
                                                    echo "<option value='$mapel[kd_mapel]' selected='selected'>$mapel[nama_mapel]</option>";    
                                                } else {
                                                    echo "<option value='$mapel[kd_mapel]'>$mapel[nama_mapel]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Soal Ujian</label>
                                        <div id="daftsoal">
                                            <?php 

                                            $output="<select name='kd_soal' class='form-control'>
                                            <option selected='selected'>Pilih Soal</option>";

                                            function jSoal($kd,$conn){
                                                $q=mysqli_query($conn,"SELECT kd_detail_soal FROM detail_soal WHERE kd_soal='$kd'");
                                                $n=mysqli_num_rows($q);
                                                return $n;
                                            }

                                            $qsoal="SELECT soal.acak, soal.kd_soal,soal.nama_soal,mapel.nama_mapel
                                            FROM soal,mapel WHERE soal.kd_mapel=mapel.kd_mapel AND soal.kd_guru='$_SESSION[kode]' AND soal.kd_mapel='$eujian[kd_mapel]'";
                                            $csoal=mysqli_query($connect,$qsoal);
                                            while ($rsoal=mysqli_fetch_array($csoal)){
                                                $j=jSoal($rsoal['kd_soal'],$connect);
                                                if ($eujian['kd_soal']==$rsoal['kd_soal']){
                                                    $output .= "<option value='$rsoal[kd_soal]' selected='selected'>$rsoal[nama_soal] - [$j]</option>";
                                                } else {
                                                    $output .= "<option value='$rsoal[kd_soal]'>$rsoal[nama_soal] - [$j]</option>";
                                                }
                                            }

                                            $output .= "</select>";
                                            echo $output;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ujian Untuk Kelas</label>
                                        <div id="infokls">
                                            <input class="form-control" type="text" name="kls" value="<?php echo $eujian['nama_kelas']; ?>" disabled="disabled">
                                            <input type="hidden" name="kd_kelas" value="<?php echo $eujian['kd_kelas']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-7">
                                        <label>Dimulai Tanggal </label>
                                        <input class="form-control" name="tgl_mulai" type="date" value="<?php echo substr($eujian['tgl_ujian'],0,10) ?>" />
                                    </div>
                                    <div class="form-group col-xs-5">
                                        <label>Pukul </label>
                                        <input class="form-control" name="jam_mulai" type="time" value="<?php echo substr($eujian['tgl_ujian'],11,5) ?>" />
                                    </div>
                                    <div class="form-group col-xs-7">
                                        <label>Berakhir pada </label>
                                        <input class="form-control" name="tgl_ahir" type="date" value="<?php echo substr($eujian['tgl_ahir'],0,10) ?>" />
                                    </div>
                                    <div class="form-group col-xs-5">
                                        <label>Pukul </label>
                                        <input class="form-control" name="jam_ahir" type="time" value="<?php echo substr($eujian['tgl_ahir'],11,5) ?>" />
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
                                                            <option value="1" <?php echo $eujian['jam']=='1' ? "selected='selected'" : " "; ?>>1</option>
                                                            <option value="2" <?php echo $eujian['jam']=='2' ? "selected='selected'" : " "; ?>>2</option>
                                                            <option value="3" <?php echo $eujian['jam']=='3' ? "selected='selected'" : " "; ?>>3</option>
                                                            <option value="4" <?php echo $eujian['jam']=='4' ? "selected='selected'" : " "; ?>>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                                        <h5>Menit</h5>
                                                    </div>
                                                    <div class="chosen-select-act fm-cmp-mg">
                                                        <select required="required" class="form-control" name="menit">
                                                            <option value="00" <?php echo $eujian['menit']=='00' ? "selected='selected'" : " "; ?>>00</option>
                                                            <option value="10" <?php echo $eujian['menit']=='10' ? "selected='selected'" : " "; ?>>10</option>
                                                            <option value="20" <?php echo $eujian['menit']=='20' ? "selected='selected'" : " "; ?>>20</option>
                                                            <option value="30" <?php echo $eujian['menit']=='30' ? "selected='selected'" : " "; ?>>30</option>
                                                            <option value="40" <?php echo $eujian['menit']=='40' ? "selected='selected'" : " "; ?>>40</option>
                                                            <option value="50" <?php echo $eujian['menit']=='50' ? "selected='selected'" : " "; ?>>50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                                        <h5>Detik</h5>
                                                    </div>
                                                    <div class="chosen-select-act fm-cmp-mg">
                                                        <select required="required" class="form-control" name="detik">
                                                            <option value="00" <?php echo $eujian['detik']=='00' ? "selected='selected'" : " "; ?>>00</option>
                                                            <option value="10" <?php echo $eujian['detik']=='10' ? "selected='selected'" : " "; ?>>10</option>
                                                            <option value="20" <?php echo $eujian['detik']=='20' ? "selected='selected'" : " "; ?>>20</option>
                                                            <option value="30" <?php echo $eujian['detik']=='30' ? "selected='selected'" : " "; ?>>30</option>
                                                            <option value="40" <?php echo $eujian['detik']=='40' ? "selected='selected'" : " "; ?>>40</option>
                                                            <option value="50" <?php echo $eujian['detik']=='50' ? "selected='selected'" : " "; ?>>50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Ujian</label>
                                        <textarea class="form-control" name="deskripsi" rows="5"><?php echo $eujian['deskripsi']; ?></textarea>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-warning">Update </button>

                                </form>
                            </div>
                        </div>

                        <?php 
                    } else {

                        ?>
                        <div class="panel panel-info">
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
                                        <label>Soal Ujian</label>
                                        <div id="daftsoal"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ujian Untuk Kelas</label>
                                        <div id="infokls">-</div>
                                    </div>

                                    <div class="form-group col-xs-7">
                                        <label>Dimulai Tanggal </label>
                                        <input class="form-control" name="tgl_mulai" type="date" />
                                    </div>
                                    <div class="form-group col-xs-5">
                                        <label>Pukul </label>
                                        <input class="form-control" name="jam_mulai" type="time" />
                                    </div>
                                    <div class="form-group col-xs-7">
                                        <label>Berakhir pada </label>
                                        <input class="form-control" name="tgl_ahir" type="date" />
                                    </div>
                                    <div class="form-group col-xs-5">
                                        <label>Pukul </label>
                                        <input class="form-control" name="jam_ahir" type="time" />
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
                            Daftar Ujian Online
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

                                        $qsoal="SELECT ujian.nama_ujian,mapel.nama_mapel,kelas.nama_kelas,ujian.tgl_ujian,ujian.kd_soal,ujian.kd_ujian,ujian.tgl_ahir
                                        FROM ujian,mapel,kelas
                                        WHERE ujian.kd_mapel=mapel.kd_mapel AND ujian.kd_kelas=kelas.kd_kelas AND ujian.kd_guru='$_SESSION[kode]'";
                                        if ( isset($_GET['mp']) AND isset($_GET['kls'])){
                                            $qsoal .= " AND ujian.kd_mapel='$_GET[mp]' AND ujian.kd_kelas='$_GET[kls]'";
                                        }
                                        $esoal=mysqli_query($connect,$qsoal);
                                        $num=mysqli_num_rows($esoal);

                                        if ($num>0) {
                                            $no=1;
                                            while ($rsoal=mysqli_fetch_array($esoal)) {

                                                $js=jumSoal($rsoal['kd_soal'],$connect);
                                                $a="SELECT nis FROM nilai_ujian WHERE kd_ujian='$rsoal[kd_ujian]'";
                                                $j=mysqli_num_rows(mysqli_query($connect,$a));

                                                echo "<tr>";
                                                echo "<td>$no</td>";
                                                echo "<td>$rsoal[nama_ujian]</td>";
                                                echo "<td>$rsoal[nama_mapel]</td>";
                                                echo "<td>$rsoal[nama_kelas]</td>";
                                                echo "<td>$js</td>";
                                                echo "<td><b>Mulai:</b> $rsoal[tgl_ujian] |<br> <b>Berahir:</b> $rsoal[tgl_ahir]</td>";
                                                echo "<td>$j <a class='btn btn-success btn-xs' href='?module=detnilujian&kd=$rsoal[kd_ujian]'>Lihat Nilai Siswa</a></td>";
                                                echo "<td><a href='?module=ujian&eid=$rsoal[kd_ujian]' class='btn btn-primary btn-xs'>Edit</a><a href='modul/mod_ujian/aksi.php?act=del&kdu=$rsoal[kd_ujian]' class='btn btn-warning btn-xs'>Hapus</a></td>";
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
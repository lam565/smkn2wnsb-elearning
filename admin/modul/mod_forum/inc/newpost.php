<?php
    $useruser = @$_GET["profil"];
    $userquery = mysqli_query($db, "SELECT*FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["nama_user"];?> | Tambah Postingan - 8.5 Web Grup</title>
<?php
$cekpengguna = mysqli_num_rows($userquery);
if (@$_SESSION["user"] == $useruser) {
?>
<div id="page-inner">
 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tambah Postingan</h1>
                        <h1 class="page-subhead-line"><li class="fa fa-pencil fa-spin"></li> Menambah Postingan Di 8.5 Web Grup Untuk Berbagi</h1>
                  
            </div>
            </div>

            <form method="post" action="" enctype="multipart/form-data">
            <?php
            if (@$_POST["submit"]) {
            date_default_timezone_set("Asia/Jakarta");
                $dt = date("Ymd_Gis");
            $gambar = @$_FILES["gambar"]["tmp_name"];
            $alamat_gambar = @$_FILES["gambar"]["name"];
            $folder = "assets/img/post/";
            $foldermin = "assets/img/post-admin-herp-id/";

            $pindah = move_uploaded_file($gambar, $folder.$dt.$alamat_gambar);

            $judul = mysqli_real_escape_string($db, $_POST["judul"]);
            $isi = mysqli_real_escape_string($db, $_POST["isi"]);

            $date = date("G:i d/m/Y");

            if ($pindah) {
                mysqli_query($db, "INSERT INTO post VALUES('','$judul','$isi','$useruser','$date','$dt$alamat_gambar','0')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
            }
            else{
                mysqli_query($db, "INSERT INTO post VALUES('','$judul','$isi','$useruser','$date','','0')");
                echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='./?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
            }
            }
            ?>
            <div>
                <input type="file" name="gambar">
                <label>Tambah Gambar (*Tidak Wajib)</label>
            </div>
            <div style="margin-top:20px;">
                <input title="Masukan Judul Postingan" required type="text" name="judul" placeholder="Masukan Judul..." style="border:none;height:100px;width:100%;font-size:40px;">
                <hr>
                <div style="margin-top:20px;">
                    <textarea title="Masukan Isi Postingan" name="isi" rows="20" style="border:none;font-size:17px;width:100%;" placeholder="Isi..."></textarea>
                </div><br>
                <div><input type="submit" name="submit" value="Posting" class="btn btn-primary" style="width:100%;"></div>
            </form>
            </div>
<?php
}
else{
?>
<script>window.location='.?p=posting&profil=<?php echo $data2["user_user"];?>';</script>
            <?php
}
            ?>
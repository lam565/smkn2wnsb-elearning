<?php
$idpost = @$_GET["id"];
$querypost = mysqli_query($db, "SELECT*FROM post WHERE id_post='$idpost' AND penulis_post='$_GET[post_by]'");
$datapost = mysqli_fetch_array($querypost);
$cekapakahpostinganiniadaatautidak = mysqli_num_rows($querypost);
if (empty($cekapakahpostinganiniadaatautidak)) {
    echo "<div class='alert alert-danger'><h4>Postingan Ini Tidak Ada.</h4>Mungkin Sudah Di Hapus Atau Di Perbarui. <a href='./?p=beranda'>Kembali Ke Halaman Utama</a></div>";
}
else{
?>
<title><?php echo $datapost["judul_post"];?> | Post - 8.5 Web Grup</title>
<div id="page-inner">
<div class="alert alert-info">
    <h2><?php echo $datapost["judul_post"];?></h2>
    Penulis : <a href="./?p=user&user=<?php echo $datapost["penulis_post"];?>">@<?php echo $datapost["penulis_post"];?></a> | Pada : <u><?php echo $datapost["tanggal_post"];?></u> <span style="float:right;"><i class="fa fa-thumbs-up"></i> : <?php echo $datapost["suka_post"];?> 

    <?php
    $datasukapost = @mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$idpost' AND user_suka='$_SESSION[user]'"));
    if (empty($_SESSION["user"])) {
    }
    elseif ($datasukapost["post_suka"] == 1) {
        ?>
    <a style="color:darkred;" href="#" onclick="window.location='./inc/unlike.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">Tarik Jempol</a>

        <?php
    }
    else{
    ?>
    <a href="#" onclick="window.location='./inc/like.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">Kasih Jempol</a>
<?php
}
?>
    </span> 
</div>
<div>
<?php
if (@$datapost["gambar_post"]) {
?>
    <a href="./assets/img/post/<?php echo $datapost["gambar_post"];?>"><img src="assets/img/post/<?php echo $datapost["gambar_post"];?>" class="img-thumbnail" style="margin-bottom:10px;"></a>
    </div>

<div>
    <p style="font-size:20px;"><?php echo $datapost["isi_post"];?></p>
</div>
<?php
}
else{
?>
</div>

<div style="margin-bottom:100px;">
    <p style="font-size:20px;"><?php echo $datapost["isi_post"];?></p>
</div>
<?php
}


if (@$_SESSION["user"]) {

?>
        <form method="post" action="./inc/ngomen.php?p=<?php echo $datapost["id_post"];?>&a=<?php echo $datapost["penulis_post"];?>" id="komentar" style="margin-top:35px;">
            <input type="text" placeholder="komentari postingan ini..." name="komentari" style="height:34px;width:100%;">
        </form>
<?php
}
else{
    ?>
    <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datapost["id_post"];?>&post_by=<?php echo $datapost["penulis_post"];?>"><i class="fa fa-sign-in"></i> Masuk Untuk Ngomen!</a>
    <?php
}
?>
    <div class="alert alert-warning" style="margin-top:35px;">
        <b>
        <?php
    $batas  = 15;

if (isset($_GET["hal"])) {
    $hal = $_GET["hal"];
    $posisi = ($hal-1)*$batas;
}
else{
    $hal = 1;
    $posisi = 0;
}
        $querykomentar = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$idpost' ORDER BY id_komentar ASC LIMIT $posisi, $batas");
        $querykomentar2 = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$idpost'");
        $totalkomentar = mysqli_num_rows($querykomentar2);
        echo $totalkomentar;
        ?>
        </b>
         Komentar Pada Postingan : <b>"<?php echo $datapost["judul_post"];?>" :</b>
    </div>
    <?php
    if ($totalkomentar > 0) {
        echo "Urutan Komentar : ";
    }
$totalkomentar2 = mysqli_num_rows($querykomentar2);
$bagi = ceil($totalkomentar2/$batas);
for ($i=1; $i <= $bagi ; $i++) { 
                    if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?p=post&id=$idpost&post_by=$datapost[penulis_post]&hal=$i#komentar'><span class='badge'>$i</span></a> ";
                                }
                }
    ?>
    <div class="alert alert-warning">
    <?php

if ($totalkomentar >= 0) {

    while ($datakomentar = mysqli_fetch_array($querykomentar)) {
    ?>
        <small id="komentar_<?php echo $datakomentar["id_komentar"];?>"><?php echo $datakomentar["tanggal_komentar"];?></small><br>
        <b>
        <a href="./?p=user&user=<?php echo $datakomentar["penulis_komentar"];?>">
        <?php
        if ($datakomentar["pp_penulis"] == '') {
        ?>
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        else{
        ?>
        <img src="./assets/img/user/<?php echo $datakomentar["pp_penulis"];?>" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        $dataygngomen = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user = '$datakomentar[penulis_komentar]'"));
        ?>
        <?php echo $dataygngomen["nama_user"];?></a> :</b> <?php echo $datakomentar["isi_komentar"];?>
<style>
.abc{
    color: grey;
    text-decoration: none;
    transition: color 0.2s;
}
.abc:hover{
    color:darkgrey;
    text-decoration: none;
}
</style>
        <?php
        if (@$_SESSION["user"] == @$datapost["penulis_post"]) {
            ?><a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Ini Dari Postingan Kamu?')">X</a><?php
        }
        elseif(@$datakomentar["penulis_komentar"] == @$data2["user_user"]){
            ?><a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Kamu?')">X</a><?php
        }
        ?>        
        
        <hr>
    <?php
    }
}
else{
    echo "<div class='alert alert-danger'>Tidak Ada Komentar</div>";
}

    ?>
    </div>
</div>
            </div>
            <?php
}
            ?>
<?php
include "config.php";
$querypost = mysqli_query($connection, "SELECT*FROM post ORDER BY id_post DESC");
$query1 = mysqli_query($connection, "SELECT*FROM login ORDER BY last DESC");
if ($_SESSION["username"]) {
$dataliatkomen = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM lihat WHERE user_lihat='$_SESSION[username]' AND apa_lihat='komentar'"));
    mysqli_query($connection, "UPDATE login SET status_user='Online' WHERE username='$_SESSION[username]'");
    $query2 = mysqli_query($connection, "SELECT*FROM login WHERE username='$_SESSION[username]'");
    $data2 = mysqli_fetch_array($query2);
?>
<?php
if ($_SESSION["username"]) {
    
?>
<title><?php echo $data2["username"];?> | Beranda - 8.5 Web Grup</title>
<?php
}
else{
    ?>
<title>Beranda - 8.5 Web Grup</title>

    <?php
}
?>
<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Beranda</h1>
                        <h1 class="page-subhead-line"><li class="fa fa-folder"></li> Halo! 
                        <?php
                        date_default_timezone_set("Asia/Jakarta");
                        $d = time();
                        $date = date("G", $d);
                        if ($date >= 0 && $date <= 10) {
                            echo "Selamat Pagi";
                        }
                        elseif ($date >= 11 && $date <= 14) {
                            echo "Selamat Siang";
                        }
                        elseif ($date >= 15 && $date <= 17) {
                            echo "Selamat Sore";
                        }
                        elseif ($date >= 18 && $date <= 23) {
                            echo "Selamat Malam";
                        }
                        ?>

                        <?php
                        if ($_SESSION["username"]) {
                        ?>
                        <b><?php echo $data2["username"];?> (<?php echo $data2["username"];?>)</b>! <a href="./?p=posting&profil=<?php echo $data2["username"];?>"><li class="fa fa-pencil"></li> Buat Postingan</a> Di 8.5 Web Grup
                        <?php
                        }
                        else{
                            ?>
                            <b>Pengunjung</b>!
                            <?php
                        }
                        ?>
                        </h1>

                        
                    </div>
                </div>
<?php
                    if (@$_POST["komenin"]) {
                    $komentarbla = mysqli_real_escape_string($connection, $_POST["ngomen"]);
                    date_default_timezone_set("Asia/Jakarta");
                    $tglkmn = date("G:i d/m/Y");
                    $berhasil = mysqli_query($connection, "INSERT INTO komentar VALUES ('','$_SESSION[username]','$komentarbla','$tglkmn','$datasqlpost[id_post]','$data2[pp_user]','$datasqlpost[penulis_post]','1')");
                    if ($berhasil) {
                        # code...
                    echo "<script>window.location='./?p=beranda#post$datasqlpost[id_post]';</script>";
                    echo "<script>autoload();</script>";
                    }
                    }
                    ?>
                <?php

                $sqlpost = mysqli_query($connection, "SELECT*FROM post ORDER BY id_post DESC");
                while ($datasqlpost = mysqli_fetch_array($sqlpost)) {
                    $datauserpost = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM login WHERE username='$datasqlpost[penulis_post]'"));
                ?>
                <div class="alert alert-info" id="post<?php echo $datasqlpost["id_post"];?>">
                <span style="float:right;"><?php echo $datasqlpost["tanggal_post"];?></span>
                <a href="./?p=post&id=<?php echo $datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>"><h2><b><?php echo $datasqlpost["judul_post"];?></b></h2></a>
                <?php
                if ($datauserpost["pp_user"] == '') {
                ?>
                <a href="./?p=user&user=<?php echo $datasqlpost["penulis_post"];?>"><img src="./assets/img/user/user.jpg" style="width:40px;height:40px;border-radius:100%;"> <b><?php echo $datauserpost["username"];?></b></a>
                <?php
                }
                else{
                ?>
                <a href="./?p=user&user=<?php echo $datasqlpost["penulis_post"];?>"><img src="./assets/img/user/<?php echo $datauserpost["pp_user"];?>" style="width:40px;height:40px;border-radius:100%;"> <b><?php echo $datauserpost["username"];?></b></a>
                <?php
            }
                ?>
                <span style="float:right"><i class="fa fa-comment"></i> : <?php $totalkomentarpost = mysqli_num_rows(mysqli_query($connection,"SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'")); echo $totalkomentarpost;?></span>
                <hr>
 
                    <?php
                    if ($datasqlpost["gambar_post"] !== '') {
                    ?>
                    <center><a href="./assets/img/post/<?php echo $datasqlpost["gambar_post"];?>"><img src="./assets/img/post/<?php echo $datasqlpost["gambar_post"];?>" class="img img-thumbnail"></a></center>
                    <?php
                    }
                    else{

                    }
                    echo $datasqlpost["isi_post"];
                    ?><hr>

                <?php
                $sqllike = mysqli_query($connection, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]'");
                $siapayglike = mysqli_fetch_array($sqllike);
                
                ?>
                <i class="fa fa-thumbs-up"></i> : <?php echo $datasqlpost["suka_post"];?>
                <br><br>
                    <?php
                    $komentarnya = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]' ORDER BY id_komentar ASC LIMIT 3");
                    
                    while ($datakomentarnya = mysqli_fetch_array($komentarnya)) {
                    $ygomen = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM login WHERE username = '$datakomentarnya[penulis_komentar]'"));
                    if ($ygomen["pp_user"] == '') {
                    ?>
                    <img src="./assets/img/user/user.jpg" style="width:20px;height:20px;border-radius:100%"><b><a href="./?p=user&user=<?php echo $datakomentarnya["penulis_komentar"];?>"><?php echo $ygomen["nama_user"];?></a></b> : <?php echo $datakomentarnya["isi_komentar"];?><font style="float:right;"></font><br>
                    <?php
                    }
                    else{
                    ?>
                    <img src="./assets/img/user/<?php echo $ygomen["pp_user"];?>" style="width:20px;height:20px;border-radius:100%"><b><a href="./?p=user&user=<?php echo $datakomentarnya["penulis_komentar"];?>"><?php echo $ygomen["nama_user"];?></a></b> : <?php echo $datakomentarnya["isi_komentar"];?><font style="float:right;"></font><br>
                    <?php
                    }
                }
                $lala = mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'");
                    if (mysqli_num_rows($lala) >= 4) {
                    	$totalngomeng = mysqli_num_rows(mysqli_query($connection, "SELECT*FROM komentar WHERE id_post='$datasqlpost[id_post]'"));
                    	$dikurang = $totalngomeng - 3;
                    echo "<a href='./?p=post&id=$datasqlpost[id_post]&post_by=$datasqlpost[penulis_post]'>Lihat ($dikurang) Komentar Lagi...</a><br>";
                    }
                    if ($_SESSION["username"]) {
                    ?>
                    <span>
                    <br>
                    <?php
                    $datasukapost = @mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM suka_post WHERE id_post='$datasqlpost[id_post]' AND user_suka='$_SESSION[user]'"));
                    if ($datasukapost["post_suka"] == 1) {
        ?>
        <button class="btn btn-danger"  onclick="window.location='./inc/unlike.php?id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';"><i class="fa fa-thumbs-o-up"></i> Tarik Jempol</button>

        <?php
    }
    else{
    ?>
     <button class="btn btn-primary" onclick="window.location='?module=forum_c&id=<?php echo $datasqlpost["id_post"];?>&u=<?php echo $datasqlpost["penulis_post"];?>';"><i class="fa fa-thumbs-o-up"></i> Kasih Jempol</button>
<?php
}
?>
                                    <script>
                $(document).ready(function(){
                    $(".btn<?php echo $datasqlpost["id_post"];?>").click(function(){
                        $("blabla<?php echo $datasqlpost["id_post"];?>").show();
                    });
                });
                </script>
                    -  <button class="btn btn-info btn<?php echo $datasqlpost["id_post"];?>"><i class="fa fa-comment-o"></i> Ngomen</button></span><br><br>
                    <blabla<?php echo $datasqlpost["id_post"];?> hidden>
                    <form method="post" action="./inc/ngomen.php?p=<?php echo $datasqlpost["id_post"];?>&a=<?php echo $datasqlpost["penulis_post"];?>">
                    
                    <input autofocus required style="border:none;width:100%" name="komentari" placeholder="masukan komentar..." type="text"> <input hidden type="submit">
                    </form>

                    </blabla>
                    
                    <?php
                    }
                    else{
                    ?>
                    <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datasqlpost["id_post"];?>&post_by=<?php echo $datasqlpost["penulis_post"];?>"><i class="fa fa-sign-in"></i> Masuk Untuk Ngomen Atau Ngasih Jempol</a>
                    <?php
                    }
                    ?>
                    
                </div>
                <?php
                }
                ?>

                </div>

            </div>
			 <?php
                }
                ?>
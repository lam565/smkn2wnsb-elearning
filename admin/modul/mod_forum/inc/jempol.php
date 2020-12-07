<?php
mysqli_query($db, "UPDATE lihat SET lihat='0' WHERE user_lihat='$_SESSION[username]' AND apa_lihat='like'");
    $useruser = @$_GET["post_user"];
    $userquery = mysqli_query($db, "SELECT*FROM login WHERE username='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>
<title><?php echo $datauseruser["username"];?> | Notifikasi Jempol - 8.5 Web Grup</title>
<?php
if (@$_SESSION["username"] == $useruser) {
    ?>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h3 class="page-head-line">Notifikasi Jempol Pada Postingan</h3>
            <h3 class="page-subhead-line">Jika Pengguna Lain Memberi Jempol Pada Postingan <b><?php echo $data2["username"];?></b>, Maka Akan Tampil Disini</h3>
            
            <div>
                <?php
                $batas = 10;

                if (isset($_GET["hal"])) {
                    $hal = (int)$_GET["hal"];
                    $posisi = ($hal-1)*$batas;
                }
                else{
                    $hal = 1;
                    $posisi = 0;
                }
                $querykomentarnya = mysqli_query($db, "SELECT*FROM suka_post WHERE penulis_post='$data2[username]' AND user_suka !='$_SESSION[username]' ORDER BY id_suka DESC LIMIT $posisi, $batas");
                $hitung = mysqli_num_rows($querykomentarnya);

                if (empty($hitung)) {
                    echo "<div class='alert alert-warning'>Belum Ada Jempol Lagi Di Postingan Kamu</div>";
                }
                else{

                while ($datakomennya = mysqli_fetch_array($querykomentarnya)) {
                    $datakomentar = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM login WHERE username='$datakomennya[user_suka]'"));
                    $queryposnya = mysqli_query($db, "SELECT*FROM post WHERE id_post='$datakomennya[id_post]'");
                    $datapostnya = mysqli_fetch_array($queryposnya);
                    $judulpostnya = $datapostnya["judul_post"];
                    if ($datakomennya["lihat_suka"] == 1) {
                   ?>
                   <div class='alert alert-warning'><small><?php echo $datakomennya["tanggal_suka"];?></small><br><i class='fa fa-thumbs-o-up'></i>  
                   <span class="badge">Baru!</span> <?php
        if ($datakomentar["pp_user"] == '') {
        ?>
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        else{
        ?>
        <img src="./assets/img/user/<?php echo $datakomentar["pp_user"];?>" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        ?><b><a href="./?p=user&user=<?php echo $datakomennya["user_suka"];?>">@<?php echo $datakomennya["user_suka"];?></a></b> Ngasih Jempol Pada Postingan <b><a href="./?p=post&id=<?php echo $datapostnya["id_post"];?>&post_by=<?php echo $datapostnya["penulis_post"];?>"><?php echo $judulpostnya;?></a></b> Kamu</div>
                   <?php
               }
                elseif ($datakomennya["user_suka"] !== $_SESSION["username"]){
                ?>
                <div class='alert alert-info'><small><?php echo $datakomennya["tanggal_suka"];?></small><br><i class='fa fa-thumbs-o-up'></i>
        <b><a href="./?p=user&user=<?php echo $datakomennya["user_suka"];?>"><?php if ($datakomentar["pp_user"] == '') {
        ?>
        <img src="./assets/img/user/user.jpg" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        else{
        ?>
        <img src="./assets/img/user/<?php echo $datakomentar["pp_user"];?>" style="width:25px;height:25px;border-radius:100%;">
        <?php
        }
        ?>@<?php echo $datakomennya["user_suka"];?></a></b> Ngasih Jempol Pada Postingan <b><a href="./?p=post&id=<?php echo $datapostnya["id_post"];?>&post_by=<?php echo $datapostnya["penulis_post"];?>"><?php echo $judulpostnya;?></a></b> Kamu</div>
                <?php
            }
            }
                }
                $hitung2 = mysqli_num_rows(mysqli_query($db, "SELECT*FROM suka_post WHERE penulis_post='$_SESSION[user]'"));
                $bagi = ceil($hitung2/$batas);
                for ($i=1; $i <= $bagi ; $i++) { 
                    if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?p=jempol&post_user=$_SESSION[user]&hal=$i'><span class='badge'>$i</span></a> ";
                                }
                }
                mysqli_query($db, "UPDATE suka_post SET lihat_suka='0' WHERE penulis_post='$_SESSION[user]'");
                ?>
            </div>
            </div>
        </div>
    </div>
<?php
}
else{
echo "<script>window.location='./?p=jempol&post_user=$_SESSION[user]';</script>";
}
            ?>
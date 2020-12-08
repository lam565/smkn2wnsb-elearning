<?php
include 'config-konek.php';
session_start();
if (@$_SESSION["username"]) {
	$id = @$_GET["id"];
	$p = @$_GET["u"];
	$id_det_kurikulum = @$_GET["id_det_kurikulum"];
	$query = mysqli_query($connection, "SELECT*FROM post WHERE id_post='$id'");
	$data = mysqli_fetch_array($query);
	$suka = $data["suka_post"];
	$tambah = $suka + 1;
	$datapos = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM suka_post WHERE user_suka='$_SESSION[username]' AND id_post='$id'"));
	if ($datapos["post_suka"] == 1) {
		header("location:../?p=post&id=$id&post_by=$p");
	}
	else{

	$ubah = mysqli_query($connection, "UPDATE post SET suka_post='$tambah' WHERE id_post='$id'");
	$ubah2 = mysqli_query($connection, "UPDATE suka_post SET post_suka='$tambah' WHERE user_suka='$_SESSION[username]' AND id_post='$id'");
	if ($ubah) {
		date_default_timezone_set("Asia/Jakarta");
		$d = date("G:i d/m/Y");
		mysqli_query($connection, "INSERT INTO suka_post VALUES('','$_SESSION[username]','$id','1','$data[penulis_post]','$d','1')");
		mysqli_query($connection, "UPDATE lihat SET lihat='1' WHERE apa_lihat='like' AND user_lihat='$p' AND user_lihat != '$_SESSION[username]'");
		mysqli_query($connection, "UPDATE post SET lihat_post='1' WHERE penulis_post='$p'");
		header("location:../?p=beranda&id_det_kurikulum=$id_det_kurikulum");
	}
	else{
		header("location:../?p=beranda&id_det_kurikulum=$id_det_kurikulum");
	}
}
	}
else{
		header("location:../login");

}
?>
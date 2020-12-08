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
	$tambah = $suka - 1;
	$datapos = mysqli_fetch_array(mysqli_query($connection, "SELECT*FROM suka_post WHERE user_suka='$_SESSION[username]' AND id_post='$id'"));
	if ($datapos["post_suka"] == 1) {
	$ubah = mysqli_query($connection, "UPDATE post SET suka_post='$tambah' WHERE id_post='$id'");
	$ubah2 = mysqli_query($connection, "UPDATE suka_post SET post_suka='$tambah' WHERE user_suka='$_SESSION[username]' AND id_post='$id'");
	if ($ubah) {
		mysqli_query($connection, "DELETE FROM suka_post WHERE username='$_SESSION[username]' AND id_post='$id'");
		header("location:../?p=beranda&id_det_kurikulum=$id_det_kurikulum");
	}
	else{
		header("location:../?p=beranda&id_det_kurikulum=$id_det_kurikulum");
	}
	}
	else{
		header("location:../?p=beranda&id_det_kurikulum=$id_det_kurikulum");
}
}
else{
		header("location:../login");

}
?>
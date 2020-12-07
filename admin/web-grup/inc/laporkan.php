<?php
	include 'config-konek.php';
	$id = @$_GET["id"];

		date_default_timezone_set("Asia/Jakarta");
		$d = date("Y-m-d H:i:s");
		mysqli_query($connection, "UPDATE post SET laporkan='1',tgl_lapor='$d' WHERE id_post='$id'");
		header("location:../?p=beranda#post$id");
	
	
?>
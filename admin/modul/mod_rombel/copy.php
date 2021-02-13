<?php 

if (isset($_GET['action']) AND $_GET['action'] == 'salindata') {

	
	
	echo "<script>alert('Berhasil'); window.location = '../../media.php?module=rombel&kls=$_GET[kd_kelas]'</script>";
}

?>
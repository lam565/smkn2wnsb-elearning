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
include "config.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = '../../index.php';</script>";
}
    else{

?>

<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
	$sql = $connection->query("SELECT * FROM kelas WHERE kd_kelas='$_GET[key]'");
	$row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($update) {
		$sql = "UPDATE kelas SET nama_kelas='$_POST[nama_kelas]',tingkat='$_POST[tingkat]',kd_jurusan='$_POST[kd_jurusan]' WHERE kd_kelas='$_GET[key]'";
	} else {
		$sql = "INSERT INTO kelas VALUES ('$_POST[kd_kelas]', '$_POST[nama_kelas]', '$_POST[tingkat]', '$_POST[kd_jurusan]')";
	}
  if ($connection->query($sql)) {
    echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
  } else {
		echo "<script>alert('Gagal'); window.location = 'media.php?module=kelas'</script>";
  }
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM kelas WHERE kd_kelas='$_GET[key]'");
	echo "<script>alert('Berhasil'); window.location = 'media.php?module=kelas'</script>";
}
?>

<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">SELAMAT DATANG DI DASHBOARD ADMINISTRATOR</h4>
                
                            </div>

        </div>
	   <div class="row">
                 
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                            Pelaporan (Adanya unsur sara, tidak berkaitan dengan KBM ataupun perkataan yang tidak sesuai norma)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
											 <th>Tanggal Lapor</th>
											<th>Judul Postingan</th>
											<th>Tanggal Postingan</th>
											 <th>Penulis Postingan</th>
											 <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no = 1; ?>
	                    <?php if ($query = $connection->query("SELECT * FROM post where laporkan='1' order by tgl_lapor")): ?>
	                        <?php while($row = $query->fetch_assoc()): ?>
                                        <tr>
                                            <td></td>
                                            <td><?=$no++?></td>
                                            <td><?=$row['tgl_lapor']?></td>
                                            <td><?=$row['judul_post']?></td>
											<td><?=$row['tanggal_post']?></td>
											<td><?=$row['penulis_post']?></td>
											<td class="hidden-print">
	                                <div class="btn-group">
	                                    <a href="../admin/web-grup/?p=post&id=<?=$row['id_post']?>&post_by=<?=$row['penulis_post']?>" class="btn btn-warning btn-xs">Tinjau Postingan</a>
	                                    
	                                </div>
	                            </td>
                                           
                                        </tr>
                                        <?php endwhile ?>
	                    <?php endif ?>
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
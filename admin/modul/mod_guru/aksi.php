<?php 
//koneksi ke database, username,password  dan namadatabase menyesuaikan
include "../../../system/koneksi.php";
require "../../../assets/excel_reader2.php";

$target = basename($_FILES['filesoal']['name']) ;
move_uploaded_file($_FILES['filesoal']['tmp_name'], $target);
$data = new Spreadsheet_Excel_Reader($_FILES['filesoal']['name'],false);
//menghitung jumlah baris file xls
$baris = $data->rowcount($sheet_index=0);
//import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
for ($i=2; $i<=$baris; $i++)
{
//menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah
//jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
	$barisreal = $baris-1;
	$k = $i-1;

//membaca data (kolom ke-1 sd terakhir)
	$now=date("Y-m-d H:i:s");
	$k="GR";
	$qgru="SELECT MAX(kd_guru) AS kode FROM guru";
	$max=mysqli_fetch_array(mysqli_query($connect,$qgru));
	$kodeurut=substr($max['kode'],2,3)+1;
	if ($kodeurut<10) {
		$kodeurut="00".$kodeurut;
	} else if ($kodeurut<100){
		$kodeurut="0".$kodeurut;
	}
	$kd_guru=$k.$kodeurut;

	$username   = $data->val($i, 1);
	$level = "guru";
	$password = md5("1234");
	$status= "Aktif";
	$nama  = $data->val($i, 2);
	$kelamin = $data->val($i, 3);
	$email = $data->val($i, 4);


//setelah data dibaca, masukkan ke tabel login
	$qlogin="INSERT INTO login (username,password,level,last,status) VALUES ('$username','$password','$level','$now','aktif')";
	$ins=mysqli_query($connect,$qlogin);
	if ($ins) {
		$insquru="INSERT INTO guru (kd_guru,username,nama,email,status) VALUES ('$kd_guru','$username','$nama','$email','$status')";
		$inssis=mysqli_query($connect,$insquru);
	}
}
unlink($_FILES['filesoal']['name']);
echo "<script>alert('Berhasil menambahkan $barisreal data guru'); location='../../media.php?module=guru'</script>";
?>
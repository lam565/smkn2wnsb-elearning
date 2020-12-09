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
	$nis   = $data->val($i, 1);
	$level = "siswa";
	$password = md5($nis);
	$status= "Aktif";
	$nama   = $data->val($i, 2);
	$kelamin  = $data->val($i, 3);
	$email = $data->val($i, 4);


//setelah data dibaca, masukkan ke tabel login
	$qlogin="INSERT INTO login (username,password,level,last,status) VALUES ('$nis','$password','$level','$now','aktif')";
	$ins=mysqli_query($connect,$qlogin);
	if ($ins) {
		$qsiswa="INSERT INTO siswa (nis,nama,username,kelamin,email,status) VALUES ('$nis','$nama','$nis','$kelamin','$email','Aktif')";
		$inssis=mysqli_query($connect,$qsiswa);
	}
}
unlink($_FILES['filesoal']['name']);
echo "<script>alert('Berhasil menambahkan $barisreal data siswa'); location='../../media.php?module=siswa'</script>";
?>
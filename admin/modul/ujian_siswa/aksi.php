<?php 
include "../../../system/koneksi.php";

$pilihan=$_POST["pil"];
$kd_detail_soal=$_POST['id'];
$kd_ujian=$_POST['kd_ujian'];
$nis=$_POST['nis'];

$score=0;
$benar=0;
$salah=0;
$jumlah_soal=0;

foreach ($pilihan as $id => $pil) {
	$query=mysqli_query($connect,"select kd_detail_soal from detail_soal where kd_detail_soal='$id' and kunci='$pil'")or die ("error".mysqli_error($connect));
	$cek=mysqli_num_rows($query);
	if ($cek>0) {
		$benar++;
	} else {
		$salah++;
	}
	$jumlah_soal++;	
}
$score=100/$jumlah_soal*$benar;

$tgl_kerja=date("Y-m-d H:i:s");
//buat kode tugas 08
$thn=date("Y");
$k="08".$thn.$nis;
$qcek="SELECT MAX(kd_nilai_ujian) AS kode FROM nilai_ujian WHERE kd_nilai_ujian LIKE '$k%'";
$max=mysqli_fetch_array(mysqli_query($connect,$qcek));
$kodeurut=substr($max['kode'],strlen($k),3)+1;
if ($kodeurut<10) {
	$kodeurut="00".$kodeurut;
} else if ($kodeurut<100){
	$kodeurut="0".$kodeurut;
}
$kd_nilai_ujian=$k.$kodeurut;

$qins="INSERT INTO nilai_ujian VALUES ('$kd_nilai_ujian','$nis','$kd_ujian','$tgl_kerja','$score','$salah','$benar')";
$nil=mysqli_query($connect,$qins);
if ($nil) {
	if ($score>=75){
		echo "<script>alert('Selamat anda mendapatkan nilai $score'); location='../../media.php?module=detailujian&kd=$kd_ujian'</script>";
	} else if ($score>=50) {
		echo "<script>alert('Anda mendapatkan nilai $score'); location='../../media.php?module=detailujian&kd=$kd_ujian'</script>";
	} else {
		echo "<script>alert('Nilai Anda $score, Belajarlah lebih giat'); location='../../media.php?module=detailujian&kd=$kd_ujian'</script>";
	}
} else {
	echo "<script>alert('$kd_ujian'); location='../../media.php?module=detailujian&kd=$kd_ujian'</script>";
}

?>
<?php

include_once"system/koneksi.php";

function anti_injection($data) {
    $filter = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter;
}

$username = $_POST['username'];
$pass = md5($_POST['password']);

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR ! ctype_alnum($pass)) {
    echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
} else {
    $login_adm = mysqli_query($connect,"SELECT * FROM login WHERE username='$username' AND password = '$pass' AND status='Aktif'" );
    $ketemu = mysqli_num_rows($login_adm);
    $r = mysqli_fetch_array($login_adm);


// Apabila username dan password ditemukan
    if ($ketemu > 0) {
        session_start();
        include "system/timeout.php";
        $_SESSION[username] = $r['username'];
        $_SESSION[level] = $r['level'];

        if ($r['level']=='guru') {
            $qkd="SELECT kd_guru FROM guru WHERE username='$r[username]'";
            $kd=mysqli_query($connect,$qkd);
            $kode=mysqli_fetch_array($kd);
            $_SESSION[kode]=$kode['kd_guru'];
        } else if ($r['level']=='siswa') {
            $qkd="SELECT nis FROM siswa WHERE username='$r[username]'";
            $kd=mysqli_query($connect,$qkd);
            $kode=mysqli_fetch_array($kd);
            $_SESSION[kode]=$kode['nis'];
        }

        // session timeout
        $_SESSION[login] = 1;
        timer();


        header('location:admin/media.php?module=home');

    } else {
        echo "<script>alert('Maaf! Username atau Password anda salah, mohon diulangi kembali'); window.location = 'index.php';</script>";
    }
}
?>

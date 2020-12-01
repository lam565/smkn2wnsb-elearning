<?php 
if (isset($_GET['materi'])) {
    $filename    = $_GET['materi'];

    $back_dir    ="../../files/materi/";
    $file = $back_dir.$_GET['materi'];

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    } 
    else {
        $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
        header("location:../../media.php?module=materi");
    }
}
?>

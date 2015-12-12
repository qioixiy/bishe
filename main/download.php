<?php

function downloadFile($filepath) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($filepath));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: '.filesize($filepath));
    readfile($filepath);
}
if(isset($_GET["filename"])) {
    $filename =  $_GET["filename"];
    $filepath = "../data/upload/" . $filename;
    if(file_exists($filepath)) {
        downloadFile($filepath);
    } else {
        echo "<script>alert('$filename is not exists'); history.go(-1);</script>";
    }
} else {
    echo "<script>alert('submit faield'); history.go(-1);</script>";
}
?>
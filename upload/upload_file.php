<?php

require_once("../db/conn.php");

$retString="";

if (true/*(($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 20000)//*/) {
    if ($_FILES["file"]["error"] > 0) {
        $retString = "Err Code:" . $_FILES["file"]["error"];
    } else {
        $Debug = false;
        if($Debug) {
            $retString = "Upload: " . $_FILES["file"]["name"] .
            "Type: " . $_FILES["file"]["type"] .
            "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb" .
            "Temp file: " . $_FILES["file"]["tmp_name"];
        }

	$filename = $_FILES["file"]["name"];
	$size = $_FILES["file"]["size"];
        $tmp_filename = $_FILES["file"]["tmp_name"];
        $dest_filename = "../data/upload/" . $_FILES["file"]["name"];
        if (file_exists($dest_filename)) {
            $err = 0;
            $retString = $_FILES["file"]["name"] . " already exists.";
        } else {
            if (move_uploaded_file($tmp_filename, $dest_filename)) {
                $retString = "Stored in: " . $dest_filename;
		$mysqli = mysqli_new();
		$md5 = md5_file($dest_filename);
		$sql="INSERT INTO `uploadStatus`(`filename`, `size`, `version`, `md5`) VALUES ('$filename', '$size', '$filename', '$md5')";
		$result = mysqli_obj_query($mysqli, $sql);
            } else {
                $err = 1;
                $retString = "move_uploaded_file error";
            }
        }
    }
} else {
    $err = 1;
    $retString = "Invalid file";
}

echo "<script>alert('$retString'); location='/main/'; history.go(-1);</script>";
?>

<?php

if (true/*(($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 20000)//*/) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        $Debug = false;
        if($Debug) {
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        }

        $tmp_filename = $_FILES["file"]["tmp_name"];
        $dest_filename = "../data/upload/" . $_FILES["file"]["name"];
        if (file_exists($dest_filename)) {
            echo $dest_filename . " already exists.";
        } else {
            if (move_uploaded_file($tmp_filename, $dest_filename)) {
                echo "Stored in: " . $dest_filename;
            } else {
                echo "move_uploaded_file error";
            }
        }
    }
} else {
    echo "Invalid file";
}

?>
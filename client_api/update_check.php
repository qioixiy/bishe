<?php

require_once("../db/conn.php");

$mysqli = mysqli_new();
$sql="SELECT * FROM `uploadStatus` WHERE time = (SELECT max( time ) FROM `uploadStatus` )";
$result = mysqli_obj_query($mysqli, $sql);

if (is_null($result) || (1 != $result->num_rows)) {
	$ret = "query failed";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
        	echo json_encode($row);
	}
}
echo $ret;
?>

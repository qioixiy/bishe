<?php

require_once("../common/list.php");

$arr = listDir("../data/upload", 1, array());
echo json_encode($arr);

?>
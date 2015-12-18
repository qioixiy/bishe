<?php

require_once("../common/list.php");

$obj = new stdClass();
$arr = listDir("../data/upload", 1, array());
$obj->title = "file_list";
$obj->arr = $arr;
echo json_encode($obj);

?>
<?php

require('connectvars.php');
#mysql_connect("localhost","root","password");
#mysql_select_db("ecu");
function mysqli_new() {
    return new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}

function mysqli_obj() {
    $obj = new stdClass();
    $obj->status = "connecting";

    $mysqli = mysqli_new();
    /* check connection */
    if ($mysqli->connect_errno) {
        $obj->reason = "Failed to connect to MySQL: " . $mysqli->connect_errno . $mysqli->connect_error;
        $obj->status = "error";
    } else {
        $obj->status = "ok";
        $obj->host_info = $mysqli->host_info;
    }

    $obj->version = array ('master'=>1,'subversion'=>2,'patch'=>3);
    $obj->body = 'another post';
    $obj->Token = md5(uniqid(rand()));
    
    //echo (json_encode($obj));
    
    return $obj;
}

function mysqli_obj_query($mysqli, $sql)
{
    //echo $sql;

    /* Select queries return a resultset */
    if ($result = $mysqli->query($sql)) {
        return $result;
    } else {
        return null;
    }
}
?>
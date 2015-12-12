<?php
function update_session($username) {
    //echo $username;
    setcookie("username", $username, time()+3600, "/");
    // Print a cookie
    //echo $_COOKIE["username"];
    // A way to view all cookies
    //print_r($_COOKIE);

    $_SESSION['username']=$username;   
}

function get_username() {
    if (isset($_COOKIE["username"])) {
        return $_COOKIE["username"];
    } else {
        return "guest";
    }
}
?>
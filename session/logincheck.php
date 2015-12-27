<?php

require_once("../db/conn.php");

#echo file_get_contents("php://input");
#echo $_POST["username"];
#echo $_POST["password"];
$username = $_POST["username"];
$password = $_POST["password"];
$token = null;
$obj = new stdClass();
function check_username_password($username, $password, &$ret_token)
{
	$ret = null;
	$mysqli = mysqli_new();
	$sql = "select * from manager where name='root' and password='password'";
	$sql = "select * from users where username='$username'and password='$password'";
	$result = mysqli_obj_query($mysqli, $sql);
	if (is_null($result) || (1 != $result->num_rows)) {
		$ret = "username or password was not right";
	}
	else {
		require_once("./session.php");
		update_session($username);
		while ($row = mysqli_fetch_assoc($result)) {
			//echo json_encode($row);
			$token = md5(uniqid(rand()));
			$ret_token = $token;
			$sql="INSERT INTO `loginStatus`(`username`, `token`) VALUES ('$username', '$token')";
			$result = mysqli_obj_query($mysqli, $sql);
			$ret = "ok";
			break;
		}
	}
	/* free result set */
	//$result->free();
	$mysqli->close();
	
	return $ret;
}

function user_login($username, $password) {
        if($username == "") {
                echo "<script>alert('please input your username'); history.go(-1);</script>";
        } else if ($password == "") {
                echo "<script>alert('please input your password'); history.go(-1);</script>";
        } else {
                $result = check_username_password($username, $password, $token);
                if ("ok" == $result) {
                        echo "<script language='javascript'>";
                        echo " location='/main/index.php';";
                        echo "</script>";
                } else {
                        echo "<script>alert('$result'); history.go(-1);</script>";
                }
        }
}

function user_signup($username, $password) {
        if($username == "") {
                echo "<script>alert('please input your username'); history.go(-1);</script>";
        } else if ($password == "") {
                echo "<script>alert('please input your password'); history.go(-1);</script>";
        } else {
                $result = check_username_password($username, $password, $token);
                if ("ok" == $result) {
                        echo "<script language='javascript'>";
                        echo " location='/main/footer.php';";
                        echo "</script>";
                } else {
                        echo "<script>alert('$result'); history.go(-1);</script>";
                }
        }
}

if(isset($_POST["submit"])) {
	$submit_type = $_POST["submit"];
	if ($submit_type == "Login" ) {
		user_login($username, $password);
	} else if ($submit_type == "SignUp") {
		user_signup($username, $password);
	}
} else if (isset($_POST["device"])) {

	if($username == "") {
		$obj->status = 'error';
		$obj->errString = 'please input your username';
	} else if ($password == "") {
		$obj->status = 'error';
		$obj->errString = 'please input your password';
	} else {
		$result = check_username_password($username, $password, $token);
		$obj->username = $username;
		if ($result == 'ok') {
			$obj->status = $result;
			$obj->token = $token;
			$obj->errString = null;
		} else {
			$obj->status = 'error';
			$obj->token = null;
			$obj->errString = $result;
		}
	}
	echo json_encode($obj);
} else {
	echo "<script>alert('submit faield'); history.go(-1);</script>";
}

?>

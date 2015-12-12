<?php
function check_username_password($username, $password)
{
	$mysqli = mysqli_new();
	$sql = "select * from manager where name='root' and password='password'";
	$sql = "select * from users where username='$username'and password='$password'";
	$result = mysqli_obj_query($mysqli, $sql);
	if (is_null($result) || (1 != $result->num_rows)) {
		return "username or password was not right";
	}
	else {
		require_once("./session.php");
		update_session($username);
		while ($row = mysqli_fetch_assoc($result)) {
			//echo json_encode($row);
			return "ok";
			break;
		}
	}
	/* free result set */
	$result->close();
}
	require_once("../db/conn.php");

	#echo file_get_contents("php://input");
	#echo $_POST["username"];
    #echo $_POST["password"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	if(isset($_POST["submit"]))	{
		if($username == "") {
			echo "<script>alert('please input your username'); history.go(-1);</script>";
		} else if ($password == "") {
			echo "<script>alert('please input your password'); history.go(-1);</script>";
		} else {
			$result = check_username_password($username, $password);
			if ("ok" == $result) {
				echo "<script language='javascript'>";
				echo " location='/main/index.php';";
				echo "</script>";
			} else {
				echo "<script>alert('$result'); history.go(-1);</script>";
			}
		}
	} else if (isset($_POST["device"])) {
		if($username == "") {
			echo json_encode('please input your username');
		} else if ($password == "") {
			echo json_encode('please input your password');
		} else {
			$result = check_username_password($username, $password);
			echo json_encode($result);
		}
	} else {
		echo "<script>alert('submit faield'); history.go(-1);</script>";
	}
?>

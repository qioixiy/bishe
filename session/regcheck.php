<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
	require_once("../db/conn.php");
	if(isset($_POST["submit"]) && $_POST["submit"] == "Signup") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		if($username == "" || $password == "" || $email == "") {
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		} else {
			#mysql_query("set names 'gdk'");
			$sql = "select * from users where username='" . $username . "'";
                	$result = mysqli_obj_query(mysqli_new(), $sql);
			$num = $result->num_rows;
			if($num) {
				echo "<script>alert('用户名已存在'); history.go(-1);</script>";
			} else {
                		$sql = "INSERT INTO users(username, password, email) VALUES ('$username', '$password', '$email')";
				$result = mysqli_obj_query(mysqli_new(), $sql);
				if($result) {
					echo "<script>alert('注册成功！'); history.go(-1);</script>";
				} else {
					echo "<script>alert(''注册失败！'); history.go(-1);</script>";
				}
			}
		}
     } else {
         echo "<script>alert('提交未成功！'); history.go(-1);</script>";
     }
?>

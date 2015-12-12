<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
     require_once("../db/conn.php");
     if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册") {
		$user = $_POST["username"];
		$password = $_POST["password"];
		$psw_confirm = $_POST["confirm"];
        #echo $user . $password;
		if($user == "" || $password == "" || $psw_confirm == "") {
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		} else {
			if($password == $psw_confirm) {
				#mysql_query("set names 'gdk'");
                $sql = "select * from users where username='" . $user . "'";
                $result = mysqli_obj_query(mysqli_new(), $sql);
				$num = $result->num_rows;
				if($num) {
					echo "<script>alert('用户名已存在'); history.go(-1);</script>";
				} else {
                    $sql = "INSERT INTO users(username, password) VALUES ('$user', '$password')";
                    $result = mysqli_obj_query(mysqli_new(), $sql);
					if($result)	{
						echo "<script>alert('注册成功！'); history.go(-1);</script>";
					} else {
						echo "<script>alert(''注册失败！'); history.go(-1);</script>";
					}
				}
			} else {
				echo "<script>alert('密码不一致！'); history.go(-1);</script>";
			}
		}
     } else {
         echo "<script>alert('提交未成功！'); history.go(-1);</script>";
     }
?>

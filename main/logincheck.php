<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>

<?php
	require_once("../db/conn.php");

	#echo file_get_contents("php://input");
	if(isset($_POST["submit"]))	{
        #echo $_POST["username"];
        #echo $_POST["password"];
		$user = $_POST["username"];
		$password = $_POST["password"];
		if($user == "") {
			echo "<script>alert('请输入用户名！'); history.go(-1);</script>";
		} else if ($password == "") {
			echo "<script>alert('请输入密码！'); history.go(-1);</script>";
		} else {
			$mysqli = mysqli_new();
			#$sql = "select * from manager where name='root' and password='password'";
			$sql = "select * from manager where username='" . $user . "'and password='" . $password . "'";
			$result = mysqli_obj_query($mysqli, $sql);
			if (is_null($result)
                || (1 != $result->num_rows)) {
				echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
			} else {
        		while ($row = mysqli_fetch_assoc($result)) {
		            echo json_encode($row);
		        }
		    }
            /* free result set */
            $result->close();
		}
	} else {
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}
?>

</body>
</html>
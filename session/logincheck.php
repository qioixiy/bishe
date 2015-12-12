<?php
	require_once("../db/conn.php");

	#echo file_get_contents("php://input");
	if(isset($_POST["submit"]))	{
        #echo $_POST["username"];
        #echo $_POST["password"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		if($username == "") {
			echo "<script>alert('please input your username'); history.go(-1);</script>";
		} else if ($password == "") {
			echo "<script>alert('please input your password'); history.go(-1);</script>";
		} else {
			$mysqli = mysqli_new();
			#$sql = "select * from manager where name='root' and password='password'";
			#$sql = "select * from users where username='" . $username . "'and password='" . $password . "'";
			$sql = "select * from users where username='$username'and password='$password'";
			$result = mysqli_obj_query($mysqli, $sql);
			if (is_null($result)
                || (1 != $result->num_rows)) {
				echo "<script>alert('username or password was not right');history.go(-1);</script>";
				exit(-1);
			} else {
			    require_once("./session.php");
			    update_session($username);
        		while ($row = mysqli_fetch_assoc($result)) {
		    		//echo json_encode($row);
				    echo "<script language='javascript'>"; 
				    echo " location='/main/index.php';";
				    echo "</script>";
				    break;
		        }
		    }
            /* free result set */
            $result->close();
		}
	} else {
		echo "<script>alert('submit faield'); history.go(-1);</script>";
	}
?>

<?php
session_start();

if(isset($_SESSION['username']))
    $_SESSION['username']=$_SESSION['username']+1;
else
    $_SESSION['username']=1;
echo "username=". $_SESSION['username'];
?>

<?php
require_once("./db/conn.php");

$username = "";
$password = "";
#echo file_get_contents("php://input");
if(isset($_POST['username'])) {
    $username = $_POST['username'];
} else {
    $username = "";
}

if(isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = "";
}
$sql = "SELECT * FROM `users` LIMIT 0 , 30";
$result = mysqli_obj_query(mysqli_new(), $sql);
if( is_null($result)) {
    echo "is_null";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
	/* free result set */
    $result->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel='stylesheet' type='text/css' href='./css/index.css'>
    <style type="text/css"> 
    @import url(http://fonts.googleapis.com/css?family=Roboto:100);
    @import url(http://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css);

    </style>
</head>
<body>
    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Login</a>
                </li>
                <li>
                    <a href="#register">Register</a>
                </li>
                <li>
                    <a href="#reset">Reset Password</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Login</h1>
                <p>
                    Login please:</br>
                        username password
                </p>
                <form action="/main/logincheck.php" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Login" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                <p>
                    You should totally sign up for our super awesome service.
                    It's what all the cool kids are doing nowadays.
                </p>
                <form>
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
            <div id="reset" class="form-action hide">
                <h1>Reset Password</h1>
                <p>
                    To reset your password enter your email and your birthday
                    and we'll send you a link to reset your password.
                </p>
                <form>
                    <ul>
                        <li>
                            <input type="text" placeholder="Email" />
                        </li>
                        <li>
                            <input type="text" placeholder="Birthday" />
                        </li>
                        <li>
                            <input type="submit" value="Send" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>

</body>
</html>

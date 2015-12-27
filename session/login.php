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
	<link rel='stylesheet' type='text/css' href='/css/index.css'>
    <style type="text/css"> 
    @import url(http://fonts.googleapis.com/css?family=Roboto:100);
    @import url(http://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css);
    </style>

</head>
<body>
    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li><a href="#login" class="active">登录</a></li>
                <li><a href="#register">注册</a></li>
                <li><a href="#reset">忘记密码</a></li>
            </ul>
            <div id="login" class="form-action show">
                <p>请输入用户名密码</p>
                <form action="./logincheck.php" method="post">
                    <ul>
                        <li><input type="text" name="username" placeholder="用户名" /></li>
                        <li><input type="password" name="password" placeholder="密码" /></li>
                        <li><input type="submit" name="submit" value="Login" class="button" /></li>
                    </ul>
                </form>
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <p>注册新的用户名</p>
                <form action="./regcheck.php" method="post">
                    <ul>
                        <li><input type="text" name="username" placeholder="用户名" /></li>
                        <li><input type="password" name="password" placeholder="密码" /></li>
			<li><input type="text" name="email" placeholder="邮箱" /></li>
                        <li><input type="submit" name="submit" value="Signup" class="button" /></li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
            <div id="reset" class="form-action hide">
                <p>重置密码，发送新的密码到邮箱</p>
                <form>
                    <ul>
                        <li><input type="text" name="username" placeholder="用户名" /></li>
                        <li><input type="text" name="email" placeholder="邮箱" /></li>
                        <li><input type="submit" name="submit" value="Reset" class="button" /></li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
        </div>
    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/index.js"></script>
</body>
</html>

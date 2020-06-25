<?php 
	// gọi file adminlogin
	include '../classes/AdminLoginDB.php';
 ?>
 <?php
 	// gọi class adminlogin
 	$class = new adminlogin(); 
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 		$adminUser = $_POST['adminUser'];
 		$adminPass = md5($_POST['adminPass']);

 		$login_check = $class -> login_admin($adminUser,$adminPass); // hàm check User and Pass khi submit lên

 	}
  ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
	<link href="css/background.css" rel="stylesheet" type="text/css">
</head>
<body class="background">
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span><?php 
				if(isset($login_check)){
					echo $login_check;
				}
			 ?>  </span>
			<div>
				<input type="text" placeholder="Tài khoản" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Mật khẩu" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Đăng nhập" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
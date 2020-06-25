<?php 
    session_start();
    include ("config/connect.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link href="admin/css/background.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Đăng nhập </title>
	<link href="css/login.css" rel="stylesheet" type="text/css" media="all"/>
    <script>
        function validate() {
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            var error1 = document.getElementById("error");
            if (email.value == "" || password.value == "") {

                error1.innerHTML = "Vui lòng điền đầy đủ thông tin! ";

            } else {
                true;
            }
        }
        function forgotPass() {
            var username = document.getElementById("username");
            username.remove();
            var user = document.getElementById("userid");
            user.remove();
            var pwd = document.getElementById("pwd1")
            pwd.innerHTML = "Enter Your Email Address";
            var btn = document.getElementById("btn");
            btn.value = "Send Recovery Link";
            var tag = document.getElementById("tag")
            tag.innerHTML = "";
        }
    </script>
</head>
<body class="background">

<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = MD5($_POST['pwd']);
    $sql_check = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE email = '$email'");
    $dem = mysqli_num_rows($sql_check);
    if($dem == 0)
    {
        $_SESSION['thongbaolo'] = "Tài khoản không tồn tại";
		echo"
				<script language='javascript'>
					alert('Tài khoản không tồn tại');
					window.open('index.php','_self', 1);
				</script>
			";
    }
    else
    {
        $sql_check2 = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'");
        $dem2 = mysqli_num_rows($sql_check2);
        if($dem2 == 0)
			echo "
                    <script language='javascript'>
                        alert('Mật khẩu đăng nhập không đúng');
                        window.open('index.php','_self', 1);
                    </script>
                ";
        else
        {
            $row = mysqli_fetch_assoc($sql_check2);
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];  
            echo "
                        <script language='javascript'>
                            alert('Đăng nhập thành công');
                            window.open('index.php','_self', 1);
                        </script>
                    ";
        }
    }
}    
?>
    <form action="login.php" method="POST" id="form" class="login-form">
		<h1>ĐĂNG NHẬP </h1>
		<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    	?>
        <span id="error" style="background-color: red;"></span>
        <div class="txtb">
            <h5 id="emailid">Email:</h5>
            <input type="email" name="email" required placeholder="Nhập email của bạn"/>
        </div>
        <div class="txtb">
            <h5 id="pwd1">Mật khẩu:</h5>
            <input type="password" name="pwd" required placeholder="Nhập mật khẩu" id="passwordField"/>
            
        </div>
        <div class="togglePassword";align="right";>
            <input type="checkbox" onclick="togglePasswordVisibility()">Hiện mật khẩu
        </div>
        <p>
            </br>
            <input type="checkbox" id="checkbox" /><span>Nhớ tài khoản</span>
            <span class="forgot"><a href="" onClick="forgotPass(); return false" id="tag">Quên mật khẩu?</a></span>
        </p>
        <input id="btn" type="submit" value="Đăng nhập" name="login" onClick="validate(); return false">
        <p>
            Chưa có tài khoản?<a href="#">Đăng ký ngay</a>
        </p>
    </form>
    <script type="text/javascript">
        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        })
        $(".txtb input").on("blur", function() {
            if ($(this.val() == ""))
                $(this).removeClass("focus");
        })
    </script>
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script>
    function togglePasswordVisibility() {
        var x = document.getElementById("passwordField");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>
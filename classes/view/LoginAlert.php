<?php
    class LoginAlert {
        public function alertSuccess(){
			echo"
                <script language='javascript'>
                alert('Đăng nhập thành công');
                window.open('index.php','_self', 1);
            	</script>
            ";
		}
		public function alertFail(){
			$_SESSION['thongbaolo'] = "Tài khoản không tồn tại!";
			echo"
                <script language='javascript'>
                alert('Sai thông tin đăng nhập!');
                window.open('index.php','_self', 1);
                </script>
            ";
		}
		public function alertEmpty(){
			echo"
                <script language='javascript'>
                alert('Email và mật khẩu không được để trống!');
                </script>
            ";
        }
    }
?>
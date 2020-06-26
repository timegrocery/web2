<?php session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
echo "
		<script language='javascript'>
			alert('Đăng xuất thành công');
			window.open('index.php','_self', 1);
		</script>
	";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đang tải</title>
</head>
<body>

</body>
</html>
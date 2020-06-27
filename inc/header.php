
<?php
	session_start();
    include 'lib/session.php';
    Session::init();
?>
<?php
    function auto_version($file) {
        if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
            return $file;

        $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
        return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
    }
?>
<?php	
	include 'lib/database.php';
	include 'helpers/format.php';
	spl_autoload_register(function($class){
	include_once "classes/".$class.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cs = new customer();
	$cat = new category();
	$product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE php>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="<?php echo auto_version('css/style.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo auto_version('css/menu.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>

<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo auto_version('fontawesome/css/all.css'); ?>">
<link href="<?php echo auto_version('admin/css/background.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo auto_version('bootstrap/css/bootstrap.min.css'); ?>">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body class="background">
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png"></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action= "search.php" method="post">
						<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
						<input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="Giỏ hàng" rel="nofollow">
							<span class="cart_title">Giỏ hàng</span>
							<span class="no_product">
								
							<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {
								$qty = Session::get("qty");
								echo "(".$qty.")";
							}else {
								echo '(0)';
							} 
							?>
							</span>
						</a>
					</div>
			    </div>
			<?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>   
		   	<?php
if(isset($_SESSION['email'])){
?>
	<div>
		<td><span id="xinchao"><p style="padding-left: 8px;font-weight: bold;text-align: center;">Xin chào: <span style="color: #ff0000;text-align: center;"> 
			<?php echo ($_SESSION['email'])?> 
								 
		</span></p></span></td>
	</div>
	<?php 
	} 
	?>
			<div class="clear"></div>	
			</div>
			<div class="clear"></div>
</div>
 <!-- MENU -->
<div class="menu">
	
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
		<li><a href="index.php">Trang chủ</a></li>
		<li><a href="products.php" data-toggle="dropdown">Sản phẩm<i class="fas fa-caret-down"></i></a>
		    <ul class="dropdown-menu">
				<li><a href="productbycat.php?catid=1">Thẻ nhớ</a></li>
				<li><a href="productbycat.php?catid=2">Bao da-ốp lưng</a></li>
				<li><a href="productbycat.php?catid=6">Miếng dán cường lực</a></li>
				<li><a href="productbycat.php?catid=16">Tai nghe</a></li>
				<li><a href="productbycat.php?catid=7">Pin dự phòng</a></li>
			</ul>
		</li>
		
	  <!-- <?php 
	  $check_cart = $ct->check_cart();
	  if ($check_cart==true) {
	  	echo '<li><a href="cart.php">Giỏ hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?> -->

	  <?php 
	  $customer_id = Session::get('customer_id'); 
	  $check_order = $ct->check_order($customer_id);
	  if ($check_order==true) {
	  	echo '<li><a href="orderdetails.php">Đơn hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>
	  
	  <?php 
	//   if (isset($_SESSION['id'])) {
	// 	echo '<li><a href="profile.php">Thông tin</a></li>';
	//   }else {
	//   	echo '';
	//   }
	   ?>
	  <?php
	//   if (isset($_SESSION['email'])) {
	//   	echo '<li><a href="compare.php">So sánh</a> </li>';
	//   }
	   ?>
	   <?php 
	//   $login_check = Session::get('customer_login');
	//   if (isset($_SESSION['email'])){
	//   	echo '<li><a href="wishlist.php">Yêu thích</a> </li>';
	//   }
	   ?>
	  <li><a href="contact.php">Liên Hệ</a> </li>
	 <?php
			if (isset($_SESSION['email'])) {
				echo'<li><a href="logout.php">Đăng xuất</a></li>';	
			}
			else {
				echo'<li><a href="login.php">Đăng nhập</a></li>';
			}?>
	  <div class="clear"></div>
	</ul>
</div>
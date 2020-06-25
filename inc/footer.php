</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h4>Về chúng tôi</h4>
						<ul>
							<li><span><a href="gioithieu.php">Giới thiệu</a></span></li>
							<li><span><a href="tuyendung.php">Tuyển dụng</a></span></li>
							<a href=""><img src="images/footer/chungchi1.png"></a>
						</ul>
				</div>
			
				<div class="col_1_of_4 span_1_of_4">
						<h4>Quy định-Chính sách</h4>
						<ul>
							<li><span><a href="baohanh.php">Chính sách bảo hành</a></span></li>
							<li><span><a href="doitra.php">Chính sách đổi trả</a></span></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Chăm sóc khách hàng</h4>
						<ul>
							<li><span>Hotline mua hàng : 19006066</span></li>
							<li><span>Hoặc</span></li>
							<li><span>Phản ánh chất lượng sản phẩm: 0932749306</span></li>
						</ul>
				</div>	
				<div class="col_1_of_4 span_1_of_4">	
						<div class="social-icons">
							<h4>Theo dõi chúng tôi tại</h4>
					   		  	<ul>
									<li class="facebook"><a href="#" target="_blank"> </a></li>
									<li class="twitter"><a href="#" target="_blank"> </a></li>
									<li class="googleplus"><a href="#" target="_blank"> </a></li>
									<li class="contact"><a href="#" target="_blank"> </a></li>
									<div class="clear"></div>
						     	</ul>
						</div>
						<div class="time working">
							<h4>Giờ làm việc</h4>
							<ul>
							<li><span>Từ thứ 2 - thứ 6 : 7:00 - 22:00</span></li>
							<li><span>Thứ 7 - Chủ nhật : 9:00 - 18:00</span></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="copy_right">
				<p>coppy right @2020</p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>

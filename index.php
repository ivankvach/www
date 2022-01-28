<?php
header("Content-Type: text/html; charset=utf-8");
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');

session_start();

if (isset($_SESSION['talon']) == "" )
   {
$conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_select_db($conn, "izhak_db"); 
$result = mysqli_query($conn, "SELECT counter FROM posetiteli");
if (!$result) {echo "zapros na viborcu ne proshol."; mysqli_error();}
$x = mysqli_fetch_array($result);

   $_SESSION['talon'] = $x["counter"]+1;

$result = mysqli_query($conn, "UPDATE posetiteli SET counter = counter + 1");
if (!$result) {echo "zapros na viborcu ne proshol."; mysqli_error();}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Ексклюзивний і авторський одяг | Головна :: izhak.com.ua</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styleindex.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li><a href="#"><span class=""></span><img src="images/iconkyivstar.png" alt=""> +380961886749</a></li>
						<li><a href="#"><span class=""> </span><img src="images/iconlifecell.png" alt=""> +380637309051</a></li>	
<?php
$conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_select_db($conn, "izhak_db");
$sqlCart = mysqli_query($conn, "SELECT id_tovara, colichestvo FROM vibranie_tovari WHERE talon = '$_SESSION[talon]'");

$OrderTotal=0;
 while($row = mysqli_fetch_array($sqlCart)) 
 {
$colichestvo = $row["colichestvo"];
$id_tovara = $row["id_tovara"];

$sqlProd = mysqli_query($conn, "SELECT opisanie, prise FROM tovari WHERE id = '$id_tovara'");
$row2 = mysqli_fetch_array($sqlProd);
$talon = $_SESSION['talon'];
$opisanie = $row2["opisanie"];
$prise = $row2["prise"];
$rezulitat = ($colichestvo);
$OrderTotal = $OrderTotal + $rezulitat;

  }
  	mysqli_close($conn);
?>
     <li><a href="corzina.php"><span class=""><?php if($OrderTotal != 0 ) { ?><?php echo number_format($OrderTotal,0) ?><?php } ?></h2></span><img src="images/bag.png" alt=""></a></li>
	  </ul>
			</div>
				<div class="header-right">
					<ul>
                        <li><a href=""><span class=""> </span><img src="images/icongmail.png" alt=""> izhakclothes@gmail.com</a></li>
                         <li><a href=""><span class=""> </span><img src="" alt="">пн-сб: 9.00-20.00 год.</a></li>						
					      </ul>
				           </div>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
			<div class="banner-top">
		<div class="container">
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
				<div class="logo">
					<h1><a href="index.php"><span>Ї</span> -жак</a></h1>
				</div>
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
			<li><a href="index.php">ГОЛОВНА</a></li>
			    <li><a href="products.php">КОЛЕКЦІЯ</a></li>
					<li><a href="productsprikras.php">ПРИКРАСИ</a></li>
					<li><a href="oplata.php">ОПЛАТА</a></li>
					<li><a href="contact.php">КОНТАКТИ</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
</div>
	<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-left">
		<h2>Ї<br>Ж<br>А<br>К</h2>
	</div>
	<div class="banner-bottom-right">
		<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
								<div class="banner-info">
									<h3>Ми не слідкуємо за модою.Ми просто створюємо стиль.Запрошуємо тебе в стиль</h3>
									<p>Замовляй свій одяг тут...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								   <h3>Замовляй Онлайн</h3>
									<p>Замовляй свій одяг тут...</p>
								</div>
							</li>
							<li>
								<div class="banner-info">
								  <h3>Пакуй свою Сумочку</h3>
									<p>Замовляй свій одяг тут...</p>
								</div>								
							</li>
						</ul>
					</div>
					<!--banner-->
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	<div class="shop">
		<a href="products.php">КОЛЕКЦІЯ АВТОРСЬКОГО ОДЯГУ</a>
	</div>
	</div>
		</div>
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
				<div class="online-strip">
					<div class="col-md-4 follow-us">
						<h3>ми тут : <a class="twitter" href="#"></a><a class="facebook" href="#"></a></h3>
					</div>
					<div class="col-md-4 shipping-grid">
						<div class="shipping">
							<img src="images/shipping.png" alt="" />
						</div>
						<div class="shipping-text">
							<h3>Безкоштовна</h3>
							<h3>доставка</h3>
							<p>при замовленні від 2000 грн</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 online-order">
						<p>Замовлення Онлайн</p>
						<h3>Tel:063 730 9051</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="products-grid">
				<header>
					<h3 class="head text-center">Новинки Колекції</h3>
				</header>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single1.php"><img src="images/s1.jpg" alt="" /></a>
						<a class="product_name" href="single1.php">Сорочка deep blue</a>
						 <p><a class="price" href="single1.php">850 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single2.php"><img src="images/s2.jpg" alt="" /></a>
						<a class="product_name" href="single2.php">Жилетка з вінтажними гудзиками</a>
						 <p><a class="price" href="single2.php">875 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single3.php"><img src="images/s3.jpg" alt="" /></a>
						<a class="product_name" href="single3.php">Костюм.Жилетка+спідниця</a>
						 <p><a class="price" href="single3.php">1450 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single4.php"><img src="images/s4.jpg" alt="" /></a>
						<a class="product_name" href="single4.php">Темно-сірий шерстяний костюм </a>
						 <p><a class="price" href="single4.php">1600 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single5.php"><img src="images/s5.jpg" alt="" /></a>
						<a class="product_name" href="single5.php">Плаття-сорочка Космос</a>
						  <p><a class="price" href="single5.php">1300 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single6.php"><img src="images/s6.jpg" alt="" /></a>
						<a class="product_name" href="single6.php">Вінтажне,темно-бірюзове плаття</a>
						 <p><a class="price" href="single6.php">2500 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single7.php"><img src="images/s7.jpg" alt="" /></a>
						<a class="product_name" href="single7.php">Плаття голуба крапля</a>
						  <p><a class="price" href="single7.php">1500 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single8.php"><img src="images/s8.jpg" alt="" /></a>
						<a class="product_name" href="single8.php">Шоколадне плаття</a>
						 <p><a class="price" href="single8.php">1400 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single9.php"><img src="images/s9.jpg" alt="" /></a>
						<a class="product_name" href="single9.php">Плаття з пониженою талією</a>
						 <p><a class="price" href="single9.php">2000 грн</a></p>
					</div>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="single10.php"><img src="images/s10.jpg" alt="" /></a>
						<a class="product_name" href="single10.php">Сорочка Caramel</a>
						 <p><a class="price" href="single10.php">800 грн</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Популярна Колекція</h3>        			
				     <ul id="flexiselDemo3">
						<li><a href="single1.php"><img src="images/s1.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single1.php">сорочка deep blue</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">850 грн</span></p>
							</div>
						</li>
						<li><a href="single2.php"><img src="images/s2.jpg" class="img-responsive" alt="" /></a>						
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single2.php">жилетка з вінтажними гудзиками</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">875 грн</span></p>
							</div>
						</li>
						<li><a href="single3.php"><img src="images/s3.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single3.php">костюм.жилетка+спідниця</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">1450 грн</span></p>
							</div>
						</li>
						<li><a href="single4.php"><img src="images/s4.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single4.php">Темно-сірий шерстяний костюм</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">1600 грн</span></p>
							</div>
						</li>
						<li><a href="single5.php"><img src="images/s5.jpg" class="img-responsive" alt="" /></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single5.php">Плаття-сорочка космос </a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">1300 грн</span></p>
							</div>
						</li>
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>АВТОРСЬКИЙ ОДЯГ IZHAK.COM.UA</h6>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="footer">
		<div class="container">
		 <div class="footer_top">
			<div class="span_of_4">
				<div class="col-md-3 span1_of_4">
					<h4>Магазин</h4>
					<ul class="f_nav">
					    <li><a href="products_nov.php">Новинки</a></li>
						<li><a href="index.php">Головна</a></li>
						<li><a href="products.php">Колекція</a></li>
						<li><a href="productsprikras.php">Прикраси</a></li>
					</ul>	
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>Колекція</h4>
					<ul class="f_nav">
						<li><a href="products_plat.php">Плаття</a></li>
						<li><a href="products_kos.php">Костюми</a></li>
						<li><a href="products_sor.php">Сорочки</a></li>
						<li><a href="products_szhak.php">Жакети</a></li>
						<li><a href="productsprikras.php">Прикраси</a></li>
					</ul>	
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>Допомога</h4>
					<ul class="f_nav">
						<li><a href="oplata.php">Оплата</a></li>

					</ul>			
				</div>
				 <div class="col-md-3 span1_of_4">
					<h4>Контакти</h4>
					<ul class="f_nav">
						<li><a href="">+380961886749</a></li>
						<li><a href="">+380637309050</a></li>
						<li><a href="">izhakclothes@gmail.com</a></li>
					</ul>				
				</div>
				<div class="clearfix"></div>
				</div>
		  </div>
		  <div class="cards text-center">
				<img src="images/cardses.jpg" alt="" />
		  </div>
		  <div class="copyright text-center">
				<p>© 2020 Izhak.com.ua All Rights Reserved | Design by   <a href="http://w3layouts.com">  W3layouts</a></p>
		  </div>
		</div>
		</div>
</body>
</html>
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
<title>Екслюзивний і авторський одяг | Колекція :: izhak.com.ua</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/styleproducts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel='stylesheet' type='text/css' />
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
     <li><a href="corzina.php"><span class=""> <?php echo number_format($OrderTotal,0) ?></h2></span><img src="images/bag.png" alt=""></a></li>						
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
	<div class="inner-banner">
		<div class="container">
			<div class="banner-top inner-head">
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
		</div>
		
		<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
			<div class="products">
				<div class="product-listy">
					<h2>Наша Продукція</h2>
					<ul class="product-list">
						<li><a href="products_nov.php">Новинки</a></li>
						<li><a href="products_plat.php">Плаття</a></li>
						<li><a href="products_kos.php">Костюми</a></li>
						<li><a href="products_sor.php">Сорочки</a></li>
						<li><a href="products_szhak.php">Жакети</a></li>
						<li><a href="productsprikras.php">Прикраси</a></li>
					</ul>
				</div>
				<div class="latest-bis">
					<img src="images/s11.10.jpg" class="img-responsive" alt="" />
					<div class="offer">
						<p>15%</p>
						<small>Top Offer</small>
					</div>
				</div> 	

			</div>
			<div class="new-product">
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="index.php">Головна</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Колекція</span>&nbsp;</li>
					</ul>
					<p class="back"><a href="index.php">Назад</a></p>
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
	               		 <div class="clearfix"></div>		
			        </div>
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
					</div>

					<div class="clearfix"></div>
					<ul>
					  <li>
							<a class="cbp-vm-image" href="single1.php">
								<div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s1.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Сорочка deep blue</p>
										 <p class="title1">800 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>

							<form action="zapisi_tovara.php?idtovara=1" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							   </div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single2.php">
								<div class="simpleCart_shelfItem">
							  <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s2.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Жилетка з вінтажними гудзиками</p>
										 <p class="title1">875 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							 </a>

							 <form action="zapisi_tovara.php?idtovara=2" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single3.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s3.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Костюм. Жилетка + спідниця</p>
										 <p class="title1">1450 грн</p>
									   </div>
									     <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=3" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single4.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s4.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Темно - сірий шерстяний костюм</p>
										 <p class="title1">1600 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=4" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single5.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s5.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Плаття - сорочка космос</p>
										 <p class="title1">1300 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=5" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single6.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s6.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Вінтажне,темно - бірюзове плаття</p>
										 <p class="title1">2500 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=6" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single7.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s7.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Плаття голуба крапля</p>
										 <p class="title1">1500 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=7" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single8.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s8.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Шоколадне плаття</p>
										 <p class="title1">1400 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=8" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single9.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s9.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title"> Плаття з пониженою талією</p>
										 <p class="title1">2000 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
							<form action="zapisi_tovara.php?idtovara=9" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
						<li>
							<a class="cbp-vm-image" href="single10.php">
								<div class="simpleCart_shelfItem">
								<div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="images/s10.jpg" class="img-responsive" alt=""/>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">Сорочка caramel</p>
										 <p class="title1">800 грн</p>
									   </div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
							</a>
								<form action="zapisi_tovara.php?idtovara=10" method="POST">
							  <input type="submit" value="В корзину">
							   </form>
							</div>
						</li>
					</ul>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Популярна колекція</h3>        			
				     <ul id="flexiselDemo3">
						<li><a href="single10.php"><img src="images/s10.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single10.php">Сорочка caramel</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">800 грн</span></p>
							</div>
						</li>
						<li><a href="single8.php"><img src="images/s8.jpg" class="img-responsive"/></a>						
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single8.php">Шоколадне плаття</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">1400 грн</span></p>
							</div>
						</li>
						<li><a href="single9.php"><img src="images/s9.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single9.php">Плаття з пониженою талією</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">2000 грн</span></p>
							</div>
						</li>
						<li><a href="single7.php"><img src="images/s7.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single7.php">Плаття голуба крапля</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">1500 грн</span></p>
							</div>
						</li>
						<li><a href="single6.php"><img src="images/s6.jpg" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single6.php">Вінтажне,темно-бірюзове плаття</a>
							<p><a class="item_k" href="#"><i></i></a><span class="price">2500 грн</span></p>
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
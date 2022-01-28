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
<?php 
if(isset($_POST['submit'])){
    $to = "clothes@izhak.com.ua"; // this is your Email address
    $from = $_POST['email']; // this is the sender Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
   header ('Location: thank_you.php');
   // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Ексклюзивний і авторський одяг | Контакти :: izhak.com.ua</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylecontact.css" rel="stylesheet" type="text/css" media="all" />
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
		
<!-- contact-page -->
<div class="contact">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Головна</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Контакти
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="products.php">Назад</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<div class="contact-info">
			<h2>МИ ТУТ</h2>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57734.01912825907!2d25.56580958409594!3d49.54832807390805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473036ad4b82ce75%3A0xc484a447edb154e8!2z0KLQtdGA0L3QvtC_0ZbQu9GMLCDQotC10YDQvdC-0L_RltC70YzRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjCwgNDYwMDM!5e0!3m2!1suk!2sua!4v1574415201890!5m2!1suk!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>

			<div class="contact-info">
				<h3>ФОРМА ВІДПРАВЛЕННЯ</h3>
			</div>
			<form action="" method="post">
				<div class="contact-left">
					<input type="text" name="first_name" placeholder="Ім'я" required>
					<input type="text" name="last_name" placeholder="Прізвище" required>
					<input type="text" name="email" placeholder="Email" required>
				</div>
				<div class="contact-right">
					<textarea name="message" placeholder="Повідомлення" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" name="submit" value="Відправити">
			</form>

	</div>
</div>
<!-- //contact-page -->
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>БРЕНДОВИЙ ОДЯГ IZHAK.COM.UA</h6>
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
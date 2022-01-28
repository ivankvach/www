<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');

session_start();

   if(isset($_POST['delete']))
{
 $id_tovara= key($_POST['delete']);
 $conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_query($conn, "SET NAMES 'utf8'");
 mysqli_select_db($conn, "izhak_db");
 
 $delete = mysqli_query($conn, "DELETE FROM vibranie_tovari WHERE id_tovara='$id_tovara'");

		
 	     mysqli_close($conn);
} 
?>
<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');

  session_start(); 
  
  if (isset($_POST['pereschiot']) == "пересчитать")
 {
$conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_select_db($conn, "izhak_db");
  
foreach($_REQUEST as $key => $value)
 	
	{
	 if (strpos($key,"Q") === 0 )
	 {
	 
		$id_tovara = substr($key,1);
		$colichestvo = $value;
		
		if (is_numeric($colichestvo))
		{
			if ($colichestvo == 0)
			{
			$sqlCartUpdate = mysqli_query($conn, "DELETE FROM vibranie_tovari WHERE talon='$_SESSION[talon]' AND id_tovara='$id_tovara'");
			}
        else
			{
            $sqlCartUpdate = mysqli_query($conn, "UPDATE vibranie_tovari SET colichestvo='$colichestvo' WHERE talon='$_SESSION[talon]'  AND id_tovara='$id_tovara'");
			}
		}		  
	}	
	} 
		mysqli_close($conn);	
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Ексклюзивний і авторський одяг | Корзина :: izhak.com.ua</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylecorzina.css" rel="stylesheet" type="text/css" media="all" />
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
<script type="text/javascript">
function checkform(f) {
  var errMSG = ""; 
  // цикл ниже перебирает все элементы в объекте f, 
  // переданном в качестве параметра
  // функции, в данном случае - наша форма.            
  for (var i = 0; i<f.elements.length; i++) 
    // если текущий элемент имеет атрибут required
    // т.е. обязательный для заполнения
    if (null!=f.elements[i].getAttribute("required")) 
       // проверяем, заполнен ли он в форме
        if (isEmpty(f.elements[i].value)) // пустой
            errMSG += "  " + f.elements[i].name + "\n"; // формируем сообщение
                                                       // об ошибке, перечисляя 
                                                       // незаполненные поля
        // если сообщение об ошибке не пусто,
        // выводим его, и возвращаем false     
        if ("" != errMSG) {
            alert("Не заполнены обязательные поля:\n" + errMSG);
            return false;
        }
}
function isEmpty(str) {
   for (var i = 0; i < str.length; i++)
      if (" " != str.charAt(i))
          return false;
      return true;
}
</script>
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
		<!-- checkout -->
		
<?php if($OrderTotal == 0 ) { ?>
<h1 align="center" style="float:center; margin-bottom:150px; margin-top:55px; color:#816263; font-style:italic">Ваша корзина пуста</h1>
<?php } ?>

<?php if($OrderTotal != 0) { ?>
<h1 align="center">Ваша корзина</h1>
<form action="corzina.php" method="post">
<table cellpadding=5 cellspacing=1 border=0 width=75% align="center">
<tr bgcolor="#f5d7bf">
  <th height="10" width=5%>№</th>
  <th width=10%>фото</th>
  <th width=40%>опис товару</th>
  <th width=10%>к-сть.</th>
  <th width=10%>ціна</th>
  <th width=10%>всього</th>
  <th width=5%>видалити</th>
</tr>
<?php } ?>
<?php
$conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error());
mysqli_query($conn, "SET NAMES 'utf8'"); 
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
$rezulitat = ($prise*$colichestvo);
$OrderTotal = $OrderTotal + $rezulitat;

  echo "<tr>
    <td align='center'>$id_tovara</td>
        <td><a href='single$id_tovara.php'><img src='foto/$id_tovara.jpg' align='center' alt='product' height='318' width='180' border='0'></td>
    <td>$opisanie</td>
    <td><input type=\"number\" name=\"Q$id_tovara\" size=\"2\" class=\"qtybox\" 
         value=\"$colichestvo\"></td>
    <td style=\"text-align:center\">$prise.00</td>
    <td style=\"text-align:center\">$rezulitat.00</td>
    <td><input type=\"submit\" name=\"delete[$id_tovara]\" class=\"qtybox1\" value=\"x\"></td>
  </tr>"; 
  }
        mysqli_close($conn);
  ?>
<?php if($OrderTotal != 0) { ?>
<tr bgcolor="#f5d7bf">
    <th colspan="4" style="text-align:right">всього:</th>
    <td colspan="3" align="center" style="border-style:solid"><b><?php echo number_format($OrderTotal,2) ?> грн.</b></td>
</tr>
</table></div><br><br>
<?php } ?>
<?php if($OrderTotal != 0) { ?>
  <div style="width="99%"; line-height:8pt">
  <input type="submit" name="pereschiot" style="float:; margin-right:" value="Оновити корзину">
</div>
 </form><br><br>

<div class="oform">
<form action="oform.php" method="POST">
<input type="submit" style="float:; margin-right:" value="Оформити замовлення">
</form>
<?php } ?>
</div>
</body>
 
<!-- //checkout -->	
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>АВТОРСЬКИЙ ОДЯГ IZHAK.COM.UA</h6>
					<div class="clearfix"> 
					</div>
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
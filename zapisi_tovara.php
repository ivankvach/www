<?php
session_start();

$talon = $_SESSION['talon'];
$data = date('y/n/d');
$idtovara = $_GET['idtovara'];

$conn2 = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_select_db($conn2, "izhak_db");
$sqlCart = mysqli_query($conn2, "SELECT talon,id_tovara FROM vibranie_tovari WHERE talon = '$talon'");
	
	while ($row = mysqli_fetch_array($sqlCart))
		{
			if ($row["talon"] == $talon && $row["id_tovara"] == $idtovara)
		{
				$update = true;
		}
		}
	if (!$update)
	{
	$sqlInsert = mysqli_query($conn2, "INSERT INTO vibranie_tovari (talon,id_tovara,colichestvo,data) Values ('$talon', '$idtovara', 1, '$data')");
	    }
	  else
	  {
	  $sqlUpdate = mysqli_query($conn2, "UPDATE vibranie_tovari SET colichestvo = colichestvo + 1 WHERE talon ='$talon' AND 			
	  id_tovara = '$idtovara'");
	  if (!$sqlUpdate) {echo "ne poluchilosi";}
	  }
	     mysqli_close($conn2);
		
       header("Location: ".$_SERVER['HTTP_REFERER']);

?>
<?php
session_start();
if(isset($_POST['delete'])){
 $id_tovara= key($_POST['delete']);
 $conn = mysqli_connect("izhak.mysql.tools", "izhak_db", "izhak_db") or die ("Could not connect: " . mysqli_error()); 
 mysqli_select_db($conn, "izhak_db");
 $sqlCartUpdate = mysqli_query($conn, "DELETE FROM vibranie_tovari WHERE id_tovara='$id_tovara'");
 }
 	     mysqli_close($conn);
?>
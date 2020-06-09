<?php 

//echo $_GET["id"];
session_start();


	$_SESSION['cart'] = $_GET["id"];
		//$id = intval($_GET['id']);
 echo $_SESSION['cart'];
	//echo $id;
	//header("Location: e_member.php");
 



//$_SESSION['cart'][]=$id;
//unset($_SESSION['cart'][$id]);
?>
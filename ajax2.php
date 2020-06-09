

<?php
	session_start();
	if(isset($_SESSION['cart']))
		$_SESSION['cart']=array();
	if(isset($_GET["id"]))
	{
		 $id = intval($_GET["id"]);
		 $index=array_search($id,$_SESSION['cart'],true);
		unset($_SESSION['cart'][$id]);
	}
?>
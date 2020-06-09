<?php
	include 'session.php';

	if(isset($_SESSION['sess_user'])){
		

		$stmt = $conn->prepare("SELECT * FROM cart  WHERE orderid='$orderid'");
		
		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['price'] * $row['quantity'];
			$total += $subtotal;
		}

		

		echo json_encode($total);
	}
?>
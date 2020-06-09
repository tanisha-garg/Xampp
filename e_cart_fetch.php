<?php
session_start();
	include 'test/session.php';
	
	$conn = mysqli_connect('localhost','carwow','admin@123','carwow');
		if(! $con)
		{
			die("Could not connect").mysqli_connect_error();
		}

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['sess_user'])){
		try
		{
			$stmt = "SELECT * from cart where username = '$user' " ;
			$res = mysqli_query($conn,$stmt);
			$row = mysqli_fetch_assoc($res);
			
			foreach($stmt as $row)
			{
				$output['count']++;
				$image = $row['image'] ;
				$productname = $row['name'];
				$output['list'] .= "
					<li>
						
							<div class='pull-left'>
								<img src='".$row['image']."' class='thumbnail' alt='Product Image'>
							</div>
							<h4>
		                        <b>".$row['productname']."</b>
		                        <b> ".$row['price']." </b>
		                    </h4>
		                    <p>".$row['quantity']."</p>
							
					</li>
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['cart'] as $row)
			{
				$output['count']++;
				$image = $row['image'] ;
				$productname = $row['name'];
				$output['list'] .= "
					<li>
						
							<div class='pull-left'>
								<img src='".$row['image']."' class='thumbnail' alt='Product Image'>
							</div>
							<h4>
		                        <b>".$row['productname']."</b>
		                        <b> ".$row['price']." </b>
		                    </h4>
		                    <p>".$row['quantity']."</p>
							
					</li>
				";
			}
		}
	}

	
	echo json_encode($output);

?>


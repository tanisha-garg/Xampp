<?php
	$con = mysqli_connect('localhost','carwow','admin@123','carwow');
		if(! $con)
		{
			die("Could not connect").mysqli_connect_error();
		}
		
	session_start();

	

	if(isset($_SESSION['sess_user'])){	

		
			$stmt = "SELECT * FROM login WHERE username = '$user' ";
			$res = mysqli_query($con,$stmt);		
			if(!res)
			{
				echo "Could not connect!!";
			}	

		
	}
?>
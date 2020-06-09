<?php
	session_start();
	if(!isset($_SESSION['sess_user']))
		header("Location: e_member.php")
?>
<html>
<head>
	<title>My Account</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

body {
	background-image: url('ha.jpg');
}
h1 {
	
	color: brown;
	font-family: Raleway;
}
.left img {
	display: inline-block;
	vertical-align: middle;
}
.header {
	display: inline-block;
	width: 100%;
}
.left {
	display: inline-block;
}
.right {
	display: inline-block;
	float: right;
}
.details {
	text-align: center;
	padding-top: 50px;
}
</style>
</head>
<body>	
	<div class="header">
		<div class="wrapper">
			<div class="left">
				<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
			</div>
			<div class="right">
				<h3 align="right"><a href = "e_cart.php"> YOUR CART </a></h3>
			</div>
		</div>
	</div>
	
	<h1><center>Account Details</center></h1><br><br>
	<div class="change-pass"><h3><center><a href="e_update.php">Change Password</a></center></h3></div>
		<div class="details">
			
			<?php
				$conn = mysqli_connect('localhost','root','','carwow');
				if(! $conn)
				{
					die("Connection Failed" .mysqli_connect_error());
				}
				 $user = $_SESSION['sess_user'];
				$sql = "Select * from login where username = '$user' " ;
				
				$res = mysqli_query($conn,$sql);
				
				if(!$res)
				{
					die("Could not get data");
				}
				while($row = mysqli_fetch_assoc($res))
				{
					echo "<b>Username :</b>".$row['username']."<br>";
					echo "<b>Password :</b>".$row['password']."<br>";
					echo "<b>E mail ID :</b>".$row['email']."<br>";
					echo "<b>Phone :</b>".$row['phone']."<br>";
					echo "<b>Address :</b>".$row['address']."<br>";
					echo "<b>Age :</b>".$row['age']."<br>";
				}
			?>
			
		</div>
	
</body>
</html>
<html>
<head>
<title> FORGET PASSWORD </title>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
	
body {
	background-image: url('abc.png');
}

fieldset {
	margin-top: 100px;
	margin-bottom: 100px;
	margin-right: 150px;
	margin-left: 400px;
	border: solid;
	background-image: url('lily.jpg');
}

input {
	width: 150px;
	height: 20px;
	align-content: center;
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

h2 {
	
	color: brown;
	font-family: Raleway;
}
</style>
</head>
<body>
	<div class="header">
		<div class="left">
			<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
		</div>		
	</div>
	<div id="update">
	<fieldset style="width:40%">
		<form method="post" action="">
		<h2><center><strong> UPDATE PASSWORD </strong></center></h2>
		<h3 align="center"><a href="e_login.php">LOGIN </a>&nbsp &nbsp <a href="e_register.php"> REGISTER </a></h3>
		<p align="center">
		Username : <input type="text" name="user"><br><br>
		Existing Password : <input type="password" name="epass" ><br><br>
		New Password : <input type="password" name="npass" ><br><br>
		<input type="submit" name="submit" value="UPDATE">
		</center>
		</form>
	</fieldset>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['user']) && !empty($_POST['epass']) && !empty($_POST['npass']))
		{
			$user = $_POST['user'];
			$epass = $_POST['epass'];
			$npass = $_POST['npass'];
			
			$conn = mysqli_connect('localhost','carwow','admin@123','carwow');
			if(! $conn)
			{
				die("Connection failed" .mysqli_connect_error());
			}
			if($epass == $npass)
			{
				echo "New passsword cannot be existing password!!!";
			}
			else
			{
				$sql = "Select * from login where password = '$epass'";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_num_rows($result);
				if(!empty($row))
				{
					$sq = "Update login set password = '$npass' where username = '$user'";
					print($sq);
					$res = mysqli_query($conn,$sq);
					if($res)
					{
						echo "Password updated successfully!!!";
					}
					else
					{
						echo "Cannot update password!!!";
					}
				}
				else
				{
					echo "Username not found";
				}
				
			}
		}
		else
		{
			echo "All fields are necessary";
		}
	}
?>
<html>
<head>
	<title> Register </title>	
</head>
<body>
	<center><h1> Register Form using PHP and MySQL </h1></center>
	<p><a href="register.php"> REGISTER </a> | <a href="login.php"> LOGIN </a></p>
	<center><h3> REGISTER </h3></center>
	<form method="post" action="">
		
			Username : <input type= "text" name="user"><br><br>
			Password : <input type="password" name="pass"><br><br>
		
		<input type="submit" name="submit" value="Register">
	</form>
	<?php
	if(isset($_POST["submit"]))
		{
			
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{
				$user= $_POST['user'];
				$pass= $_POST['pass'];
				
				$conn= new mysqli('localhost','root','','user_reg');
				if ($conn->connect_error) 
				{
					die("Connection failed: " . $conn->connect_error);
				}
				
				$sql="select * from login_reg where 'username' = '".$user."'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result); 				
				if($row==0)
				{
					$sq= "Insert into login_reg(username,password) values('$user','$pass')";
					if ($conn->query($sq) === TRUE) 
					{
						echo "New record created successfully";
					} 
					else 
					{
						echo "Error: " . $sq . "<br>" . $conn->error;
					}
				}
				else 
				{
					echo "Username already exists";
				}
			}
			else
			{
				echo "All fields are required";
			}
		}
	?>
</body>
</html>
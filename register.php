<html>
<head>
	<title> Register </title>	
</head>
<body>
	<center><h1> Register Form using PHP and MySQL </h1></center>
	<pre><p><a href="register.php"> REGISTER </a> | <a href="login.php"> LOGIN </a></p>
	<center><h1> REGISTER </h1></center>
	<form method="post" action="">
		
			Username     : <input type= "text" name="user"><br><br>
			Password     : <input type="password" name="pass"><br><br>
			Email        : <input type="text" name="mail"><br><br>
			Phone Number : <input type="text" name="phone"><br><br>
			Age          : <input type="text" name="age"><br><br>
			
		
		<input type="submit" name="submit" value="Register">
	</form></pre>
	<?php
	if(isset($_POST["submit"]))
		{			
			if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['mail']) && !empty($_POST['phone']) && !empty($_POST['age']))
			{
				$user= $_POST['user'];
				$pass= $_POST['pass'];
				$mail= $_POST['mail'];
				$phone= $_POST['phone'];
				$age= $_POST['age'];
				
				$conn = mysqli_connect('localhost','root','','user_reg');
				if(! $conn)
				{
					die("Connection Failed" .mysqli_connect_error());
				}
				
				$sql="select * from login_reg where username = '$user'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result); 				
				if(!empty($row))
				{
					$sq= "Insert into login_reg(username,password,email,phone,age,gender) values('$user','$pass','$mail','$phone','$age')";
					$res = mysqli_query($conn,$sql);
					if($res) 
					{
						echo "New record created successfully";
					} 
					else 
					{
						echo "Error: Cannot be created" ;
					}
				}
				else
				{
					echo "Username already exists";
				}
			}
			else
			{
				echo "All fields are necessary";
			}
		}
	?>
</body>
</html>
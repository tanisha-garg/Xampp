	<?php
		if(isset($_POST["submit"]))	
		{			
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{				
				$_user = $_POST['user'];
				$_pass = $_POST['pass'];
				
				$conn= new mysqli('localhost','root','','user_reg');
				if ($conn->connect_error) 
				{
					die("Connection failed: " . $conn->connect_error);
				}								
				$sql="select count('username') from login_reg";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result); 
				if($row!=0)
				{
					while($row=mysql_fetch_assoc($sql))
					{
						$dbusername = $row['username'];
						$dbpassword = $row['password'];
					}
					if($user == $dbusername && $pass == $dbpassword)
					{
						session_start();
						$_SESSION['sess_user']=$user;
						header("Location: member.php");
					}
				}
				else
				{
					echo "Invalid username or password";
				}
			}
			else
			{
				echo "Both the fields are required";
			}
		}
	?>
<html>
<head>
	<title> LOGIN </title>
	
</head>
<body>
	<center><h1> Login form using MySQL and PHP </h1></center>
	<p><a href="register.php"> REGISTER </a> | <a href="login.php"> LOGIN </a></p>
	<h3><center> LOGIN FORM </center></h3>
		<form action="" name="action" method="POST">
			Username : <input type="text" name="user"><br><br>
			Password : <input type="password" name="pass"><br><br>
			<input type="submit" name="submit" value="login"><br><br>
		</form>

	
</body>
</html>
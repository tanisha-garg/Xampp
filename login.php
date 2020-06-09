<html>
<head>
	<title> LOGIN </title>
	
</head>
<body>
	<center><h1> Login form using MySQL and PHP </h1></center>
	<pre><p><a href="register.php"> REGISTER </a> | <a href="login.php"> LOGIN </a></p>
	<h3><center><h2> LOGIN FORM </h2></center></h3>
		<form action=""  method="POST">
			
			Username : <input type="text" name="user"><br><br>
			Password : <input type="password" name="pass"><br><br>
			<input type="submit" name="submit" value="login"><br><br>
			<input type="submit" name="update" value="update password"><br><br>
			
		</form></pre>
</body>
</html>
<?php
		
		if(isset($_POST["submit"]))
		{
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				
				$con=mysql_connect('localhost','root','') or die(mysql_error());
				mysql_select_db('user_reg') or die("Cannot select db");
				
				$q = mysql_query("Select * from login_reg where username = '$user'");
				$row = mysql_num_rows($q);
				if($row!=0)
				{
					while($row = mysql_fetch_assoc($q))
					{
						$dbuser = $row['username'];
						$dbpass = $row['password'];
					}
					if($user == $dbuser && $pass == $dbpass)
					{
						session_start();
						$_SESSION['sess_user'] = $user;
						header("Location : member.php");
					}
					else
					{
						echo "Invalid username or password";
					}
				}
				else
				{
					echo "Username not found";
				}
			}
			else
			{
				echo "All fields are necessary";
			}
		}
		
	?>
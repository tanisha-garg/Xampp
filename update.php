<html>
<head>
	<title> UPDATE </title>
	
</head>
<body>
	<center><h1> Updation form using MySQL and PHP </h1></center>
	<pre
	<h3><center><h2> UPDATION FORM </h2></center></h3>
		<form action=""  method="POST">
			
			Username : <input type="text" name="user"><br><br>
			New Password : <input type="password" name="new"><br><br>
			<input type="submit" name="update" value="update password"><br><br>
			<a href="login.php"><center><h3> GO TO LOGIN PAGE </h3></center></a>
			
		</form></pre>

<?php
		if(isset($_POST['update']))
		{
			if(!empty($_POST['user']) && !empty($_POST['new']))
			{
				$user = $_POST['user'];
				$new = $_POST['new'];
				
				$conn = mysqli_connect('localhost','root','','user_reg');
				if(! $conn)
				{
					die("Connection Failed" .mysqli_connect_error());
				}
				$sq = "Select * from login_reg where username = '$user'" ;
				$result=mysqli_query($conn,$sq);
				$row=mysqli_fetch_array($result);
			 
				
				if(!empty($row))
				{
					$sql = "Update login set password = '$new' where username = '$user' ";
					$res = mysqli_query($conn,$sql);
					if($res)
					{
						echo "Password updated successfully!!" ;
					}
					else
					{
						echo "Could not update password" ;
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
</body>
</html>
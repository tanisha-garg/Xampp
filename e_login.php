<html>
<head>
<title> LOGIN </title>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

body {
	background-image: url('fl.jpg');
	width: 100%;
	background-size: cover;
}

fieldset {
	margin-top: 100px;
	margin-bottom: 150px;
	margin-right: 150px;
	margin-left: 450px;
	border: solid;
	background-image: url('l_in.jpg');
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

	

h2 {
	
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
<div id="sign_in">
<fieldset style="width:30%" >

	<form method="post" action="">
	<h2><center><strong> LOG IN FORM </strong></center></h2>
	<h3 align="center">No Account?<a href="e_register.php"> REGISTER </a></h3><br>
		<p align="center">USERNAME : <input type="text" name="user" size="100"><br><br>
		PASSWORD : <input type="password" name="pass" size="100"><br><br>&nbsp &nbsp
					<input type="submit" name="submit" value="LOGIN"> &nbsp &nbsp &nbsp
					<input type="submit" name="update" value="FOGET PASSWORD"></p>
</form>
</fieldset>
</div>
</body>
</html>

<?php

		if(isset($_POST['submit']))
		{
			if(!empty($_POST['user']) && !empty($_POST['pass']))
			{
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				
				$conn = mysqli_connect('localhost','root','','carwow');
				if(! $conn)
				{
					die("Connection Failed" .mysqli_connect_error());
				}
				$sq = "Select * from login where username = '$user' and password = '$pass'" ;
				$result=mysqli_query($conn,$sq);
				$row=mysqli_num_rows($result);
			    
				
				if(!empty($row))
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$dbuser = $row['username'];
						$dbpass = $row['password'];
					
						if($user == $dbuser && $pass == $dbpass)
						{
							
							session_start();
							$_SESSION['sess_user'] = $user;
							//echo "test".$_session['sess_user'];
							header("Location: e_member.php");
						}
						else
						{
							echo "Invalid username or password" ;
						}
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
		else if(isset($_POST['update']))
		{
		
		//	echo "helo";
			session_start();
			$_SESSION['sess_user'] =$user;
			//header("Location : test/e_update.php");
			?>
			<script>
			window.location.href="http://kaswebtech.com/tanisha/test/e_update.php";
			</script>
			<?php
		}
	?>
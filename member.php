<?php
	session_start();
	if(isset($_SESSION['sess_user']))
	{
		header("location: member.php");
	}
	else
		{
?>
<html>
<head>
	<title> Welcome</title>
</head>
<body>
	<center><h1> Create Registration and Login form using PHP and MySQL </h1></center><br><br>
	<center><h2>Welcome!!</h2>   
		<?php 
			$user = $_POST["user"];
			$pass = $_POST["pass"];
			echo "$user" ;  
		?>   <br><br>

	 <h3><a href="logout.php"> LOGOUT </a></h3>
	<p> Successfully created registration and login form. </p></center>
</body>
</html>
<?php
	}
?>
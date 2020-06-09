<?php
	session_start();
	if(isset($_SESSION["sess_user"]))
	{
		header("location: login.php");
	}
	else
		{
?>
<html>
<head>
	<title> Welcome</title>
</head>
<body>
	<center><h1> Create Registration and Login form using PHP and MySQL </h1></center>
	Welcome!!   | <a href="logout.php"> LOGOUT </a>
	<p> Successfully created registration and login form. </p>
</body>
</html>
<?php
	}
?>
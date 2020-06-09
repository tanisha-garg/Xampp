<html>

<head>
	<title> REGISTER </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

		body {
			background-image: url('abc.png');
		}

		fieldset {
			margin: 0 auto;
			margin-top: 100px;
			border: solid;
			background-image: url('aes.jpg');
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
			color: brown;
			font-family: Raleway;
		}

		.submit-button {
			height: 30px;
		}
	</style>
</head>

<body>
	<div class="header bg-dark">
		<div class="left mt-2">
			<h3 class="text-white"><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
		</div>

	</div>
	<div id="register">
		<fieldset style="width: 50%">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<h2>
					<center><strong> REGISTRATION FORM </strong></center>
				</h2>
				<h3 align="center"><a href="e_login.php"> LOGIN </a></h3><br>
				<p align="center">
					Username : <input type="text" name="user" size="100"><br><br>
					Password : <input type="password" name="pass" size="100"><br><br>
					Email ID : <input type="text" name="mail" size="100"><br><br>
					Phone Number : <input type="text" name="phone" size="100"><br><br>
					Address : <input type="text" name="address" size="100"><br><br>
					Age : <input type="text" name="age" size="100"><br><br>
					<input class="submit-button" type="submit" name="submit" value="REGISTER"></p>
			</form>
		</fieldset>
	</div>
</body>

</html>
<?php
	if (isset($_POST['submit'])) {
		if (!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['mail']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['age']))
		 {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$mail = $_POST['mail'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$age = $_POST['age'];


		$conn = mysqli_connect('localhost', 'root', '', 'carwow');
		if (!$conn) {
			die("Connection Failed" . mysqli_connect_error());
		}

		$sql = "select * from login where username = '$user'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if (empty($row)) {
			$sq = "Insert into login(username,password,email,phone,address,age) values('$user','$pass','$mail','$phone','$address','$age')" or die("Database not found");

			$res = mysqli_query($conn, $sq);
			if ($res) {
				echo "New record created successfully";
			} else {
				echo "Error: Cannot be created";
			}
		} else {
			echo "Username already exists";
		}
	} else {
		echo "All fields are necessary";
	}
}

?>
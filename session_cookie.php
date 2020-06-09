<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
session_start();
error_reporting(E_ALL);
if (!isset($_SESSION['sess_user']))
	header("Location : e_login.php");
?>
<html>

<head>
	<title> WELCOME </title>
	<link rel="stylesheet" href="/css/style.css">
</head>

<body>

	<div class="header">
		<div class="left">
			<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
		</div>
		<div class="right">
			<h3 align="right"><a href="e_mem.php"> YOUR CART </a></h3>
		</div>
	</div>
	<span class="wrapper">
		<h2>
			<div class="my-acc"><a href="e_acc.php"> MY ACCOUNT &nbsp </a></div>
			<div class="logout"><a href="e_login.php">LOGOUT </a></div>
		</h2>
	</span>

	<div class="heading">
		<h1>
			<center>WELCOME TO ABC CART</center>
		</h1>
	</div>

	<div class="mem">
		<h3>
			<span class="user"><strong> USER :</strong></span>
			<span class="name">
				<?php
				print $_SESSION['sess_user'];

				?>
			</span>
		</h3>
	</div><br>
	<div class="container">
        <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name];
        }
		$con = mysqli_connect('localhost', 'root', '', 'carwow');
		if (!$con) {
			die("Could not connect") . mysqli_connect_error();
		}

		$sql = "SELECT * from product";
		$res = mysqli_query($con, $sql);
		if (!$res) {
			echo "Could not connect!!";
		}
		$row = mysqli_num_rows($res);

		if (!empty($row))
			while ($row = mysqli_fetch_assoc($res)) { {
		?>
				<div class="wrap">
					<div class="content-wrapper">

						<!-- Main content -->
						<section class="content">
							<div class="col-sm-9">

								<div class="col-sm-6">
									<?php echo "<a href=" . $row['hyperlink'] . "><img src=" . $row['image'] . "></a>";
									echo "<h3 class=" . 'product-name' . "><a href=" . $row['hyperlink'] . ">" . $row['name'] . "</a></h3>";
									echo "<span class=" . 'price' . ">Price :$" . $row['price'] . "</span><br><br>";

									?>

									<form class="form-inline" id="productForm" method="POST" action="">
										<div class="form-group">
											<div>


												<div class="dec button">-</div>


												<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">

												<div class="inc button">+</div>



											</div><br>
											<?php echo "<input type=" . 'submit' . " class=" . 'btn btn-primary btn-lg btn-flat' . " onclick='gotocart(" . $row['id'] . ")' name=" . 'submit' . " value='Add to Cart')'><i class=" . 'fa fa-shopping-cart' . "></i> "

											?>

										</div>
									</form>
								</div>


							</div>

						</section>

					</div>
				</div>

		<?php }
			}		?> </div>
	<?php

	if (isset($_POST['submit'])) {
		if (isset($_SESSION['sess_user'])) {
			$user = $_SESSION['sess_user'];
			$id = $_SESSION['cart'];
			$quantity = $_POST["quantity"];
			//echo $quantity;
			//echo $user;
			$stm = "Select * from product where id='$id'";
			$re = mysqli_query($con, $stm);
			$ro = mysqli_fetch_array($re);
			$name = $ro['name'];
			$price = $ro['price'];
			$image = $ro['image'];
			//echo "hello";
			$stmt = "Select * from cart where username='$user' and id='$id'";
			$subtotal =  $price * $quantity;

			//print($stmt);
			$result = mysqli_query($con, $stmt);
			$rows = mysqli_fetch_array($result);

			if (empty($rows)) {

				//$orderid++;
				$st = "Insert into cart(username,productname,price,id,quantity,image,subtotal) VALUES('$user','$name','$price','$id','$quantity','$image','$subtotal')";
				//print($st);
				$resul = mysqli_query($con, $st);
			} else {
				echo "Product already in cart";
			}
		}
	}
	?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		incrementVar = 0;
		$('.inc.button').click(function() {
			var $this = $(this),
				$input = $this.prev('input'),
				$parent = $input.closest('div'),
				newValue = parseInt($input.val()) + 1;
			$parent.find('.inc').addClass('a' + newValue);
			$input.val(newValue);
			incrementVar += newValue;
		});

		$('.dec.button').click(function() {
			var $this = $(this),
				$input = $this.next('input'),
				$parent = $input.closest('div'),
				newValue = parseInt($input.val()) - 1;
			console.log($parent);
			$parent.find('.inc').addClass('a' + newValue);
			$input.val(newValue);
			incrementVar += newValue;
		});

		function gotocart(id) {

			$.ajax({
					type: "GET",
					url: "ajax.php?id=" + id
				})

				.done(function() {
					alert("Product have been added.");
				});
			//location.href = 'cart.php';
			success: alert('success');

		}
	</script>
</body>

</html>
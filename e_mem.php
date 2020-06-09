<?php
session_start();
if (!isset($_SESSION['sess_user']))
	header("Location : e_login.php");

?>
<html>

<head>
	<title>CART </title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700');

		.left {
			display: inline-block;
		}

		.left img {
			display: inline-block;
			vertical-align: middle;
		}

		.wrap {
			display: inline-block;
			padding-left: 492px;
		}

		.my-acc {
			display: inline-block;
		}

		.logout {
			display: inline-block;
			padding-left: 100px;
		}

		body {
			background-image: url('ha.jpg');
		}

		.mem {

			display: inline-block;
		}

		.user {
			color: #b3321d;
			display: inline-block;
			padding-left: 100px;
		}

		.name {
			display: inline-block;
		}

		.products thead {
			display: inline-block;
			/* vertical-align: top; */
			background: #fff9;
			margin: 15px;
			width: 22%;
			padding: 10px;
		}

		.products {
			width: 100%;
			padding: 0%;
			/* float: left; */
			display: inline-block;
			/* text-align: center; */
			/* page-break-inside: auto; */
			margin: auto;
		}

		.products thead img {
			width: 100%;
		}

		.prod {
			display: inline-block;
			width: 34%;
			vertical-align: top;
			padding: 20px;
		}

		.prod .products thead {
			width: 100%;
			padding: 0px;
			margin: 0px 0px;
		}



		.page-header {
			text-align: center;
			font-family: sans-serif;
			color: dimgrey;
		}

		.table.table-bordered {
			/* padding-left: 180px; */
			margin: auto;
			background: purple;
		}

		.table.table-bordered th {
			width: 112px;
			font-size: 20px;
			font-family: 'Oswald', sans-serif;
			margin: auto;
			color: #fff;
		}

		.products th {
			width: 126px;
		}

		.prod {
			display: block;
			width: 44%;
			vertical-align: top;
			padding: 0px 0px;
			margin: auto;
		}

		.tot {
			display: block;
			margin: auto;
			text-align: center;
			font-size: 20px;
			font-family: sans-serif;
			color: #7912ae;
			/* padding: 10px; */
			background: #bacf74;
			width: 135px;
			height: 28px;
			vertical-align: unset;
		}

		#paypal-button {
			/* display: block; */
			/* margin: auto; */
			padding-left: 591px;
		}
	</style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="left">
		<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
	</div><br>

	<span class="wrap">
		<h2>
			<div class="my-acc"><a href="e_acc.php"> MY ACCOUNT &nbsp </a></div>
			<div class="logout"><a href="e_login.php">LOGOUT </a></div>
		</h2>
	</span><br>
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

	<div class="wrapper">
		<div class="content-wrapper">
			<div class="container">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-9">
							<h1 class="page-header">YOUR CART</h1><br><br>
							<div class="box box-solid">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
											<th>Photo</th>
											<th>Name</th>
											<th>Price</th>
											<th width="20%">Quantity</th>
											<th>Subtotal</th>
										</thead>
										<tbody id="tbody">
										</tbody>
									</table>
								</div>
							</div>
							<?php
							//include 'session.php';				
							if (isset($_SESSION['cart'])) {
								$user = $_SESSION['sess_user'];
								$id = $_SESSION['cart'];
								//$quantity = $_POST['quantity'];
								//$products = array_count_values($_SESSION['cart']);
								//echo "Number of products in cart :".sizeof($_SESSION['cart']);
								$total = 0;
								$con = mysqli_connect('localhost', 'root', '', 'carwow');
								if (!$con) {
									die("Could not connect") . mysqli_connect_error();
								}
								$sql = "Select * from cart where username = '$user'";
								$res = mysqli_query($con, $sql);
								if (!$res) {
									echo "Could not connect";
								}
								$row = mysqli_num_rows($res);
								//$image = $row['image'];
								if (!empty($row)) {
									while ($row = mysqli_fetch_assoc($res)) {
							?><div class="prod">
											<table class="products">
												<thead>
													<tr>
														<?php
														echo "<th><img src=" . $row['image'] . " ></th>";
														echo "<div class=" . 'product-info' . "><th>" . $row['productname'] . "</th>";
														echo "<th> $" . $row['price'] . "</th>";
														echo "<th> " . $row['quantity'] . "</th>";
														echo "<th> $" . $row['subtotal'] . "</th></div>";
														$total += $row['subtotal'];
														?></tr>
												</thead>
											</table>
										</div><br>
								<?php
									}
								} else {
									echo "Cart is empty";
								}
								?> <div class="tot"> <?php
										echo "<h4><strong>Total </strong>= $<span id=" . 'total' . ">" . $total . "</span></h4>"; ?> </div><br>

								<div id="paypal-button"></div>
								<form method=post action="https://www.paypal.com/cgi-bin/webscr">
									<input type="hidden" name="cmd" value="_notify-synch">
									<input type="hidden" name="tx" value="TransactionID">
									<input type="hidden" name="at" value="VV5UsB7URDyKTzJzbRwXnXg7vE5mUPslnjJ6T1x4MdWl30Ti6GR7Kvni1NK">
									<div id="paypal-button"></div>
								</form>
							<?php
							} else {
								echo "No items in your cart";
							}
							?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>

	<script>
		paypal.Button.render({
			// Configure environment
			env: 'sandbox',
			client: {
				sandbox: 'AYYqKH4nc7EhUtaaZltnjbxv17to3QL1UPiV6i1N34unOS0hFMUx7meGy-GTThFahYMsrkjTBZBmOyQm',
				production: 'demo_production_client_id'
			},
			// Customize button (optional)
			locale: 'en_US',
			style: {
				size: 'small',
				color: 'gold',
				shape: 'pill',
			},

			// Enable Pay Now checkout flow (optional)
			commit: true,

			// Set up a payment
			payment: function(data, actions) {
				var tot = document.getElementById("total").innerHTML;
				return actions.payment.create({
					transactions: [{
						amount: {
							total: tot,
							currency: 'USD'
						}
					}]
				});
			},

			// Execute the payment
			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function() {
					// Show a confirmation message to the buyer
					window.alert('Thank you for your purchase!');
					window.location = 'http://kaswebtech.com/tanisha/test/e_success.php';
					$.ajax({
						type: "GET",
						url: "https://www.sandbox.paypal.com/cgi-bin/webscr"
					})
				});
			}
		}, '#paypal-button');
	</script>

</body>

</html>
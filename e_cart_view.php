<?php
	session_start();
	if(!isset($_SESSION['sess_user']))
	header("Location : e_login.php");
?>
<html>
<head>
<title>CART </title>
<style>
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
.products li {
	display: inline-block;
	vertical-align: top;
	background: #fff;
	margin: 15px;
	width: 22%;
	padding: 10px;
}
.products {
	width: 100%;
	padding: 0%;
	float: left;
	display: block;
	text-align: center;
}
.products li img {
	width: 100%;
}
.prod {
	display: inline-block;
	width: 20%;
	vertical-align: top;
	padding: 20px;
}
.prod .products li {
	width: 100%;
	margin: 0px;
	padding: 10px;
}
h3 {
	font-size: 14px;
}
</style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
		<div class="left">
			<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
		</div><br>
		
		<span class="wrap"><h2>
			<div class="my-acc"><a href="e_acc.php"> MY ACCOUNT &nbsp </a></div>
			<div class="logout"><a href="e_login.php">LOGOUT </a></div>
		</h2></span><br>
		<div class="mem"><h3>
		<span class="user"><strong> USER :</strong></span>
		<span class="name">
			<?php					
				print $_SESSION['sess_user'] ;
				
			?>
		</span>
	</h3></div><br>
		
<div class="wrapper">
	
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">YOUR CART</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
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
		if(isset($_SESSION['cart']))
		{
			
			$user = $_SESSION['sess_user'];
			$id = $_SESSION['cart'];
			$quantity = $_POST['quantity'];
			$products = array_count_values($_SESSION['cart']);
			//echo "Number of products in cart :".sizeof($_SESSION['cart']);
			$total = 0;
			
			
			
				$con = mysqli_connect('localhost','carwow','admin@123','carwow');
				if(! $con)
				{
					die("Could not connect").mysqli_connect_error();
				}
		
				$sql = "Select * from cart where username = '$user'" ;
				$res = mysqli_query($con,$sql);
				if(!$res)
				{
					echo "Could not connect" ;
				}
				$row=mysqli_num_rows($res);
				
				if(!empty($row))
				{
					while($row=mysqli_fetch_assoc($res))
					{
					?><div class="prod"> <ul class="products"> 
						<li>
					<?php 
											
						echo"<div class='img'><img src=".$row['image']."></div>";
						echo "<div class=".'product-info'."><div class=".'name'."><h3>".$row['productname']."</h3></div>";
						echo "<div class=".'price'.">Price: ".$row['price']."</div>";
						echo "<div class=".'quantity'.">Quantity: ".$row['quantity']."</div>";
						echo "<div class=".'subtotal'.">Subtotal: ".$row['subtotal']."</div>";
						$total += $row['subtotal'];
					
						
					?></li></ul> </div>
					
				<?php
					}
				} 				
				else
				{
					echo "Cart is empty";
				}
				
			?> <div id="paypal-button-container"></div>
			<div class="tot" id="total_">
			<?php
			
			echo "<br><h4><strong>Total</strong>=<span id=".'total'.">".$total."</span></h4>"; ?> </div>
			
			<?php
			
			
		}
		else
		{
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
// Set your environment
env: 'sandbox', // sandbox | production
//alert(total);
//var total = "<?php echo $total?>";
// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create
client: {
  sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
  production: '<insert production client id>'
},
	
payment: function (data, actions) {
var tot = document.getElementById("total").innerHTML;
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: tot,
            currency: 'USD'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {
      window.alert('Payment Complete!');
    });
}
}, '#paypal-button-container');

	</script>

</body>
</html>
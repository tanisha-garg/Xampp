<?php 
session_start();
error_reporting(E_ALL); 
if(!isset($_SESSION['sess_user']))
	header("Location : e_login.php");
?>
<html>
<head>
<title> Cart </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.product {
	width: 100%;
	padding: 0%;
	float: left;
	display: block;
	text-align: center;
}
body {
	background-image: url('ha.jpg');
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
h1{
	font-family: sans-serif;
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
</style>
</head>
<body>
	
	<div class="header">
		<div class="left">
			<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
		</div>		
	</div>
	
	<h1 align="center"> MY CART </h1>
	
	<?php
		if(isset($_SESSION['cart']))
		{
			echo "Number of Items in the cart = ".sizeof($_SESSION['cart']);
			$user = $_SESSION['sess_user'];
			$products = array_count_values($_SESSION['cart']);
		
			$total=0;
			$itemname="";
			$ids='';
			foreach($products as $id => $count )
			{
				$con = mysqli_connect('localhost','carwow','admin@123','carwow');
				if(! $con)
				{
					die("Could not connect").mysqli_connect_error();
				}
		
				$sql = "Select * from product where id = ".$id ;
				$res = mysqli_query($con,$sql);
				if(!$res)
				{
					echo "Could not connect" ;
				}
				while($row=mysqli_fetch_assoc($res))
				{
					?><div class="prod"> <ul class="products"> 
						<li>
					<?php 
						$total = $total+$row['price'];
						$itemname = $itemname.",".$row['name'];
						$ids = $ids.$row['id'];
						echo "<div class=".'price'.">Price: ".$row['price']."</div>"; 
						echo"<div class='img'><img src=".$row['image']."></div>";
						//echo "quantity=".$count."<br><br>";
						echo $row['name']."<br><br><button id='removecart' onclick='removecart(".$row['id'].")'>Remove</button>";
					?></li></ul> </div>
					
				<?php
				}
			}
			echo "<br><h4><strong>total</strong>=".$total."</h4>";
		}
		else
		{
			echo "No items in your cart";
		}
	?>
<script>
	function removecart(id)
	{
		 $.ajax({
		type: "GET",
		url: "ajax2.php?id=" + id
		})
 
		.done(function()
		{
		alert("Product have been removed.");
		});
 
		success:alert('success');
		
		var elem = document.getElementById('products');
		elem.parentNode.removeChild(elem);
		return false;
	}		
</script>
</body>
</html>
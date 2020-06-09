<html>
<head>
<title> Harry Potter </title>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
.product-name {
	font-family: sans-serif;
}
.product-info {
	display: inline-block;
	vertical-align: top;
	margin-left: 75px;
}
.heading {
	margin-top: 50px;
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
.right {
	display: inline-block;
	float: right;
}
h2 {
	margin-top: 50px;
	font-family: Raleway;
}

.hover_bkgr_fricc{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover_bkgr_fricc .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover_bkgr_fricc > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup_fricc {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}
.wrapper {
	width: 980px;
	margin: auto;
}
.product-img {
	display: inline-block;
	width: 25%;
	margin-left: 310px;
}
.product-img img {
	width: 80%;
}

</style>
</head>
<body>
<div class="header">
<div class="wrapper">
	<div class="left">
		<h3><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> ABC CART </h3>
	</div>
	<div class="right">
		<h3 align="right"><a href = "e_cart.php"> YOUR CART </a></h3>
	</div>
</div>
</div>
<div class="heading"><h2 align="center"> HARRY POTTER AND THE PHILOSOPHER STONE </h2></div><br><br>
<div class="wrap">
	<div class="product">
	<div class="product-img">
		<img src="hp.jpg" alt="Harry Potter" width="20%">
	</div>
			<div class="product-info">
				<h3 class="product-name">HARRY POTTER</h3>
				<div class="product-price"><h4>Rs. 500</h4></div>
				<div class="description"> <strong>Novel :</strong> Harry Potter <br> 
									  <strong>Writer :</strong> J.K Rowling <br><br>
									  First part from the Harry Potter series.<br><br>
									  A magical story based on a protagonist <br>
									  
									  Harry potter and antagonist Lord Voldemort aka Tom Riddle.<br><br>
									  Best seller book.<br><br><br>
				</div>
				<a class="trigger_popup_fricc">Add to cart</a>
			</div>
	</div>
<div class="hover_bkgr_fricc">
	<span class="helper"></span>
	<div>
		<div class="popupCloseButton">X</div>
		<h3>Added to cart successfully!!!</h3>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	 
		$(document).ready(function ()
		{
			$(".trigger_popup_fricc").click(function()
			{
				$('.hover_bkgr_fricc').show();
			});
			$('.hover_bkgr_fricc').click(function()
			{
				$('.hover_bkgr_fricc').hide();
			});
			$('.popupCloseButton').click(function()
			{
				$('.hover_bkgr_fricc').hide();
			});
		});
	</script>
</body>
</html>
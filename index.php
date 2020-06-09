<html>

<head>
    <title> HOME </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

        body {
            background-image: url('web.jpg');
        }

        h1 {
            margin-top: 100px;
            color: brown;
            font-family: Raleway;
        }

        .product-name {
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

        .price {
            color: #1f9ba3;
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


        .hover_bkgr_fricc {
            background: rgba(0, 0, 0, .4);
            cursor: pointer;
            display: none;
            height: 100%;
            position: fixed;
            text-align: center;
            top: 0;
            width: 100%;
            z-index: 10000;
        }

        .hover_bkgr_fricc .helper {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        .hover_bkgr_fricc>div {
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

        .hover_bkgr_fricc1 {
            background: rgba(0, 0, 0, .4);
            cursor: pointer;
            display: none;
            height: 100%;
            position: fixed;
            text-align: center;
            top: 0;
            width: 100%;
            z-index: 10000;
        }

        .hover_bkgr_fricc1 .helper1 {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }

        .hover_bkgr_fricc1>div {
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

        .popupCloseButton1 {
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

        .popupCloseButton1:hover {
            background-color: #ccc;
        }

        .trigger_popup_fricc1 {
            cursor: pointer;
            font-size: 20px;
            margin: 20px;
            display: inline-block;
            font-weight: bold;
        }
        .right:hover{
            background-color:black;
            border-radius: 8px;
        }
        .add-cart:hover{
            background-color:gray;
            border-radius: 8px;
            transition:0.5s;
            
        }
    </style>
</head>

<body>
    <div class="header bg-dark">
        <div class="left mt-2">
            <h3 class="text-white"><a href="index.php"><img src="logo.jpg" alt="abc" width="50" height="50"></a> &nbspABC CART </h3>
        </div>
        <div class="right">
            <a class="trigger_popup_fricc text-white y-cart">YOUR CART</a>
            </h3>
        </div>
    </div>
    <h1 align="center"> WELCOME TO ABC CART </h1>
    <p>
        <center>
            <h4><a href="e_login.php"> LOGIN </a>&nbsp &nbsp
                <a href="e_register.php"> REGISTER </a></h4>
        </center>
    </p><br><br>
    <ul class="products">
        <li>
            <a href="e_hp.php"><img src="hp.jpg" alt="Harry Potter"></a>
            <div class="product-info">
                <h3 class="product-name"><a href="e_hp.php">HARRY POTTER</a></h3>
                <div class="price">$10</div>
                <a class="trigger_popup_fricc1 add-cart">Add to cart</a>
            </div>
        </li>

        <li>
            <a href="e_t.php"><img src="twilight.jpg" alt="Twilight"></a>
            <div class="product-info">
                <h3 class="product-name"><a href="e_t.php">Twilight</a></h3>
                <div class="price">$10</div>
                <a class="trigger_popup_fricc1 add-cart">Add to cart</a>
            </div>
        </li>
    </ul>

    <div class="hover_bkgr_fricc">
        <span class="helper"></span>
        <div>
            <div class="popupCloseButton">X</div>
            <h3>Login Required</h3>
        </div>
    </div>
    <div class="hover_bkgr_fricc1">
        <span class="helper1"></span>
        <div>
            <div class="popupCloseButton1">X</div>
            <h3>Login Required!!!</h3>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".trigger_popup_fricc").click(function() {
                $('.hover_bkgr_fricc').show();
            });
            $('.hover_bkgr_fricc').click(function() {
                $('.hover_bkgr_fricc').hide();
            });
            $('.popupCloseButton').click(function() {
                $('.hover_bkgr_fricc').hide();
            });
        });

        $(document).ready(function() {
            $(".trigger_popup_fricc1").click(function() {
                $('.hover_bkgr_fricc1').show();
            });
            $('.hover_bkgr_fricc1').click(function() {
                $('.hover_bkgr_fricc1').hide();
            });
            $('.popupCloseButton1').click(function() {
                $('.hover_bkgr_fricc1').hide();
            });
        });
    </script>
</body>

</html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>

<?php

if (!isset($_POST['submit'])){
?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Username: <input type="text" name="username" /><br />
        Password: <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Login" />
    </form>

<?php
} else {
    require_once("db_const.php");
    $mysqli = new mysqli('localhost','root','','user_reg');
    
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        echo "<p>Logged in successfully</p>";
        
    }
}
?>      
</body>
</html>
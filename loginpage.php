<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="css/loginpagestyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
		<header>
			<div class="container">
				<div id="logo">
					<img src="css/images/logo.jpg">
					</div>
					<nav>
						<ul>
							<li><a href="homepage.html">Home</a></li>
							<li><a href="servicepage.html">About</a></li>
							<li><a href="contactpage.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<section id="signin">
				<div class="login">
					<h1>Login Here</h1>
					<form method="POST">
                        <input type="text" id="usn" name="username" placeholder="Enter username" class="ada" required>
						<input type="password" name="password" placeholder="Enter password" required>
						<div>
                            <button name="submit" id="sub">Login</button>
                        </div>
						
					</form>
				</div>
            </section>
            <footer>
					AA Sports Company,Copyright &copy;2019
	</footer>
	</body>
</html>

<?php

    $servername = "ec2-3-91-112-166.compute-1.amazonaws.com";
    $username = "wncysqgsdbushb";
    $password = "b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d";
    $databasename = "dfao2a1rbfvq49";

    $connection = pg_connect( $servername,$username,$password,$databasename);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }
    session_start();

    if(isset($_POST['submit']))
    {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "select * from login where username='".$username."' and password='".$password."'";

            $result = pg_query($connection,$sql);
            if(pg_num_rows($result) == 1)
            {
                header("location:addemployee.php");
            }
            else
            {
                echo "<a style='position:absolute;bottom:11em;left:35em;color:red;'>Incorrect Username and Password</a>";
            }
    }
    $closeConnection = pg_close($connection);
?>

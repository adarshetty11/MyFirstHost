<html>
    <head>
        <meta charset="utf-8">
        <title>Sign In</title>
        <link rel="stylesheet" type="text/css" href="css/customerloginstyle.css">
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
        <section id="height">
        <div id="wrapper">
        <div id="center">
            <div id="signin">
                <div>
                    <h3>Already have an Account</h3>
                </div>
                <form method="POST" action="">
                    <div>
                        <label>Username</label>
                        <input type="text" class="text-input" name="username" required>
                    </div>
                    <div>
                        <label>Password(Mobile No.)</label>
                        <input type="password" class="text-input" name="mobile" required>
                    </div>
                    <div>
                        <button type="submit" class="primary-btn">Sign In</button>
                    </div>
                </form>
                <div class="or">
                    <hr class="bar">
                    <span>OR</span>
                    <hr class="bar">
                </div>
                <div>
                <a href="customerform.html" class="secondary-btn">Create An Account</a>
                </div>
            </div>
        </div>
        </div>
        </section>
    </body>
</html>

<?php

    $connection = pg_connect( "host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();
    $username = filter_input(INPUT_POST,'username');
    $password = filter_input(INPUT_POST,'mobile');
    
    if(isset($password))
    {
        $sql = "SELECT * from customer where username='$username' and mobile='$password';";
        $result = pg_query($connection,$sql);
        $rows = pg_num_rows($result);
        if($rows == 0)
        {
            echo "<a style='position:absolute;bottom:13em;left:38em;color:red;'>Incorrect Username and Password</a>";
        }
        else{
            $_SESSION['user']=$username;
            header("location:sportsdep.php");
        }
    }
    $closeConnection = pg_close($connection);
?>

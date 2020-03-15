<?php

    $connection = pg_connect("host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();
    $username=$_SESSION['user'];

    $query = "Select name from customer where username='$username';";
    $result = pg_query($connection,$query);
    $name = pg_fetch_assoc($result);

    $closeConnection = pg_close($connection);
    
   ?>

    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sports Products</title>
        <link rel="stylesheet" type="text/css" href="css/sportsproductsstyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="logo">
                    <img src="css/images/logo.jpg">
                </div>
                <nav>
                <img src="css/images/icon1.png">
                    <ul style="margin-top:-34px;margin-left:22px;">

                           
                            <li style="text-transform:uppercase;"><?php echo $name['name']; ?></li>
                            <li><a href="history.php">Purchase History </a></li>
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>

               <section id="products">
                    <div>
                       <h2 id="heading">Select Department to purchase product</h2>
                    </div>
                    <br>
                    <div class="labels">
                        <label id="l1">Cricket</label>
                        <label id="l2">Football</label>
                        <label id="l3">Tennis</label>
                        <label id="l4">Hockey</label>
                    </div>
                    <br>
                    <form method="POST" action="depselection.php">
                        <div> 
                                <button id="cricket"  name="department" value="1"></button>
                            
                                <button id="football" name="department" value="2"></button>
                            
                                <button id="tennis" name="department" value="3"></button>
                            
                                <button id="hockey" name="department" value="4"></button>
                        </div>
                     <br><br>
                     <div>
                        <label id="l5">Badminton</label>
                        <label id="l6">Baseball</label>
                        <label id="l7">Table Tennis</label> 
                        <label id="l8">Volley Ball</label>   
                    </div>
                    <br>
                    
                    <div class="buttonhover">
 
                            <button id="badminton" name="department" value="5"></button>
                        
                            <button id="baseball" name="department" value="6"></button>
                        
                            <button id="tabletennis" name="department" value="7"></button>
                        
                            <button id="volleyball" name="department" value="8"></button>
                        
                        </div>
                    </form>
                </section> 
                <footer>
            AA Sports Company,Copyright &copy;2019
        </footer>
    </body>
</html>
                
   

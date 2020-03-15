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
        <title>Table Tennis</title>
        <link rel="stylesheet" type="text/css" href="css/sportsstyle.css">
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
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>
                </nav>
                </nav>
            </div>
        </header>
        <section id="details">
            <div class="container">
                <form method="POST" action="kit.php">
                    <h2 id="heading" style="margin-left: 18.5em">TABLE TENNIS KIT</h2>
                     <div>
                        <label>Kit</label>
                        <select name="kit" style="width: 174px">
                            <option value="bat">Bat</option>
                            <option value="ball">Ball</option>
                            <option value="rubbergrip">RubberGrip</option>
                            <option value="shoe">Shoes</option>
                            <option value="shorts">Shorts</option>
                            <option value="jersey">Jersey</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Brand</label>
                        <select name="brand" style="width: 174px">
                            <option value="stiga">Stiga</option>
                            <option value="yasaka">Yasaka</option>
                            <option value="dhsneo">DHS NEO</option>
                            <option value="butterfly">Butterfly</option>
                            <option value="adidas">Adidas</option>
                            <option value="nittaku">Nittaku</option>
                        </select>
                    </div>
                    <br>
                     <div>
                        <label>Size</label>
                        <select name="size" style="width: 174px">
                            <option value="kid">Kids</option>
                            <option value="adults">Adults</option>
                            <option value="experts">Experts</option>
                        </select>
                    </div>
                   <br>
                   <div>
                        <label>Price(rupees)</label>
                        <input type="number" name="price" id="price" readonly>
                   </div>
                   <br>
                   <div>
                    <button type="button" name="generate" onclick="myFunction()">Generate price</button>

                    <script>
                        function myFunction(){
                            document.getElementById("price").defaultValue = "750";
                        }
                    </script>

                   </div>
                   <br>
                   <div>
                        <a href="#">
                            <button>PURCHASE</button>   
                        </a>
                        <br><br>
                        
                   </div>
                </form>
            </div>
        </section>
        <footer>
            AA Sports Company,Copyright &copy;2019
        </footer>
    </body>
</html>

<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "myfirstdb";

    $connection = mysqli_connect( $servername,$username,$password,$databasename);

    if(!$connection)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    
    session_start();
    $username = $_SESSION['user'];

    $query1 = "Select Name from Customer where Username='$username';";
    $result = $connection -> query($query1);
    $name1 = $result->fetch_assoc();

    $query = "SELECT d.DepartmentName, k.Kit, k.Brand, k.Size, k.Price from Department d,Kits k 
    where k.departmentNo=d.departmentNo and k.Username='$username';";

    $result = mysqli_query($connection,$query);

    $query1 = "select Name from Customer where Username = '$username';";
    $result1 = mysqli_query($connection,$query1);
    $data = mysqli_fetch_assoc($result1);
    $name = $data['Name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/sportsproductsstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="color:#ffffff;">
    <header >
    <div class="container">
        <div id="logo">
            <img src="css/images/logo.jpg">
        </div>
        <nav>
        <img src="css/images/icon1.png">
                    <ul style="margin-top:-34px;margin-left:22px;">   
                            <li style="text-transform:uppercase;"><?php echo $name1['Name']; ?></li>
                            <li><a style="color:yellow" href="history.php">Purchase History </a></li>
                            <li><a href="customerlogin.php">Sign Out</a></li>
                    </ul>

        </nav>
    </header>
    <section id="details">
    
    <a href="sportsdep.php" style="color:white">Go Back</a>
    <table align="center" border="1px" style="width: 1000px; line-height:40px;" >
            <tr>
                <th colspan="5"><h2  style="color:violet">Kits Purchased</h2></th>
            </tr>
            <tr style="width: 500px;color:violet">
                    <th>Department</th>
                    <th>Kit</th>
                    <th>Brand</th>
                    <th>Size</th>
                    <th>Price</th> 
            </tr>

    <?php
    while($rows = $result -> fetch_assoc())
    {
    ?>

    <tr align="center">
        <td><?php echo $rows['DepartmentName'] ?></td>
        <td><?php echo $rows['Kit'] ?></td>
        <td><?php echo $rows['Brand'] ?></td>
        <td><?php echo $rows['Size'] ?></td>
        <td><?php echo $rows['Price'] ?></td>
    </td>
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>
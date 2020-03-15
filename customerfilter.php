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
    $username = $_GET['check'];

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
    <link rel="stylesheet" type="text/css" href="css/employeedetailsstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li><a href="updateemployee.html">Update Employee</a></li>
                        <li><a href="deleteemployee.html">Delete Employee</a></li>
                        <li>View
                        <ul>
                            <li><a href="employeedetails.php">View All Employees</a></li>
                            <li><a href="customerdetails.php">View All Customers</a></li>
                            <li class="active"><a href="departmentfilter.php">View All Customers</a></li>
                            <li><a href="filter.php">Filter Customers</a></li>
                        </ul>
                        </li>
                        <li><a href="homepage.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="details">
    
    <a href="customerdetails.php">Go Back</a>
    <table align="center" border="1px" style="width: 1000px; line-height:40px;">
            <tr>
                <th colspan="5"><h2><?php echo $name; ?></h2></th>
            </tr>
            <tr style="width: 500px;">
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
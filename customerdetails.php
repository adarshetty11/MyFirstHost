<?php

    $connection = pg_connect("host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }


    $query = "select * from customer";
    $result = pg_query($connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Details</title>
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
                            <li class="active"><a href="customerdetails.php">View All Customers</a></li>
                            <li><a href="departmentfilter.php">View All Departments</a></li>
                            <li><a href="filter.php">Filter Customers</a></li>
                        </ul>
                        </li>
                        <li><a href="homepage.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="details">
    <table align="center" border="1px" style="width: 1348px; line-height:40px;">
            <tr>
                <th colspan="9"><h2>Customer Details</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Door No</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Purchase Details</th>
            </tr>
    
    <?php
    while($rows = pg_fetch_assoc($result))
    {
    ?>
    <tr align="center">
        <td><?php echo $rows['name'] ?></td>
        <td><?php echo $rows['gender'] ?></td>
        <td><?php echo $rows['age'] ?></td>
        <td><?php echo $rows['doorno'] ?></td>
        <td><?php echo $rows['street'] ?></td>
        <td><?php echo $rows['city'] ?></td>
        <td><?php echo $rows['email'] ?></td>
        <td><?php echo $rows['mobile'] ?></td>
        <td><a href="customerfilter.php?check=<?php echo $rows['username'] ?>">Check</a></td>
    </tr>
    <?php
    }
    ?>
    
    </section>

</body>
</html>




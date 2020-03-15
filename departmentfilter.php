<?php
    
    $connection = pg_connect( "host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
         die("Connection failed: ".pg_last_error());
    }

    session_start();
    $query = "select * from department;";
    $result = pg_query($connection,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Department Details</title>
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
                            <li ><a href="customerdetails.php">View All Customers</a></li>
                            <li class="active"><a href="departmentfilter.php">View All Departments</a></li>
                            <li><a href="filter.php">Filter Customers</a></li>
                        </ul>
                        </li>
                        <li><a href="homepage.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="details">
    

    <table align="center" border="1px" style="width: 400px; line-height:40px;">
            <tr>
                <th colspan="3"><h2>Department Details</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Department No.</th>
                    <th>Department Name</th>
                    <th>Employee</th>
            </tr>

    <?php
    while($rows = pg_fetch_assoc($result))
    {
    ?>
    <tr align="center">
            <td><?php echo $rows['departmentno'] ?></td>
            <td><?php echo $rows['departmentname'] ?></td>
            <td><a href="employeefilter.php?check=<?php echo $rows['departmentno'] ?>">Check</a></td>  
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>

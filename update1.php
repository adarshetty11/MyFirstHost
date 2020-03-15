<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Employee Details</title>
    <link rel="stylesheet" type="text/css" href="css/updateemployeestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li class="active"><a href="updateemployee.html">Update Employee</a></li>
                        <li><a href="deleteemployee.html">Delete Employee</a></li>
                        <li>View
                        <ul>
                            <li><a href="employeedetails.php">View All Employees</a></li>
                            <li><a href="customerdetails.php">View All Customers</a></li>
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
        <h2 id="heading">Update Employee Details</h2>
        <form method="POST"  action="updateemployee.php">
            <div>
                <label>Enter Employee ID to update</label>
                <input type="text" name="empid">
            </div>
            <br>         
            <div>
            <input type="submit" name="update" value="Next">
            </div>
            <br>
        </form>
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
    
    $empid = filter_input(INPUT_POST,'empid');
    $name = filter_input(INPUT_POST,'nam');
    $department = filter_input(INPUT_POST,'dep');
    $gender = filter_input(INPUT_POST,'gen');
    $dob = filter_input(INPUT_POST,'dob');
    $address = filter_input(INPUT_POST,'add');
    $salary = filter_input(INPUT_POST,'sal');
    
    $update = "update employee set name='$name',departmentno='$department',gender='$gender',dob='$dob',address='$address',salary='$salary' where employeeid='$empid'";;
    $res = pg_query($connection,$update);
    if($res)
    {
        echo "<script>alert('Record updated successfully');</script>";
    }
?>
   

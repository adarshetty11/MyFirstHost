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
    $departmentno = $_GET['check'];
    $query = "SELECT EmployeeId,Name,Gender,DOB,Address,Salary from Employee where DepartmentNo='$departmentno';";
    $result = mysqli_query($connection,$query);

    $query1 = "select DepartmentName from Department where DepartmentNo = '$departmentno';";
    $result1 = mysqli_query($connection,$query1);
    $data = mysqli_fetch_assoc($result1);
    $name = $data['DepartmentName'];
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
    
    <a href="departmentfilter.php">Go Back</a>
    <table align="center" border="1px" style="width: 1000px; line-height:40px;">
            <tr>
                <th colspan="6"><h2><?php echo $name; ?> Department</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Employee Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Salary</th> 
            </tr>

    <?php
    while($rows = $result -> fetch_assoc())
    {
    ?>

    <tr align="center">
    <td><?php echo $rows['EmployeeId'] ?></td>
        <td><?php echo $rows['Name'] ?></td>
        <td><?php echo $rows['Gender'] ?></td>
        <td><?php echo $rows['DOB'] ?></td>
        <td><?php echo $rows['Address'] ?></td>
        <td><?php echo $rows['Salary'] ?></td>
    </td>
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>
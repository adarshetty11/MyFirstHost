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


    $query = "select * from Employee";
    $result = $connection -> query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Details</title>
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
                            <li class="active"><a href="employeedetails.php">View All Employees</a></li>
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
    <table align="center" border="1px" style="width: 1340px; line-height:40px;">
            <tr>
                <th colspan="7"><h2>Employee Details</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Employee Id</th>
                    <th>Name</th>
                    <th>Department No.</th>
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
        <td><?php echo $rows['DepartmentNo'] ?></td>
        <td><?php echo $rows['Gender'] ?></td>
        <td><?php echo $rows['DOB'] ?></td>
        <td><?php echo $rows['Address'] ?></td>
        <td><?php echo $rows['Salary'] ?></td>
    </tr>
    <?php
    }
    ?>
    </section>

</body>
</html>




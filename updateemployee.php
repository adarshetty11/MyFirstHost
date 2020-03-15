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

    $empid = filter_input(INPUT_POST,'empid');

    $query = "select * from Employee where EmployeeId='$empid'";
    $primary = mysqli_query($connection,$query);
    $rows = mysqli_num_rows($primary);
    if($rows == 0){
        echo "<script>alert('There is no such ID!!!');</script>";
        die();
    }
    $result = $connection -> query($query);
?>
<html>
<head>
            <meta charset="utf-8">
            <title>Update Employee Details</title>
            <link rel="stylesheet" type="text/css" href="css/updateemployee.css">
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
    <table align="center" border="1px" style="width: 10px; line-height:40px;">
            <tr>
                <th colspan="7"><h2>Update Employee <?php echo $empid ?> Details</h2></th>
            </tr>
            <tr style="width: 50px;">
                    <th>EmployeeId</th>
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
    <form method="Post" action="update1.php">
    <tr>
        <td><input type="number" value="<?php echo $rows['EmployeeId'] ?>" name="empid"></td>
        <td><input type="text" value="<?php echo $rows['Name'] ?>" name="nam"></td>
        <td><input type="text" value="<?php echo $rows['DepartmentNo'] ?>" name="dep"></td>
        <td><input type="text" value="<?php echo $rows['Gender'] ?>" name="gen"></td>
        <td><input type="text" value="<?php echo $rows['DOB'] ?>" name="dob"></td>
        <td><input type="text" value="<?php echo $rows['Address'] ?>" name="add"></td>
        <td><input type="number" value="<?php echo $rows['Salary'] ?>" name="sal"></td>  
    </tr>
        <input id="update" type="submit" name="submit" value="update">
    </form>
    <?php
    }

    ?>
    </section>
    </body>
</body>
<html>

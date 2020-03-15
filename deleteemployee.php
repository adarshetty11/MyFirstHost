<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Employee Details</title>
    <link rel="stylesheet" type="text/css" href="css/deleteemployeestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                        <li><a href="addemployee.php">Add New Employee</a></li>
                        <li><a href="updateemployee.html">Update Employee</a></li>
                        <li class="active"><a href="deleteemployee.html">Delete Employee</a></li>
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
            <h2 id="heading">Delete Employee Details</h2>
            <form action="deleteemployee.php" method="POST">
                <div>
                    <label>Enter Employee ID to delete</label>
                    <input type="text" name="empid">
                </div>
                <br>         
                <div>
                <input type="submit" name="delete" value="Delete">
                </div>
                <br>
            </form>
    </section>
</body>
</html>

<?php

    $empid = filter_input(INPUT_POST,'empid');


    if (!empty($empid))
    {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $databasename = "myfirstdb";

            $connection = mysqli_connect( $servername,$username,$password,$databasename);

            if(!$connection)
            {
                die("Connection failed: ".mysqli_connect_error());
            }

            $sql="select * from Employee where EmployeeId='".$empid."'";
            $primary = mysqli_query($connection,$sql);
            $rows = mysqli_num_rows($primary);
            if($rows == 0){
                echo "<script>alert('There is no such ID!!!');</script>";
                die();
            }

            $deleteRecordQuery = "delete from Employee where Employeeid='$empid'";
            if($connection->query($deleteRecordQuery))
            {
                echo "<script>alert('Record deleted successfully');</script>";
            }
            else
            {
                echo "<script>alert('There is no Employee Id to delete');</script>";
            }

            $closeConnection = mysqli_close($connection);
    }
    else
    {
        echo "<script>alert('Enter Employee Id to delete!!!');</script>";
    }
?>

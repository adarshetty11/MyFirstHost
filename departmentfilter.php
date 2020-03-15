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
    $query = "select * from Department;";
    $result = mysqli_query($connection,$query);
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
    while($rows = $result -> fetch_assoc())
    {
    ?>
    <tr align="center">
            <td><?php echo $rows['DepartmentNo'] ?></td>
            <td><?php echo $rows['DepartmentName'] ?></td>
            <td><a href="employeefilter.php?check=<?php echo $rows['DepartmentNo'] ?>">Check</a></td>  
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>
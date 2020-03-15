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


    $query = "select * from Customer";
    $result = $connection -> query($query);
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
    while($rows = $result -> fetch_assoc())
    {
    ?>
    <tr align="center">
        <td><?php echo $rows['Name'] ?></td>
        <td><?php echo $rows['Gender'] ?></td>
        <td><?php echo $rows['Age'] ?></td>
        <td><?php echo $rows['DoorNo'] ?></td>
        <td><?php echo $rows['Street'] ?></td>
        <td><?php echo $rows['City'] ?></td>
        <td><?php echo $rows['Email'] ?></td>
        <td><?php echo $rows['Mobile'] ?></td>
        <td><a href="customerfilter.php?check=<?php echo $rows['Username'] ?>">Check</a></td>
    </tr>
    <?php
    }
    ?>
    
    </section>

</body>
</html>




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
                            <li><a href="customerdetails.php">View All Customers</a></li>
                            <li><a href="departmentfilter.php">View All Departments</a></li>
                            <li class="active"><a href="filter.php">Filter Customers</a></li>
                        </ul>
                        </li>
                        <li><a href="homepage.html">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="details">
        <form action="" method="POST">
                <div>
                    <br>
                    <label style="margin-left:32em;">Select Department to view Customers</label>
                    <select name="department" style="width: 90px" required>
                        <option value="1">Cricket</option>
                        <option value="2">Football</option>
                        <option value="3">Tennis</option>
                        <option value="4">Hockey</option>
                        <option value="5">Badminton</option>
                        <option value="6">Baseball</option>
                        <option value="7">TableTennis</option>
                        <option value="8">VolleyBall</option>
                     </select>
                </div>
                <br>         
                <div>
                <input style="margin-left:50em;background-color:black;color:white;" type="submit" name="delete" value="Filter">
                </div>
                <br>
        </form>
        <br>
    

<?php

    $departmentno = filter_input(INPUT_POST,'department');
    
    $query = "select c.Name, c.Age, k.Kit, k.Brand, k.Size from Customer c,Kits k 
    where c.Username=k.Username and k.DepartmentNo='$departmentno';";
    $result = mysqli_query($connection,$query);

    $query1 = "select DepartmentName from Department where DepartmentNo = '$departmentno';";
    $result1 = mysqli_query($connection,$query1);

    $data = mysqli_fetch_assoc($result1);
    $name = $data['DepartmentName'];


?>
    <table align="center" border="1px" style="width: 800px; line-height:40px;">
            <tr>
                <th colspan="5"><h2><?php echo $name; ?> Department Customers</h2></th>
            </tr>
            <tr style="width: 500px;">
                    <th>Name</th>
                    <th>Age</th>
                    <th>Kit purchased</th>
                    <th>Brand</th>
                    <th>Size</th>
            </tr>

    <?php
    while($rows = $result -> fetch_assoc())
    {
    ?>

    <tr align="center">
        <td><?php echo $rows['Name'] ?></td>
        <td><?php echo $rows['Age'] ?></td>
        <td><?php echo $rows['Kit'] ?></td>
        <td><?php echo $rows['Brand'] ?></td>
        <td><?php echo $rows['Size'] ?></td>
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>
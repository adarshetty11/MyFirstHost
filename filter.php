<?php
    
    $connection = pg_connect( "host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
         die("Connection failed: ".pg_last_error());
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
    
    $query = "select c.name, c.age, k.kit, k.brand, k.size from customer c,kits k 
    where c.username=k.username and k.departmentno='$departmentno';";
    $result = pg_query($connection,$query);

    $query1 = "select departmentname from department where departmentno = '$departmentno';";
    $result1 = pg_query($connection,$query1);

    $data = pg_fetch_assoc($result1);
    $name = $data['departmentname'];


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
    while($rows = pg_fetch_assoc($result))
    {
    ?>

    <tr align="center">
        <td><?php echo $rows['name'] ?></td>
        <td><?php echo $rows['age'] ?></td>
        <td><?php echo $rows['kit'] ?></td>
        <td><?php echo $rows['brand'] ?></td>
        <td><?php echo $rows['size'] ?></td>
    </tr>

    <?php
    }
    ?>

    </section>
</body>
</html>

<?php

    $connection = pg_connect("host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
    }

    session_start();
    $username=$_SESSION['user'];

    $department = $_POST['department'];

    $_SESSION['dep']=$department;


    header("location:$department.php");



    $closeConnection = pg_close($connection);

?>

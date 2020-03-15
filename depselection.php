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
    $username=$_SESSION['user'];

    $department = $_POST['department'];

    $_SESSION['dep']=$department;


    header("location:$department.php");



    $closeConnection = mysqli_close($connection);

?>
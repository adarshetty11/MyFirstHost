<?php
    session_start();
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
    $username = filter_input(INPUT_POST,'username');
    $name = filter_input(INPUT_POST,'name');
    $gender = filter_input(INPUT_POST,'gender');
    $age = filter_input(INPUT_POST,'age');
    $doorno = filter_input(INPUT_POST,'doorno');
    $street = filter_input(INPUT_POST,'street');
    $city = filter_input(INPUT_POST,'city');
    $email = filter_input(INPUT_POST,'email');
    $mobile = filter_input(INPUT_POST,'mobile');
    
    $_SESSION['user']=$username;
    
    $insertRecordQuery = "INSERT into Customer (Username, Name, Gender, Age, DoorNo, Street, City, Email, Mobile) 
    values ('$username', '$name', '$gender','$age', '$doorno', '$street', '$city', '$email','$mobile');";
    $result = mysqli_query($connection,$insertRecordQuery);
     
    if($result)
    {
        
         header("location:sportsdep.php");
        
    }        
    else{
        echo "<script>alert('Username is already taken!!!');</script>";
        header("location:customerform.html");
        
    }
       
    $closeConnection = mysqli_close($connection);
?>

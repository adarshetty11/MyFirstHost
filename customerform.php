<?php
    session_start();

    $connection = pg_connect( "host=ec2-3-91-112-166.compute-1.amazonaws.com port=5432 dbname=dfao2a1rbfvq49 user=wncysqgsdbushb password=b8188545ffab5ba8643606c50da6cb46c5a5db1ab48dea7dd187e6f66158b70d"
);

    if(!$connection)
    {
        die("Connection failed: ".pg_last_error());
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
    
    $insertRecordQuery = "INSERT into customer (username, name, gender, age, doorno, street, city, email, mobile) 
    values ('$username', '$name', '$gender','$age', '$doorno', '$street', '$city', '$email','$mobile');";
    $result = pg_query($connection,$insertRecordQuery);
     
    if($result)
    {
        
         header("location:sportsdep.php");
        
    }        
    else{
        echo "<script>alert('Username is already taken!!!');</script>";
        header("location:customerform.html");
        
    }
       
    $closeConnection = pg_close($connection);
?>

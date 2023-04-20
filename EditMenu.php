<?php

    $Food_ID = filter_input(INPUT_POST, 'Food_ID');
    $Name = filter_input(INPUT_POST, 'Name');
    $Quantity = filter_input(INPUT_POST, 'Description');
    $Price = filter_input(INPUT_POST, 'Price');


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "000155117";
    $dbname = "fds";

    //Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die('Connection Error(' .mysqli_connect_errno().') '.mysqli_connect_error());
    }   
    else{
    $sql = "INSERT INTO food_product(Food_ID, Name, Description, Price)
    values('$Food_ID', '$Name', '$Quantity', '$Price')";
    }
    

    if($conn->query($sql)){
    ?>
    <script>
        alert("New Record Entered Successfully");
    </script>
    <?php
    }
else{
    echo "Error: <br>".$conn->error;
    }
$conn->close();
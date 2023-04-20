<?php

    $Orders_ID = filter_input(INPUT_POST, 'Orders_ID');
    $Food_ID = filter_input(INPUT_POST, 'Food_ID');
    $Quantity = filter_input(INPUT_POST, 'Quantity');
    $Date = filter_input(INPUT_POST, 'Date');


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "000155117";
    $dbname = "fds";

    //Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die('Connection Error(' .mysqli_connect_errno().') '.myswqli_connect_error());
    }   
    else{
    $sql = "INSERT INTO order_details(Orders_ID, Food_ID, Quantity, Date)
    values('$Orders_ID', '$Food_ID', '$Quantity', '$Date')";
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
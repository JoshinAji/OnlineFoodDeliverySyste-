<?php

    // $customer_id = filter_input(INPUT_POST, 'customers_id');
    $firstName = filter_input(INPUT_POST, 'first_name');
    $lastName = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email_id');
    $address = filter_input(INPUT_POST, 'Address');
    $pincode = filter_input(INPUT_POST, 'pincode');
    $phoneno = filter_input(INPUT_POST, 'phone_no');

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
    $sql1 = "INSERT INTO customer(/*customers_id,*/ first_name, last_name, email_id, Address, pincode, phone_no)
    values('$firstName', '$lastName', '$email', '$address', '$pincode', '$phoneno')";

    $sql2 = "INSERT INTO order_details(Orders_ID, Food_ID, Quantity, Date)
    values('$Orders_ID', '$Food_ID', '$Quantity', '$Date')";
    }
    

    if($conn->query($sql1) and $conn->query($sql2)){
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
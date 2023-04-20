<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "000155117";
    $dbname = "fds";

//Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if(!$conn){
        die("Connection Error, Please Try again");
    }

?>